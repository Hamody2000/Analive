<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use App\Models\Store;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductAutoPosterController extends Controller
{
    public function __construct()
    {
        if (request()->segment(1) != 'admin') {
            $slug = request()->segment(1);
            $this->store = Store::where('slug', $slug)->first();
            $this->APP_THEME = $this->store->theme_id;
        } else {

            $this->middleware('auth');
            $this->middleware(function ($request, $next) {
                $this->user = Auth::user();
                $this->store = Store::where('id', $this->user->current_store)->first();
                if ($this->store) {
                    $this->APP_THEME = $this->store->theme_id;
                } else {
                    return redirect()->back()->with('error', __('Permission Denied.'));
                }

                return $next($request);
            });
        }
    }

    public function index()
    {
        // $user = \Auth::guard('admin')->user();
        if (Auth::user()->can('Manage Products')) {
            $store_id = Store::where('id', getCurrentStore())->first();

            $ThemeSubcategory = Utility::ThemeSubcategory();
            $products = Product::where('theme_id', $store_id->theme_id)->where('store_id', getCurrentStore())->orderBy('id', 'desc')->get();
            $settings = Setting::where('theme_id',$store_id->theme_id)->where('store_id', getCurrentStore())->pluck('value', 'name')->toArray();
            return view('product.index', compact('products', 'ThemeSubcategory','settings'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function facebookLogin()
    {
        return view('product.auto-poster.facebookLogin');
    }

    public function instagramLogin()
    {
        return view('product.auto-poster.instagramLogin');
    }
}
