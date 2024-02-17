<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Models\ActivityLog;
use App\Models\AppSetting;
use App\Models\Cart;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderBillingDetail;
use App\Models\OrderCouponDetail;
use App\Models\OrderTaxDetail;
use App\Models\Plan;
use App\Models\PlanCoupon;
use App\Models\PlanOrder;
use App\Models\PlanUserCoupon;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Store;
use App\Models\UserCoupon;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Session;
use YooKassa\Client;
use App\Models\Admin;
use App\Models\OrderNote;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;

class YookassaController extends Controller
{
    //
    public function paywithyookassa(Request $request)
    {
        $payment_setting = Utility::getAdminPaymentSetting();
        $planID = \Illuminate\Support\Facades\Crypt::decrypt($request->plan_id);
        $plan = Plan::find($planID);
        $user = \Auth::user();
        if ($plan) {

            $get_amount = $plan->price;
            try {
                if (!empty($request->coupon)) {
                    $coupons = PlanCoupon::where('code', strtoupper($request->coupon))->where('is_active', '1')->first();
                    if (!empty($coupons)) {
                        $usedCoupun = $coupons->used_coupon();
                        $discount_value = ($plan->price / 100) * $coupons->discount;
                        $get_amount = $plan->price - $discount_value;

                        if ($coupons->limit == $usedCoupun) {
                            return redirect()->back()->with('error', __('This coupon code has expired.'));
                        }
                        if ($get_amount <= 0) {
                            $authuser = \Auth::user();
                            $authuser->plan = $plan->id;
                            $authuser->save();
                            $assignPlan = $authuser->assignPlan($plan->id);
                            if ($assignPlan['is_success'] == true && !empty($plan)) {
                                if (!empty($authuser->payment_subscription_id) && $authuser->payment_subscription_id != '') {
                                    try {
                                        $authuser->cancel_subscription($authuser->id);
                                    } catch (\Exception $exception) {
                                        \Log::debug($exception->getMessage());
                                    }
                                }
                                $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
                                $userCoupon = new PlanUserCoupon();
                                $userCoupon->user = $authuser->id;
                                $userCoupon->coupon = $coupons->id;
                                $userCoupon->order = $orderID;
                                $userCoupon->save();
                                PlanOrder::create(
                                    [
                                        'order_id' => $orderID,
                                        'name' => null,
                                        'email' => null,
                                        'card_number' => null,
                                        'card_exp_month' => null,
                                        'card_exp_year' => null,
                                        'plan_name' => $plan->name,
                                        'plan_id' => $plan->id,
                                        'price' => $get_amount == null ? 0 : $get_amount,
                                        'price_currency' => !empty($payment_setting['CURRENCY_NAME']) ? $payment_setting['CURRENCY_NAME'] : 'USD',
                                        'txn_id' => '',
                                        'payment_type' => 'Cashfree',
                                        'payment_status' => 'success',
                                        'receipt' => null,
                                        'user_id' => $authuser->id,
                                    ]
                                );
                                $assignPlan = $authuser->assignPlan($plan->id);
                                return redirect()->route('admin.plan.index')->with('success', __('Plan Successfully Activated'));
                            }
                        }
                    } else {
                        return redirect()->back()->with('error', __('This coupon code is invalid or has expired.'));
                    }
                }
                $coupon = (empty($request->coupon)) ? "0" : $request->coupon;
                $orderID = strtoupper(str_replace('.', '', uniqid('', true)));

                try {
                    if(is_int((int)$payment_setting['yookassa_shop_id_key']))
                    {
                        $client = new Client();
                        $client->setAuth((int)$payment_setting['yookassa_shop_id_key'], $payment_setting['yookassa_secret_key']);
                        $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
                        $product = 'Basic Package';
                        $payment = $client->createPayment(
                            array(
                                'amount' => array(
                                    'value' => $get_amount,
                                    'currency' => !empty($payment_setting['CURRENCY_NAME']) ? $payment_setting['CURRENCY_NAME'] : 'USD',
                                ),
                                'confirmation' => array(
                                    'type' => 'redirect',
                                    'return_url' => route('admin.plan.get.yookassa.status', ['order_id'=>$orderID,'plan_id'=>$plan->id, 'amount'=>$get_amount,'coupon'=>$coupon]),
                                ),

                                'capture' => true,
                                'description' => 'Заказ №1',
                            ),
                            uniqid('', true)
                        );

                        $type = 'Subscription';

                        Session::put('payment_id',$payment['id']);
                        if($payment['confirmation']['confirmation_url'] != null)
                        {
                            return redirect($payment['confirmation']['confirmation_url']);
                        }
                        else
                        {
                            return redirect()->route('admin.plan.index')->with('error', 'Something went wrong, Please try again');
                        }
                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Please Enter  Valid Shop Id Key');
                    }

                } catch (\Exception $e)
                {
                    return redirect()->route('admin.plan.index')->with('error', __('Incorrect currency of payment.'));
                }
            } catch (\Exception $e) {

                return redirect()->back()->with('error', $e);
            }

        } else {
            return redirect()->route('admin.plan.index')->with('error', __('Plan is deleted.'));
        }


    }

    public function planGetYooKassaStatus(Request $request)
    {
        $payment_setting = Utility::getAdminPaymentSetting();
        $user = \Auth::user();
        $plan = Plan::find($request->plan_id);
        $couponCode = $request->coupon;
        $getAmount = $request->amount;
        $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
        if ($couponCode != 0) {
            $coupons = PlanCoupon::where('code', strtoupper($couponCode))->where('is_active', '1')->first();
            $request['coupon_id'] = $coupons->id;
        } else {
            $coupons = null;
        }

        try {
            if(is_int((int)$payment_setting['yookassa_shop_id_key']))
            {
                $client = new Client();
                $client->setAuth((int)$payment_setting['yookassa_shop_id_key'], $payment_setting['yookassa_secret_key']);
                $paymentId = \Session::get('payment_id');
                \Session::forget('payment_id');

                if($paymentId == null)
                {
                    return redirect()->back()->with('error', __('Transaction Unsuccesfull'));
                }

                $order = new PlanOrder();
                $order->order_id = $orderID;
                $order->name = $user->name;
                $order->card_number = '';
                $order->card_exp_month = '';
                $order->card_exp_year = '';
                $order->plan_name = $plan->name;
                $order->plan_id = $plan->id;
                $order->price = $getAmount;
                $order->price_currency = !empty($payment_setting['CURRENCY_NAME']) ? $payment_setting['CURRENCY_NAME'] : 'USD';
                $order->payment_type = __('yookassa');
                $order->payment_status = 'success';
                $order->txn_id = '';
                $order->receipt = '';
                $order->user_id = $user->id;
                $order->save();
                $assignPlan = $user->assignPlan($plan->id);
                $coupons = PlanCoupon::find($request->coupon_id);
                if (!empty($request->coupon_id)) {
                    if (!empty($coupons)) {
                        $userCoupon = new PlanUserCoupon();
                        $userCoupon->user = $user->id;
                        $userCoupon->coupon = $coupons->id;
                        $userCoupon->order = $orderID;
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
            } else {
                return redirect()->route('admin.plan.index')->with('error', 'Payment Failed.');
            }
            return redirect()->route('admin.plan.index')->with('success', 'Plan activated Successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.plan.index')->with('error', __($e->getMessage()));
        }

    }


    public function OrderPayWithYookassa(Request $request)
    {
        $slug = !empty($request->slug) ? $request->slug : '';
        $store = Store::where('slug',$slug)->first();

        $theme_id = $request->theme_id;

        $yookassa_shop_id_key = \App\Models\Utility::GetValueByName('yookassa_shop_id_key',$theme_id);
        $yookassa_secret_key = \App\Models\Utility::GetValueByName('yookassa_secret_key',$theme_id);
        $CURRENCY_NAME = \App\Models\Utility::GetValueByName('CURRENCY_NAME',$theme_id);
        $CURRENCY = \App\Models\Utility::GetValueByName('CURRENCY',$theme_id);

        $orderID = $request->user_id . date('YmdHis');
        $cartlist_final_price = $request->cartlist_final_price;
        try
        {
            if(is_int((int)$yookassa_shop_id_key))
            {
                $client = new Client();
                $client->setAuth((int)$yookassa_shop_id_key, $yookassa_secret_key);
                $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
                $payment = $client->createPayment(
                    array(
                        'amount' => array(
                            'value' => $cartlist_final_price,
                            'currency' => !empty($CURRENCY_NAME) ? $CURRENCY_NAME : 'USD',
                        ),
                        'confirmation' => array(
                            'type' => 'redirect',
                            'return_url' => route('yookassa.callback', $slug),
                        ),

                        'capture' => true,
                        'description' => 'Заказ №1',
                    ),
                    uniqid('', true)
                );

                $type = 'Subscription';

                Session::put('payment_id',$payment['id']);
                Session::put('request_data', $request->all());
                if($payment['confirmation']['confirmation_url'] != null)
                {
                    return redirect($payment['confirmation']['confirmation_url']);
                }
                else
                {
                    return redirect()->route('admin.plan.index')->with('error', 'Something went wrong, Please try again');
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Please Enter  Valid Shop Id Key');
            }

        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', __('Incorrect currency of payment.'));
        }

    }

    public function yookassacallback(Request $request,$slug)
    {
        $slug = !empty($request->slug) ? $request->slug : '';
        $store = Store::where('slug',$slug)->first();
        // $theme_id = $store->theme_id;
        $requests_data =Session::get('request_data');
        Session::forget('request_data');
        $user_id = $requests_data['user_id'];
        if(!empty($requests_data['method_id'])){
            $request['method_id'] = $requests_data['method_id'];
        }

        $user = Admin::where('type','admin')->first();
        if ($user->type == 'admin') {
            $plan = Plan::find($user->plan);
        }

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
        if(Auth::guest()) {
            $rules = [
                'billing_info' => 'required',
                'payment_type' => 'required',
                'delivery_id' => 'required',
            ];
        } else {
            $rules = [
                'user_id' => 'required',
                'billing_info' => 'required',
                'payment_type' => 'required',
                'delivery_id' => 'required',
            ];
        }

        $validator = \Validator::make($requests_data, $rules);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            Utility::error([
                'message' => $messages->first()
            ]);
        }

        $cartlist_final_price = 0;
        $final_price = 0;

        // cart list api call
        if(Auth::guest()){

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

        } elseif (!empty($user_id)) {
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
        } else {
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

        try{
            $msg = __("Hello, Welcome to $store->name .Hi,your order id is $order->product_order_id, Thank you for Shopping We received your purchase request, we'll be in touch shortly!. ") ;
            $mess = Utility::SendMsgs('Order Created',$OrderBillingDetail->telephone, $msg);
        } catch(\Exception $e)
        {
            $smtp_error = __('Invalid OAuth access token - Cannot parse access token');
        }
        // add in Order Tax Detail table end

        if (!empty($order) && !empty($OrderBillingDetail) && !empty($OrderTaxDetail)) {

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
