<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Models\ActivityLog;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Models\Cart;
use App\Models\UserCoupon;
use App\Models\Product;
use App\Models\ProductVariantOption;
use App\Models\OrderBillingDetail;
use App\Models\OrderTaxDetail;
use App\Models\OrderCouponDetail;
use App\Models\AppSetting;
use App\Models\PurchasedProducts;
use App\Models\ProductCoupon;
use App\Models\Store;
use App\Models\PlanCoupon;
use App\Models\Shipping;
use App\Models\City;
use Exception;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Session;
use Cookie;
use App\Models\Admin;
use App\Models\OrderNote;
use App\Models\ProductStock;
use App\Models\Setting;

class SspayController extends Controller
{
    public $secretKey, $callBackUrl, $returnUrl, $categoryCode, $is_enabled;

    public function __construct()
    {

        $payment_setting = Utility::getAdminPaymentSetting();

        $this->secretKey = isset($payment_setting['sspay_secret_key']) ? $payment_setting['sspay_secret_key'] : '';
        $this->categoryCode = isset($payment_setting['sspay_category_code']) ? $payment_setting['sspay_category_code'] : '';
        $this->is_enabled = isset($payment_setting['is_sspay_enabled']) ? $payment_setting['is_sspay_enabled'] : 'off';
    }

    public function SspayPaymentPrepare(Request $request)
    {
        try
        {
            $planID = \Illuminate\Support\Facades\Crypt::decrypt($request->plan_id);
            $plan   = Plan::find($planID);

            if ($plan)
            {
                $get_amount = $plan->price;

                if (!empty($request->coupon))
                {
                    $coupons = PlanCoupon::where('code', strtoupper($request->coupon))->where('is_active', '1')->first();
                    if (!empty($coupons)) {
                        $usedCoupun     = $coupons->used_coupon();
                        $discount_value = ($plan->price / 100) * $coupons->discount;
                        $get_amount          = $plan->price - $discount_value;

                        if ($coupons->limit == $usedCoupun) {
                            return redirect()->back()->with('error', __('This coupon code has expired.'));
                        }
                    } else {
                        return redirect()->back()->with('error', __('This coupon code is invalid or has expired.'));
                    }
                }
                $coupon = (empty($request->coupon)) ? "0" : $request->coupon;
                $this->callBackUrl = route('admin.plan.sspay.callback', [$plan->id, $get_amount, $coupon]);
                $this->returnUrl = route('admin.plan.sspay.callback', [$plan->id, $get_amount, $coupon]);

                $Date = date('d-m-Y');
                $ammount = $get_amount;
                $billName = $plan->name;
                $description = $plan->name;
                $billExpiryDays = 3;
                $billExpiryDate = date('d-m-Y', strtotime($Date . ' + 3 days'));
                $billContentEmail = "Thank you for purchasing our product!";

                $some_data = array(
                    'userSecretKey' => $this->secretKey,
                    'categoryCode' => $this->categoryCode,
                    'billName' => $billName,
                    'billDescription' => $description,
                    'billPriceSetting' => 1,
                    'billPayorInfo' => 1,
                    'billAmount' => 100 * $ammount,
                    'billReturnUrl' => $this->returnUrl,
                    'billCallbackUrl' => $this->callBackUrl,
                    'billExternalReferenceNo' => 'AFR341DFI',
                    'billTo' => \Auth::user()->name,
                    'billEmail' => \Auth::user()->email,
                    'billPhone' => '000000000',
                    'billSplitPayment' => 0,
                    'billSplitPaymentArgs' => '',
                    'billPaymentChannel' => '0',
                    'billContentEmail' => $billContentEmail,
                    'billChargeToCustomer' => 1,
                    'billExpiryDate' => $billExpiryDate,
                    'billExpiryDays' => $billExpiryDays
                );
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_URL, 'https://sspay.my/index.php/api/createBill');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
                $result = curl_exec($curl);
                $info = curl_getinfo($curl);
                curl_close($curl);
                $obj = json_decode($result);
                return redirect('https://sspay.my/' . $obj[0]->BillCode);
            } else {
                return redirect()->route('admin.plan.index')->with('error', __('Plan is deleted.'));
            }
        }
        catch (Exception $e) {
            return redirect()->back()->with('error', __($e->getMessage()));
        }
    }

    public function SspayPlanGetPayment(Request $request, $planId, $getAmount, $couponCode)
    {
        if ($couponCode != 0) {
            $coupons = PlanCoupon::where('code', strtoupper($couponCode))->where('is_active', '1')->first();
            $request['coupon_id'] = $coupons->id;
        } else {
            $coupons = null;
        }

        $plan = Plan::find($planId);
        $user = auth()->user();
        $admin_payment_setting = Utility::getAdminPaymentSetting();
        $currency = $admin_payment_setting['CURRENCY_NAME'];
        // $request['status_id'] = 1;

        // 1=success, 2=pending, 3=fail
        try {
            $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
            if ($request->status_id == 3)
            {
                $statuses = 'Fail';
                $order                 = new PlanOrder();
                $order->order_id       = $orderID;
                $order->name           = $user->name;
                $order->card_number    = '';
                $order->card_exp_month = '';
                $order->card_exp_year  = '';
                $order->plan_name      = $plan->name;
                $order->plan_id        = $plan->id;
                $order->price          = $getAmount;
                $order->price_currency = $currency;
                $order->payment_type   = __('Sspay');
                $order->payment_status = $statuses;
                $order->receipt        = '';
                $order->user_id        = $user->id;
                // dd($order);
                $order->save();
                return redirect()->route('admin.plan.index')->with('success', __('Your Transaction is fail please try again.'));
            }
            else if ($request->status_id == 2)
            {
                $statuses = 'pandding';
                $order                 = new PlanOrder();
                $order->order_id       = $orderID;
                $order->name           = $user->name;
                $order->card_number    = '';
                $order->card_exp_month = '';
                $order->card_exp_year  = '';
                $order->plan_name      = $plan->name;
                $order->plan_id        = $plan->id;
                $order->price          = $getAmount;
                $order->price_currency = env('CURRENCY');
                $order->payment_type   = __('Sspay');
                $order->payment_status = $statuses;
                $order->receipt        = '';
                $order->user_id        = $user->id;
                $order->save();
                return redirect()->route('admin.plan.index')->with('success', __('Your transaction on pending'));
            }
            else if ($request->status_id == 1)
            {
                $statuses = 'success';
                $order                 = new PlanOrder();
                $order->order_id       = $orderID;
                $order->name           = $user->name;
                $order->card_number    = '';
                $order->card_exp_month = '';
                $order->card_exp_year  = '';
                $order->plan_name      = $plan->name;
                $order->plan_id        = $plan->id;
                $order->price          = $getAmount;
                $order->price_currency = env('CURRENCY');
                $order->payment_type   = __('Sspay');
                $order->payment_status = $statuses;
                $order->receipt        = '';
                $order->user_id        = $user->id;
                $order->save();
                $assignPlan = $user->assignPlan($plan->id);
                $coupons = Coupon::find($request->coupon_id);
                if (!empty($request->coupon_id)) {
                    if (!empty($coupons)) {
                        $userCoupon         = new UserCoupon();
                        $userCoupon->user_id   = $user->id;
                        $userCoupon->coupon_id = $coupons->id;
                        $userCoupon->order_id  = $orderID;
                        $userCoupon->save();
                        $usedCoupun = $coupons->used_coupon();
                        if ($coupons->limit <= $usedCoupun) {
                            $coupons->is_active = 0;
                            $coupons->save();
                        }
                    }
                }
                if ($assignPlan['is_success']) {
                    return redirect()->route('admin.plan.index')->with('success', __('Plan activated Successfully.'));
                } else {
                    return redirect()->route('admin.plan.index')->with('error', __($assignPlan['error']));
                }
            }
            else
            {
                return redirect()->route('admin.plan.index')->with('error', __('Plan is deleted.'));
            }
        } catch (Exception $e) {
            return redirect()->route('admin.plan.index')->with('error', __($e->getMessage()));
        }
    }

    public function PayWithSspay(Request $request)
    {
        try
        {
            if(\Auth::check()){
                $products = Product::find($request->cartlist['product_list'][0]->product_id);
            }else{
                $products = Product::find($request->product[0]['product_id']);
            }

            $slug = $request->slug;
            $store = Store::where('slug',$slug)->first();
            $theme_id = $request->theme_id;
            $sspay_secret_key = \App\Models\Utility::GetValueByName('sspay_secret_key',$theme_id);
            $sspay_category_code = \App\Models\Utility::GetValueByName('sspay_category_code',$theme_id);
            $CURRENCY = \App\Models\Utility::GetValueByName('CURRENCY',$theme_id);
            $email = json_decode($request->request->get('billing_info'), true)['email'];
            $firstname = json_decode($request->request->get('billing_info'), true)['firstname'];
            $billing_user_telephone = json_decode($request->request->get('billing_info'), true)['billing_user_telephone'];
            $cartlist_final_price = $request->cartlist_final_price;
            $billContentEmail = "Thank you for purchasing our product!";
            $Date = date('d-m-Y');
            $billExpiryDays = 3;
            $billExpiryDate = date('d-m-Y', strtotime($Date . ' + 3 days'));

            $this->callBackUrl = route('store.payment.sspay', [ $store->slug, $cartlist_final_price]);
            $this->returnUrl = route('store.payment.sspay', [ $store->slug, $cartlist_final_price]);

            $some_data = array(
                'userSecretKey' => $sspay_secret_key,
                'categoryCode' => $sspay_category_code,
                'billName' => $products->name,
                'billDescription' => $products->description,
                'billPriceSetting' => 1,
                'billPayorInfo' => 1,
                'billAmount' => 100 * $cartlist_final_price,
                'billReturnUrl' => $this->returnUrl,
                'billCallbackUrl' => $this->callBackUrl,
                'billExternalReferenceNo' => 'AFR341DFI',
                'billTo' => $firstname,
                'billEmail' => $email,
                'billPhone' => $billing_user_telephone,
                'billSplitPayment' => 0,
                'billSplitPaymentArgs' => '',
                'billPaymentChannel' => '0',
                'billContentEmail' => $billContentEmail,
                'billChargeToCustomer' => 1,
                'billExpiryDate' => $billExpiryDate,
                'billExpiryDays' => $billExpiryDays
            );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_URL, 'https://sspay.my/index.php/api/createBill');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
            $result = curl_exec($curl);
            $info = curl_getinfo($curl);
            curl_close($curl);
            $obj = json_decode($result);
            return redirect('https://sspay.my/' . $obj[0]->BillCode);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', __($e->getMessage()));
        }
    }

    public function getProductStatus(Request $request , $slug, $get_amount)
    {
        return redirect()->route('checkout',$slug)->with('error',__('Your Transaction is fail please try again.'));

        $store = Store::where('slug',$slug)->first();


        $pay_id = $request->transaction_id;
        // $cart   = session()->get($slug);
        $response = Cart::cart_list_cookie($store->id);
        $response = json_decode(json_encode($response));
        $requests_data = Session::get('request_data');
        $theme_id = !empty($request->theme_id) ? $request->theme_id : APP_THEME();
        if (Auth::guest()) {
            if ($request->coupon_code != null) {
                $coupon = Coupon::where('id', $request->coupon_info['coupon_id'])->where('store_id', $store->id)->where('theme_id', $theme_id)->first();
                $coupon_email  = $coupon->PerUsesCouponCount();
                $i = 0;
                foreach ($coupon_email as $email) {
                    if ($email == $request->billing_info['email']) {
                        $i++;
                    }
                }

                if (!empty($coupon->coupon_limit_user)) {
                    if ($i  >= $coupon->coupon_limit_user) {
                        return $this->error(['message' => 'Coupon has been expiredd.']);
                    }
                }
            }
        }
        $user_id = $requests_data['user_id'];
        if(!empty($requests_data['method_id'])){

            $request['method_id'] = $requests_data['method_id'];
        }

        $user = Admin::where('type','admin')->first();
        if ($user->type == 'admin') {
            $plan = Plan::find($user->plan);
        }

        $cart = (array)$response->data;
        if(Auth::guest())
        {
            $response = Cart::cart_list_cookie($store->id);
            $response = json_decode(json_encode($response));
            $cartlist = (array)$response->data;

            if (empty($cartlist['product_list'])) {
                return $this->error(['message' => 'Cart is empty.']);
            }

            $cartlist_final_price = !empty($cartlist['final_price']) ? $cartlist['final_price'] : 0;
            $final_sub_total_price = !empty($cartlist['total_sub_price']) ? $cartlist['total_sub_price'] : 0;
            // $final_price = $cartlist['final_price'] - $cartlist['tax_price'];
            $final_price = $response->data->total_final_price;
        $taxes = $cartlist['tax_info'];
            $billing = json_decode($requests_data['billing_info'], true);

            $taxes = $cartlist['tax_info'];
            $products = $cartlist['product_list'];

        }
        elseif (!empty($user_id))
        {
            $cart_list['user_id']   = $user_id;
            $request->merge($requests_data);
            $cartt = new ApiController();
            $cartlist_response = $cartt->cart_list($request);
            $cartlist = (array)$cartlist_response->getData()->data;

            if (empty($cartlist['product_list'])) {
                return Utility::error(['message' => 'Cart is empty.']);
            }

            $cartlist_final_price = !empty($cartlist['final_price']) ? $cartlist['final_price'] : 0;
            $final_sub_total_price = !empty($cartlist['total_sub_price']) ? $cartlist['total_sub_price'] : 0;
            // $final_price = $cartlist['final_price'] - $cartlist['tax_price'];
            $final_price = $cartlist['total_final_price'];
            $taxes = $cartlist['tax_info'];
            $billing = json_decode($request->billing_info, true);
            // $billing = $request->billing_info;
            $taxes = $cartlist['tax_info'];
            $products = $cartlist['product_list'];
        }
        else
        {
            return Utility::error(['message' => 'User not found.']);
        }

        $coupon_price = 0;
        // coupon api call
        if (!empty($requests_data['coupon_info'])) {
            // $coupon_data = json_decode($request->coupon_info, true);
            $coupon_data = $requests_data['coupon_info'];
            $apply_coupon = [
                'coupon_code' => $coupon_data['coupon_code'],
                'sub_total' => $cartlist_final_price,
                'theme_id' => $requests_data['theme_id'],
                'slug' => $requests_data['slug']

            ];
            // $request->request->add($apply_coupon);
            $request->merge($apply_coupon);
            $couponss = new ApiController();
            $apply_coupon_response = $couponss->apply_coupon($request);
            $apply_coupon = (array)$apply_coupon_response->getData()->data;

            $order_array['coupon']['message'] = $apply_coupon['message'];
            $order_array['coupon']['status'] = false;
            if (!empty($apply_coupon['final_price'])) {
                $cartlist_final_price = $apply_coupon['final_price'];
                $coupon_price = $apply_coupon['amount'];
                $order_array['coupon']['status'] = true;
            }
        }

        $delivery_price = 0;
        if ($plan->shipping_method == 'on') {
            if (!empty($request->method_id)) {
                $del_charge = new CartController();
                $delivery_charge = $del_charge->get_shipping_method($request, $slug);
                $content = $delivery_charge->getContent();
                $data = json_decode($content, true);
                $delivery_price = $data['shipping_final_price'];
                $tax_price = $data['final_tax_price'];
            } else {
                return $this->error(['message' => 'Shipping Method not found']);
            }
        } else {
            $tax_price = 0;
            if (!empty($taxes)) {
                foreach ($taxes as $key => $tax) {
                    $tax_price += $tax->tax_price;
                }
            }
        }


        $settings = Setting::where('theme_id', $theme_id)->where('store_id', $store->id)->pluck('value', 'name')->toArray();
        // Order stock decrease start
            $prodduct_id_array = [];
            if (!empty($products)) {
                foreach ($products as $key => $product) {
                    $prodduct_id_array[] = $product->product_id;

                    $product_id = $product->product_id;
                    $variant_id = $product->variant_id;
                    $qtyy = !empty($product->qty) ? $product->qty : 0;

                    $Product = Product::where('id', $product_id)->first();
                    $datas = Product::find($product_id);
                    if($settings['stock_management'] == 'on')
                    {
                        if (!empty($product_id) && !empty($variant_id) && $product_id != 0 && $variant_id != 0) {
                            $ProductStock = ProductStock::where('id', $variant_id)->where('product_id', $product_id)->first();
                            $variationOptions = explode(',', $ProductStock->variation_option);
                            $option = in_array('manage_stock', $variationOptions);
                            if (!empty($ProductStock)) {
                                if($option == true)
                                {
                                    $remain_stock = $ProductStock->stock - $qtyy;
                                    $ProductStock->stock = $remain_stock;
                                    $ProductStock->save();

                                    if($ProductStock->stock <= $ProductStock->low_stock_threshold)
                                    {
                                        if (!empty(json_decode($settings['notification'])) && in_array("enable_low_stock",json_decode($settings['notification'])))
                                        {
                                            if(isset($settings['twilio_setting_enabled']) && $settings['twilio_setting_enabled'] =="on")
                                            {
                                                // dd('low');
                                                Utility::variant_low_stock_threshold($product,$ProductStock,$theme_id,$settings);
                                            }

                                        }
                                    }
                                    if($ProductStock->stock <= $settings['out_of_stock_threshold'])
                                    {
                                        if (!empty(json_decode($settings['notification'])) && in_array("enable_out_of_stock",json_decode($settings['notification'])))
                                        {
                                            if(isset($settings['twilio_setting_enabled']) && $settings['twilio_setting_enabled'] =="on")
                                            {
                                                Utility::variant_out_of_stock($product,$ProductStock,$theme_id,$settings);
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    $remain_stock = $datas->product_stock - $qtyy;
                                    $datas->product_stock = $remain_stock;
                                    $datas->save();
                                    if($datas->product_stock <= $datas->low_stock_threshold)
                                    {
                                        if (!empty(json_decode($settings['notification'])) && in_array("enable_low_stock",json_decode($settings['notification'])))
                                        {
                                            if(isset($settings['twilio_setting_enabled']) && $settings['twilio_setting_enabled'] =="on")
                                            {
                                                Utility::variant_low_stock_threshold($product,$datas,$theme_id,$settings);
                                            }

                                        }
                                    }
                                    if($datas->product_stock <= $settings['out_of_stock_threshold'])
                                    {
                                        if (!empty(json_decode($settings['notification'])) && in_array("enable_out_of_stock",json_decode($settings['notification'])))
                                        {
                                            if(isset($settings['twilio_setting_enabled']) && $settings['twilio_setting_enabled'] =="on")
                                            {
                                                Utility::variant_out_of_stock($product,$datas,$theme_id,$settings);
                                            }
                                        }
                                    }
                                    if($datas->product_stock <= $settings['out_of_stock_threshold'] && $datas->stock_order_status == 'notify_customer')
                                    {
                                        //Stock Mail
                                        $order_email = $billing['email'];
                                        $owner=Admin::find($store->created_by);
                                        // $owner_email=$owner->email;
                                        $ProductId    = '';

                                        try
                                        {
                                            $dArr = [
                                                'item_variable' => $Product->id,
                                                'product_name' => $Product->name,
                                                'customer_name' => $billing['firstname'],
                                            ];

                                            // Send Email
                                            $resp = Utility::sendEmailTemplate('Stock Status', $order_email, $dArr, $owner,$store, $ProductId);
                                        }
                                        catch(\Exception $e)
                                        {
                                            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                                        }
                                        try
                                        {
                                            $mobile_no =$request['billing_info']['billing_user_telephone'];
                                            $customer_name =$request['billing_info']['firstname'];
                                            $msg =   __("Dear,$customer_name .Hi,We are excited to inform you that the product you have been waiting for is now back in stock.Product Name: :$Product->name. ");
                                            $resp  = Utility::SendMsgs('Stock Status', $mobile_no, $msg);
                                        }
                                        catch(\Exception $e)
                                        {
                                            $smtp_error = __('Invalid OAuth access token - Cannot parse access token');
                                        }
                                    }
                                }
                            } else {
                                return $this->error(['message' => 'Product not found .']);
                            }
                        } elseif (!empty($product_id) && $product_id != 0) {

                            if (!empty($Product)) {
                                $remain_stock = $Product->product_stock - $qtyy;
                                $Product->product_stock = $remain_stock;
                                $Product->save();
                                if($Product->product_stock <= $Product->low_stock_threshold)
                                {
                                    if (!empty(json_decode($settings['notification'])) && in_array("enable_low_stock",json_decode($settings['notification'])))
                                    {
                                        if(isset($settings['twilio_setting_enabled']) && $settings['twilio_setting_enabled'] =="on")
                                        {
                                            Utility::low_stock_threshold($Product,$theme_id,$settings);
                                        }
                                    }
                                }

                                if($Product->product_stock <= $settings['out_of_stock_threshold'])
                                {
                                    if (!empty(json_decode($settings['notification'])) && in_array("enable_out_of_stock",json_decode($settings['notification'])))
                                    {
                                        if(isset($settings['twilio_setting_enabled']) && $settings['twilio_setting_enabled'] =="on")
                                        {
                                            Utility::out_of_stock($Product,$theme_id,$settings);
                                        }
                                    }
                                }

                                if($Product->product_stock <= $settings['out_of_stock_threshold'] && $Product->stock_order_status == 'notify_customer')
                                {
                                    //Stock Mail
                                    $order_email = $billing['email'];
                                    $owner=Admin::find($store->created_by);
                                    // $owner_email=$owner->email;
                                    $ProductId    = '';

                                    try
                                    {
                                    $dArr = [
                                    'item_variable' => $Product->id,
                                    'product_name' => $Product->name,
                                    'customer_name' => $billing['firstname'],
                                    ];

                                    // Send Email
                                    $resp = Utility::sendEmailTemplate('Stock Status', $order_email, $dArr, $owner,$store, $ProductId);
                                    }
                                    catch(\Exception $e)
                                    {
                                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                                    }
                                    try
                                    {
                                        $mobile_no =$request['billing_info']['billing_user_telephone'];
                                        $customer_name =$request['billing_info']['firstname'];
                                        $msg =   __("Dear,$customer_name .Hi,We are excited to inform you that the product you have been waiting for is now back in stock.Product Name: :$Product->name. ");
                                        $resp  = Utility::SendMsgs('Stock Status', $mobile_no, $msg);
                                    }
                                    catch(\Exception $e)
                                    {
                                        $smtp_error = __('Invalid OAuth access token - Cannot parse access token');
                                    }
                                }

                            } else {
                                return $this->error(['message' => 'Product not found .']);
                            }
                        } else {
                            return $this->error(['message' => 'Please fill proper product json field .']);
                        }
                    }
                    // remove from cart
                    Cart::where('user_id', $request->user_id)->where('product_id', $product_id)->where('variant_id', $variant_id)->where('theme_id', $theme_id)->where('store_id',$store->id)->delete();
                }
            }
        // Order stock decrease end

        if (!empty($prodduct_id_array)) {
            $prodduct_id_array = $prodduct_id_array = array_unique($prodduct_id_array);
            $prodduct_id_array = implode(',', $prodduct_id_array);
        } else {
            $prodduct_id_array = '';
        }

        // $tax_price = $data['final_tax_price'];

        // $tax_price = 0;
        // if (!empty($taxes)) {
        //     foreach ($taxes as $key => $tax) {
        //         $tax_price += $tax->tax_price;
        //     }
        // }
        $product_reward_point = Utility::reward_point_count($cartlist_final_price, $theme_id);

        // dd($request->all());
        $product_order_id  = '0'. date('YmdHis');
        $is_guest = 1;
        if(Auth::check()) {
            $product_order_id  = $request->user_id . date('YmdHis');
            $is_guest = 0;
        }
        // add in  Order table  start
        $order = new Order();
        $order->product_order_id = $product_order_id;
        $order->order_date = date('Y-m-d H:i:s');
        $order->user_id = !empty($request->user_id) ? $request->user_id : 0;
        $order->is_guest = $is_guest;
        $order->product_id = $prodduct_id_array;
        $order->product_json = json_encode($products);
        // $order->product_price = $final_price;
        $order->product_price = $final_sub_total_price;
        $order->coupon_price = $coupon_price;
        $order->delivery_price = $delivery_price;
        $order->tax_price = $tax_price;
        // $order->final_price = $cartlist_final_price;
        if($plan->shipping_method == "on")
        {
            $order->final_price = $data['shipping_total_price'];
        }
        else{
            $order->final_price = $final_price;
        }
        $order->payment_comment = !empty($requests_data['payment_comment']) ? $requests_data['payment_comment'] : '';
        $order->payment_type = $requests_data['payment_type'];
        $order->payment_status = 'Paid';
        $order->delivery_id = $requests_data['method_id'] ?? 0;
        $order->delivery_comment = !empty($requests_data['delivery_comment']) ? $requests_data['delivery_comment'] : '';
        $order->delivered_status = 0;
        $order->reward_points = SetNumber($product_reward_point);
        $order->additional_note = $request->additional_note;
        $order->theme_id = $theme_id;
        $order->store_id = $store->id;
        $order->save();
        Utility::paymentWebhook($order);
        // add in  Order table end

        $billing_city_id = 0;
        if (!empty($billing['billing_city'])) {
            $cityy = City::where('name', $billing['billing_city'])->first();
            if (!empty($cityy)) {
                $billing_city_id = $cityy->id;
            } else {
                $new_billing_city = new City();
                $new_billing_city->name = $billing['billing_city'];
                $new_billing_city->state_id = $billing['billing_state'];
                $new_billing_city->country_id = $billing['billing_country'];
                $new_billing_city->save();
                $billing_city_id = $new_billing_city->id;
            }
        }

        $delivery_city_id = 0;
        if (!empty($billing['delivery_city'])) {
            $d_cityy = City::where('name', $billing['delivery_city'])->first();
            if (!empty($d_cityy)) {
                $delivery_city_id = $d_cityy->id;
            } else {
                $new_delivery_city = new City();
                $new_delivery_city->name = $billing['delivery_city'];
                $new_delivery_city->state_id = $billing['delivery_state'];
                $new_delivery_city->country_id = $billing['delivery_country'];
                $new_delivery_city->save();
                $delivery_city_id = $new_delivery_city->id;
            }
        }

        $OrderBillingDetail = new OrderBillingDetail();
        $OrderBillingDetail->order_id = $order->id;
        $OrderBillingDetail->product_order_id = $order->product_order_id;
        $OrderBillingDetail->first_name = !empty($billing['firstname']) ? $billing['firstname'] : '';
        $OrderBillingDetail->last_name = !empty($billing['lastname']) ? $billing['lastname'] : '';
        $OrderBillingDetail->email = !empty($billing['email']) ? $billing['email'] : '';
        $OrderBillingDetail->telephone = !empty($billing['billing_user_telephone']) ? $billing['billing_user_telephone'] : '';
        $OrderBillingDetail->address = !empty($billing['billing_address']) ? $billing['billing_address'] : '';
        $OrderBillingDetail->postcode = !empty($billing['billing_postecode']) ? $billing['billing_postecode'] : '';
        $OrderBillingDetail->country = !empty($billing['billing_country']) ? $billing['billing_country'] : '';
        $OrderBillingDetail->state = !empty($billing['billing_state']) ? $billing['billing_state'] : '';
        $OrderBillingDetail->city = $billing_city_id;
        $OrderBillingDetail->theme_id = $theme_id;
        $OrderBillingDetail->delivery_address = !empty($billing['delivery_address']) ? $billing['delivery_address'] : '';
        $OrderBillingDetail->delivery_city = $delivery_city_id;
        $OrderBillingDetail->delivery_postcode = !empty($billing['delivery_postcode']) ? $billing['delivery_postcode'] : '';
        $OrderBillingDetail->delivery_country = !empty($billing['delivery_country']) ? $billing['delivery_country'] : '';
        $OrderBillingDetail->delivery_state = !empty($billing['delivery_state']) ? $billing['delivery_state'] : '';
        $OrderBillingDetail->save();

        // add in Order Coupon Detail table start
        if (!empty($requests_data['coupon_info'])) {
            // coupon stock decrease start
            // $coupon_data = json_decode($requests_data['coupon_info'], true);
            $coupon_data = $requests_data['coupon_info'];
            $Coupon = Coupon::find($coupon_data['coupon_id']);
            // $Coupon->coupon_limit = $Coupon->coupon_limit-1;
            // $Coupon->save();
            // coupon stock decrease end

            // Order Coupon history
            $OrderCouponDetail = new OrderCouponDetail();
            $OrderCouponDetail->order_id = $order->id;
            $OrderCouponDetail->product_order_id = $order->product_order_id;
            $OrderCouponDetail->coupon_id = $coupon_data['coupon_id'];
            $OrderCouponDetail->coupon_name = $coupon_data['coupon_name'];
            $OrderCouponDetail->coupon_code = $coupon_data['coupon_code'];
            $OrderCouponDetail->coupon_discount_type = $coupon_data['coupon_discount_type'];
            $OrderCouponDetail->coupon_discount_number = $coupon_data['coupon_discount_number'];
            $OrderCouponDetail->coupon_discount_amount = $coupon_data['coupon_discount_amount'];
            $OrderCouponDetail->coupon_final_amount = $coupon_data['coupon_final_amount'];
            $OrderCouponDetail->theme_id = $theme_id;
            $OrderCouponDetail->save();

            // Coupon history
            $UserCoupon = new UserCoupon();
            $UserCoupon->user_id = !empty($request->user_id) ? $request->user_id : '0';
            $UserCoupon->coupon_id = $Coupon->id;
            $UserCoupon->amount = $coupon_data['coupon_discount_amount'];
            $UserCoupon->order_id = $order->id;
            $UserCoupon->date_used = now();
            $UserCoupon->theme_id = $theme_id;
            $UserCoupon->save();

            $discount_string = '-' . $coupon_data['coupon_discount_amount'];
            $CURRENCY = Utility::GetValueByName('CURRENCY');
            $CURRENCY_NAME = Utility::GetValueByName('CURRENCY_NAME');
            if ($coupon_data['coupon_discount_type'] == 'flat') {
                $discount_string .= $CURRENCY;
            } else {
                $discount_string .= '%';
            }

            $discount_string .= ' ' . __('for all products');
            $order_array['coupon']['code'] = $coupon_data['coupon_code'];
            $order_array['coupon']['discount_string'] = $discount_string;
            $order_array['coupon']['price'] = SetNumber($coupon_data['coupon_final_amount']);
        }
        // add in Order Coupon Detail table end

        // add in Order Tax Detail table start
        if (!empty($taxes)) {
            foreach ($taxes as $key => $tax) {
                $OrderTaxDetail = new OrderTaxDetail();
                $OrderTaxDetail->order_id = $order->id;
                $OrderTaxDetail->product_order_id = $order->product_order_id;
                $OrderTaxDetail->tax_id = $tax->id;
                $OrderTaxDetail->tax_name = $tax->tax_name;
                $OrderTaxDetail->tax_discount_type = $tax->tax_type;
                $OrderTaxDetail->tax_discount_amount = $tax->tax_amount;
                $OrderTaxDetail->tax_final_amount = $tax->tax_price;
                $OrderTaxDetail->theme_id = $theme_id;
                $OrderTaxDetail->save();

                $order_array['tax'][$key]['tax_string'] = $tax->tax_string;
                $order_array['tax'][$key]['tax_price'] = $tax->tax_price;
            }
        }

        //activity log
        ActivityLog::order_entry(['user_id'=>$order->user_id ,
        'order_id'=> $order->product_order_id ,
        'order_date' => $order->order_date ,
        'products' =>$order->product_id,
        'final_price' =>$order->final_price,
        'payment_type' =>$order->payment_type,
        'theme_id'=>$order->theme_id,
        'store_id'=>$order->store_id]);

        //Order Mail
        $order_email = $OrderBillingDetail->email;
        $owner=Admin::find($store->created_by);
        $owner_email=$owner->email;
        $order_id    = Crypt::encrypt($order->id);

        try
        {
            $dArr = [
            'order_id' => $order->product_order_id,
            ];


            // Send Email
            $resp = Utility::sendEmailTemplate('Order Created', $order_email, $dArr, $owner,$store, $order_id);
            $resp1=Utility::sendEmailTemplate('Order Created For Owner', $owner_email, $dArr,$owner, $store, $order_id);
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }
        try{
            $msg = __("Hello, Welcome to $store->name .Hi,your order id is $order->product_order_id, Thank you for Shopping We received your purchase request, we'll be in touch shortly!. ") ;
            $mess = Utility::SendMsgs('Order Created',$OrderBillingDetail->telephone, $msg);
        } catch(\Exception $e)
        {
            $smtp_error = __('Invalid OAuth access token - Cannot parse access token');
        }

        foreach ($products as $product) {
            $product_data = Product::find($product->product_id);

            if ($product_data) {
                if ($product_data->variant_product == 0) {
                    if ($product_data->track_stock == 1) {
                        OrderNote::order_note_data([
                            'user_id' => !empty($request->user_id) ? $request->user_id : '0',
                            'order_id' => $order->id,
                            'product_name' => !empty($product_data->name)?$product_data->name: '',
                            'variant_product' => $product_data->variant_product,
                            'product_stock' => !empty($product_data->product_stock) ? $product_data->product_stock : '',
                            'status' => 'Stock Manage',
                            'theme_id' => $order->theme_id,
                            'store_id' => $order->store_id,
                        ]);
                    }
                } else {

                    $variant_data = ProductStock::find($product->variant_id);
                    $variationOptions = explode(',', $variant_data->variation_option);
                    $option = in_array('manage_stock', $variationOptions);
                    if ($option == true) {
                        OrderNote::order_note_data([
                            'user_id' => !empty($request->user_id) ? $request->user_id : '0',
                            'order_id' => !empty($order->id) ? $order->id : '',
                            'product_name' => !empty($product_data->name)?$product_data->name: '',
                            'variant_product' => $product_data->variant_product,
                            'product_variant_name' => !empty($variant_data->variant) ? $variant_data->variant : '',
                            'product_stock' => !empty($variant_data->stock) ? $variant_data->stock : '',
                            'status' => 'Stock Manage',
                            'theme_id' => $order->theme_id,
                            'store_id' => $order->store_id,
                        ]);
                    }
                }
            }
        }

        OrderNote::order_note_data([
            'user_id' => !empty($request->user_id) ? $request->user_id : '0',
            'order_id' => $order->id,
            'product_order_id' => $order->product_order_id,
            'delivery_status' => 'Pending',
            'status' => 'Order Created',
            'theme_id' => $order->theme_id,
            'store_id' => $order->store_id
        ]);

        // add in Order Tax Detail table end

        if (!empty($order) && !empty($OrderBillingDetail) && !empty($OrderTaxDetail))
        {
            $order_array['order_id'] = $order->id;

            // Order jason
            $order_complete_json_path = base_path('themes/' . $theme_id . '/theme_json/order-complete.json');
            $order_complete_json = json_decode(file_get_contents($order_complete_json_path), true);

            $order_complate_title = $order_complete_json[0]["inner-list"][0]['field_default_text'];
            $order_complate_description = $order_complete_json[0]["inner-list"][1]['field_default_text'];

            $setting_order_complete_json = AppSetting::where('theme_id', $theme_id)
                ->where('page_name', 'order_complete')
                ->first();
            if (!empty($setting_order_complete_json)) {
                $order_complete_json_array_data = json_decode($setting_order_complete_json->theme_json, true);

                $order_complate_title = $order_complete_json_array_data[0]["inner-list"][0]['value'];
                $order_complate_description = $order_complete_json_array_data[0]["inner-list"][1]['value'];
            }
            $order_complete_json_array["order-complate"]["order-complate-title"] = $order_complate_title . ' #' . $order->product_order_id;
            $order_complete_json_array["order-complate"]["order-complate-description"] = $order_complate_description;


            // return $this->success(['order_id' => $order->id, 'complete_order' => $order_complete_json_array]);
            $cart_array = [];
            $cart_json = json_encode($cart_array);
            Cookie::queue('cart', $cart_json, 1440);
            return redirect()->route('order.summary',$slug)->with('data',$order->product_order_id);
        } else {
            return $this->error(['message' => 'Somthing went wrong.']);
        }

    }

}
