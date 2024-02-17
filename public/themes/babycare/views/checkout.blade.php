@extends('layouts.layouts')

@section('page-title')
    {{ __('Checkout') }}
@endsection

@section('content')
    <div class="wrapper wrapper-top">
        <section class="checkout-page padding-bottom padding-top">
            <div class="container">
                <div class="my-acc-head">
                    <div class="d-flex justify-content-start back-toshop">
                        <a href="{{ route('page.product-list', $slug) }}" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                        fill="white"></path>
                                </svg>
                            </span>
                            {{ __('Back to Shop') }}
                        </a>
                    </div>
                    <div class="section-title">
                        <h2>{{ __('Checkout') }}</h2>
                    </div>
                </div>
                <div class="row align-items-start">
                    <div class="col-lg-9 col-12">
                        @if (!Auth::check())
                            <div class="set has-children is-open">
                                <a href="javascript:;" class="acnav-label">
                                    <span> {{ __('Step 1') }} : <b>{{ __('Checkout options') }}</b></span>
                                </a>
                                <div class="acnav-list" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-6 col-12 ">
                                            <h3 class="check-head">{{ __('New Customer?') }}</h3>
                                            <p>{{ __('By creating an account you will be able to shop faster, be up to date on an
                                                                                                                        order status,
                                                                                                                        and keep track of the orders you have previously made.') }}
                                            </p>
                                            <div class="btn-flex d-flex align-items-center">
                                                <a href="{{ route('register', $slug) }}" class="btn  reg-btn">
                                                    {{ __('Register') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14"
                                                        viewBox="0 0 35 14" fill="none">
                                                        <path
                                                            d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a class="btn-secondary login-btn" href="{{ route('login', $slug) }}">
                                                    {{ __('Login') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14"
                                                        viewBox="0 0 35 14" fill="none">
                                                        <path
                                                            d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <form method="POST" action="{{ route('login', $slug) }}" class="login-form">
                                                @csrf
                                                <div class="form-container">
                                                    <div class="form-heading">
                                                        <h3>{{ __('Log in') }}</h3>
                                                    </div>
                                                </div>
                                                <div class="form-container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p>{{ __('I am a returning customer') }}</p>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('E-mail') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="shop@company.com" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Password') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                <input type="password" name="password" class="form-control"
                                                                    placeholder="**********" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-container">
                                                    <div class="row align-items-center form-footer  ">
                                                        <div class="col-lg-12  col-12 d-flex align-items-center">
                                                            <button class="btn-secondary" type="submit">
                                                                {{ __('Login') }}
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                                    height="14" viewBox="0 0 35 14" fill="none">
                                                                    <path
                                                                        d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                            <a href="#"
                                                                class="forgot-pass">{{ __('Forgot Password?') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::check())
                            {!! Form::open([
                                'route' => ['place.order', $slug],
                                'method' => 'post',
                                'enctype' => 'multipart/form-data',
                                'id' => 'formdata',
                            ]) !!}
                        @else
                            {!! Form::open([
                                'route' => ['place.order.guest', $slug],
                                'method' => 'post',
                                'enctype' => 'multipart/form-data',
                                'id' => 'formdata',
                            ]) !!}
                        @endif
                        <div class="checkout-page-left">
                            <div class="set has-children billing_data_tab is-open">
                                <a href="javascript:;" class="acnav-label">
                                    <span>{{ __('Step') }} {{ Auth::check() ? '1' : '2' }}:
                                        <b>{{ __('Billing details') }}</b></span>
                                </a>
                                <div class="acnav-list billing_data_tab_list" style="display: block;">
                                    <h3 class="check-head">{{ _('Your Personal Details') }}</h3>
                                    {{-- <form class="personal-info-form">  --}}
                                    <div class="form-container">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>{{ __('First Name') }}<sup aria-hidden="true">*</sup>:</label>
                                                    {!! Form::text('billing_info[firstname]', !empty(Auth::user()) ? Auth::user()->first_name : '', [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'John',
                                                        // 'required' => true,
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>{{ __('Last Name') }}<sup aria-hidden="true">*</sup>:</label>
                                                    {!! Form::text('billing_info[lastname]', !empty(Auth::user()) ? Auth::user()->last_name : '', [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Doe',
                                                        // 'required' => true,
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>{{ __('E-mail') }}<sup aria-hidden="true">*</sup>:</label>
                                                    {!! Form::email('billing_info[email]', !empty(Auth::user()) ? Auth::user()->email : '', [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'shop@company.com',
                                                        // 'required' => true,
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>{{ __('Telephone') }}<sup aria-hidden="true">*</sup>:</label>
                                                    {!! Form::number('billing_info[billing_user_telephone]', !empty(Auth::user()) ? Auth::user()->mobile : '', [
                                                        'class' => 'form-control',
                                                        'placeholder' => '1234567890',
                                                        // 'required' => true,
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </form> --}}

                                    <div class="your-add-form">
                                        <section>
                                            <h3 class="check-head">{{ __('Billing Address') }}</h3>
                                            <div class="form-container">
                                                <div class="row">
                                                    @auth
                                                        @if (!empty($address_list->data->data))
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label> {{ __('Address') }} <sup
                                                                            aria-hidden="true">*</sup>:</label>
                                                                    <select
                                                                        class="form-control billing_address_list shipping_list">
                                                                        @if (empty($address_list->data->data))
                                                                            <option value="">{{ __('select address') }}
                                                                            </option>
                                                                        @endif
                                                                        @foreach ($address_list->data->data as $address)
                                                                            <option value="{{ $address->id }}">
                                                                                {{ $address->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <a href="{{ route('my-account.index', $slug) }}">
                                                                        <i class="ti ti-circle-plus"
                                                                            style="font-size: 25px;"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endauth

                                                    @if (\Auth::user() && empty($address_list->data->data))
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Address') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::text('billing_info[billing_address]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'address',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 list_height_css">
                                                            <div class="form-group">
                                                                <label>{{ __('Country') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[billing_country]', $country_option, null, [
                                                                    'class' => 'form-control country_change',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 list_height_css">
                                                            <div class="form-group">
                                                                <label>{{ __('Region') }} / {{ __('State') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[billing_state]', [], null, [
                                                                    'class' => 'form-control state_name state_chage',
                                                                    'placeholder' => 'Select State',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 list_height_css">
                                                            <div class="form-group">
                                                                <label>{{ __('City') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[billing_city]', [], null, [
                                                                    'class' => 'form-control city_change',
                                                                    'placeholder' => 'Select city',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Post Code') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::number('billing_info[billing_postecode]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'post code',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @guest
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Address') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::text('billing_info[billing_address]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'address',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 list_height_css">
                                                            <div class="form-group">
                                                                <label>{{ __('Country') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[billing_country]', $country_option, null, [
                                                                    'class' => 'form-control country_change',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 list_height_css">
                                                            <div class="form-group">
                                                                <label>{{ __('Region') }} / {{ __('State') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[billing_state]', [], null, [
                                                                    'class' => 'form-control state_name state_chage',
                                                                    'placeholder' => 'Select State',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12 list_height_css">
                                                            <div class="form-group">
                                                                <label>{{ __('City') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[billing_city]', [], null, [
                                                                    'class' => 'form-control city_change',
                                                                    'placeholder' => 'Select city',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Post Code') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::number('billing_info[billing_postecode]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'post code',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                    @endguest

                                                    @auth
                                                        @if (!empty($address_list->data->data))
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label> </label>
                                                                    <div class="checkbox-custom">
                                                                        <input type="checkbox" id="da"
                                                                            name="delivery_and_billing"
                                                                            class="delivery_and_billing">
                                                                        <label for="da">
                                                                            <span>{{ __('My delivery and billing addresses are the same') }}.</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                        </section>

                                        <section class="Delivery_Address">
                                            <h3 class="check-head">{{ __('Delivery Address') }}</h3>
                                            <div class="form-container addressbook_checkout_edit">

                                                @if (\Auth::user() && empty($address_list->data->data))
                                                    <div class="row list_height_css">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Address') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::text('billing_info[delivery_address]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'address',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Country') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[delivery_country]', $country_option, null, [
                                                                    'class' => 'form-control country_change',
                                                                    'required' => true,
                                                                    'id' => 'country_id',
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Region') }} / {{ __('State') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[delivery_state]', [], null, [
                                                                    'class' => 'form-control state_name state_chage delivery_list',
                                                                    'placeholder' => 'Select State',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                    'id' => 'state_id',
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('City') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[delivery_city]', [], null, [
                                                                    'class' => 'form-control city_change',
                                                                    'placeholder' => 'Select city',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Post Code') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::number('billing_info[delivery_postcode]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'post code',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @guest
                                                    <div class="row list_height_css">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Address') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::text('billing_info[delivery_address]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'address',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Country') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[delivery_country]', $country_option, null, [
                                                                    'class' => 'form-control country_change',
                                                                    'required' => true,
                                                                    'id' => 'country_id',
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Region') }} / {{ __('State') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[delivery_state]', [], null, [
                                                                    'class' => 'form-control state_name state_chage delivery_list',
                                                                    'placeholder' => 'Select State',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                    'id' => 'state_id',
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('City') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::select('billing_info[delivery_city]', [], null, [
                                                                    'class' => 'form-control city_change',
                                                                    'placeholder' => 'Select city',
                                                                    'required' => true,
                                                                    'data-select' => 0,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>{{ __('Post Code') }}<sup
                                                                        aria-hidden="true">*</sup>:</label>
                                                                {!! Form::number('billing_info[delivery_postcode]', null, [
                                                                    'class' => 'form-control getvalueforval',
                                                                    'placeholder' => 'post code',
                                                                    'required' => true,
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endguest
                                            </div>

                                            @guest
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label> </label>
                                                        <div class="checkbox-custom">
                                                            <input type="checkbox" id="register" name="register"
                                                                class="">
                                                            <label for="register">
                                                                <span>{{ __(' Create an account?') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endguest

                                        </section>

                                        <div class="form-container">
                                            <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
                                                <button class="btn continue-btn confirm_btn billing_done" type="button">
                                                    {{ __('Continue') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12"
                                                        viewBox="0 0 11 12" fill="none">
                                                        <g clip-path="url(#down)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.28956 0.546387C5.04611 0.546383 4.84876 0.743733 4.84875 0.987181L4.84862 9.59851L3.84237 8.56269C3.67274 8.38807 3.39367 8.38403 3.21905 8.55366C3.04443 8.72329 3.04039 9.00236 3.21002 9.17698L4.97323 10.992C5.05623 11.0774 5.17028 11.1257 5.2894 11.1257C5.40852 11.1257 5.52257 11.0774 5.60558 10.992L7.36878 9.17698C7.53841 9.00236 7.53437 8.72329 7.35975 8.55366C7.18514 8.38403 6.90606 8.38807 6.73643 8.56269L5.73022 9.59847L5.73035 0.987195C5.73036 0.743747 5.53301 0.54639 5.28956 0.546387Z"
                                                                fill="white" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="down">
                                                                <rect width="10.5792" height="10.5792" fill="white"
                                                                    transform="translate(10.5791 0.546387) rotate(90)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Payment List --}}
                            <div class="set has-children paymentlist_data_tab">
                                <a href="javascript:;" class="acnav-label">
                                    <span>Step {{ Auth::check() ? '2' : '3' }}: <b>{{ __('Payments Method') }}</b></span>
                                </a>
                                <div class="acnav-list paymentlist_data">

                                </div>
                            </div>

                            {{-- Additional Notes --}}
                            @if (isset($settings['additional_notes']) && $settings['additional_notes'] == 'on')
                                <div class="set has-children">
                                    <a href="javascript:;" class="acnav-label additional_notes_tab">
                                        <span>Step {{ Auth::check() ? '3' : '4' }}:
                                            <b>{{ __('Additional Notes') }}</b></span>
                                    </a>
                                    <div class="acnav-list additional_notes">

                                    </div>
                                </div>
                            @endif

                            {{-- Coupon data --}}
                            {!! Form::hidden('coupon_code', null, ['id' => 'coupon_code']) !!}
                            {!! Form::hidden('sub_total', null, ['id' => 'sub_total_checkout_page']) !!}

                            <div class="set has-children comfirm_list_tab">
                                <a href="javascript:;" class="acnav-label">
                                    <span>{{ __('Step') }} {{ Auth::check() ? '4' : '5' }}: <b>
                                            {{ __('Confirm Order') }}</b></span>
                                </a>
                                <div class="acnav-list comfirm_list_data">
                                    <h3 class="check-head">{{ __('Confirm order') }}</h3>
                                    <p>{{ __('Please select the preferred payment method to use on this order.') }}</p>
                                    <div class="order-confirmation-body">
                                        <div class="row">
                                            <div class="checkout_products col-md-4 col-sm-6 col-12">
                                                <div class="order-confirm-details">
                                                    <h5> {{ __('Product informations') }} :</h5>
                                                    <ul>
                                                        <li>1x Sunglasses with black ($24.99)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="order-confirm-details">
                                                    <h5>{{ __('Delivery informations') }}:</h5>
                                                    <p class="mb-5"><b>{{ __('Address') }} : </b> <span
                                                            class="delivery_address"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('city') }} : </b> <span
                                                            class="delivery_city"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('state') }} : </b> <span
                                                            class="delivery_state"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('Country') }} : </b> <span
                                                            class="delivery_country"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('Postcode') }} : </b> <span
                                                            class="delivery_postcode"> </span> </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-12">
                                                <div class="order-confirm-details">
                                                    <h5>{{ __('Billing informations') }}:</h5>
                                                    <p class="mb-5"><b>{{ __('Address') }} : </b> <span
                                                            class="billing_address"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('city') }} : </b> <span
                                                            class="billing_city"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('state') }} : </b> <span
                                                            class="billing_state"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('Country') }} : </b> <span
                                                            class="billing_country"> </span> </p>
                                                    <p class="mb-5"><b>{{ __('Postcode') }} : </b> <span
                                                            class="billing_postecode"> </span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-payment-box">
                                        <div class="order-paymentcol">
                                            <div class="order-paycol-inner">
                                                <p>{{ __('Payment method') }}</p>
                                                <img src="" class="payment_img_path" alt="">
                                            </div>
                                        </div>
                                        <div class="order-paymentcol">
                                            {{-- <div class="order-paycol-inner">
                                            <p>{{ __('Delivery method') }}</p>
                                            <img src=""
                                                class="shipping_img_path" alt="">
                                        </div> --}}
                                        </div>
                                        <div class="checkout_amount order-paymentcol">
                                            <div class="order-paycol-inner">
                                                <div
                                                    class="d-flex align-items-center justify-content-between payment-ttl-row">
                                                    <div class="payment-ttl-left">
                                                        <span>
                                                            {{ __('Sub-total') }}: <b> $0.00</b>
                                                        </span>
                                                        <span>
                                                            {{ __('TAX') }} (00%)<b>$0.30</b>
                                                        </span>
                                                    </div>
                                                    <div class="payment-ttl-left">
                                                        <h5>{{ __('Total') }}:</h5>
                                                        <div class="ttl-pric"> $0.00 </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="payment_type" id="payment_type" value="">
                                    <input type="hidden" class="method_id" id="method_id" name="method_id"
                                        value="">
                                    <div class="form-container">
                                        <div class="d-flex acc-back-btn-wrp align-items-center justify-content-end">
                                            <button class="btn continue-btn place_order_submit" id="payfast_form"
                                                type="submit">
                                                {{ __('Confirm Order') }}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="14"
                                                    viewBox="0 0 35 14" fill="none">
                                                    <path
                                                        d="M25.0749 14L35 7L25.0805 0L29.12 6.06667H0V7.93333H29.12L25.0749 14Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="checkout_page_cart col-lg-3 col-12 ">
                        <div class="checkout-page-right">

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @php
            $homepage_custom_banner_img = $homepage_custom_banner_label = $homepage_custom_banner_title = $homepage_custom_banner_sub_text = $homepage_custom_banner_text = '';
            
            $homepage_custom_banner = array_search('homepage-custom-banner', array_column($theme_json, 'unique_section_slug'));
            if ($homepage_custom_banner != '') {
                $homepage_custom_banner_value = $theme_json[$homepage_custom_banner];
            
                foreach ($homepage_custom_banner_value['inner-list'] as $key => $value) {
                    if ($value['field_slug'] == 'homepage-custom-banner-bg-image') {
                        $homepage_custom_banner_img = $value['field_default_text'];
                    }
                    if ($value['field_slug'] == 'homepage-custom-banner-label') {
                        $homepage_custom_banner_label = $value['field_default_text'];
                    }
                    if ($value['field_slug'] == 'homepage-custom-banner-title') {
                        $homepage_custom_banner_title = $value['field_default_text'];
                    }
                    if ($value['field_slug'] == 'homepage-custom-banner-sub-text') {
                        $homepage_custom_banner_sub_text = $value['field_default_text'];
                    }
                    if ($value['field_slug'] == 'homepage-custom-banner-text') {
                        $homepage_custom_banner_text = $value['field_default_text'];
                    }
                }
            }
        @endphp

        <section class="custom-banner-section-two custom-banner-section-two-pdp">
            <div class="container">
                <div class="custom-banner-two"
                    style="background-image: url({{ get_file($homepage_custom_banner_img) }});">
                    <div class="custom-banner-inner">
                        <div class="label">{!! $homepage_custom_banner_label !!}</div>
                        <h2>{!! $homepage_custom_banner_title !!}</h2>
                        <p>{!! $homepage_custom_banner_sub_text !!}</p>
                        <form class="footer-subscribe-form" action="{{ route('newsletter.store', $slug) }}"
                            method="post">
                            @csrf
                            <div class="input-box">
                                <input type="email" placeholder="Type your address email......" name="email">
                                <button class="btn-subscibe">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        viewBox="0 0 17 17" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.6883 2.12059C14.0686 1.54545 15.4534 2.93023 14.8782 4.31056L10.9102 13.8338C10.1342 15.6962 7.40464 15.3814 7.07295 13.3912L6.5779 10.4209L3.60764 9.92589C1.61746 9.5942 1.30266 6.8646 3.16509 6.08859L12.6883 2.12059ZM13.6416 3.79527C13.7566 3.51921 13.4796 3.24225 13.2036 3.35728L3.68037 7.32528C3.05956 7.58395 3.1645 8.49381 3.82789 8.60438L6.79816 9.09942C7.36282 9.19353 7.80531 9.63602 7.89942 10.2007L8.39446 13.171C8.50503 13.8343 9.41489 13.9393 9.67356 13.3185L13.6416 3.79527Z"
                                            fill="#12131A" />
                                    </svg>
                                </button>
                            </div>
                            <div class="checkbox">
                                {{-- <input type="checkbox" id="footercheck"> --}}
                                <label for="footercheck">
                                    {!! $homepage_custom_banner_text !!}
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    @php
        $theme_name = !empty(env('DATA_INSERT_APP_THEME')) ? env('DATA_INSERT_APP_THEME') : APP_THEME();
        $is_Stripe_enabled = \App\Models\Utility::GetValueByName('is_stripe_enabled', $theme_name);
        $is_Stripe_enabled = $is_Stripe_enabled == 'on' ? 1 : 0;
        $publishable_key = \App\Models\Utility::GetValueByName('publishable_key', $theme_name);
        $stripe_secret = \App\Models\Utility::GetValueByName('stripe_secret', $theme_name);
        $payfast_mode = \App\Models\Utility::GetValueByName('payfast_mode', $theme_name);
        $pfHost = $payfast_mode == 'sandbox' ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
    @endphp

@endsection

@push('page-script')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
    <script>
        $(document).ready(function() {
            var form = $("#formdata");
            form.validate({
                rules: {
                    'billing_info[firstname]': "required",
                    'billing_info[lastname]': "required",
                    'billing_info[email]': "required",
                    'billing_info[billing_user_telephone]': "required",
                    'billing_info[billing_address]': "required",
                    'billing_info[billing_postecode]': "required",
                    'billing_info[delivery_address]': "required",
                    'billing_info[delivery_postcode]': "required",
                    'billing_info[billing_country]': "required",

                },
                messages: {
                    'billing_info[firstname]': "<span class='text-danger billing_data_error'> please enter first name </span>",
                    'billing_info[lastname]': "<span class='text-danger billing_data_error'>please enter last name </span>",
                    'billing_info[email]': "<span class='text-danger billing_data_error'>please enter valid email </span>",
                    'billing_info[billing_user_telephone]': "<span class='text-danger billing_data_error'>please enter telephone number </span>",
                    'billing_info[billing_address]': "<span class='text-danger billing_data_error'>please enter billing address </span>",
                    'billing_info[billing_postecode]': "<span class='text-danger billing_data_error'>please enter billing postcode </span>",
                    'billing_info[delivery_address]': "<span class='text-danger billing_data_error'>please enter delivery address </span>",
                    'billing_info[delivery_postcode]': "<span class='text-danger billing_data_error'>please enter delivery postcode </span>",
                    'billing_info[billing_country]': "<span class='text-danger billing_data_error'>please select country </span>",
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            get_cartlist();
        });

        $(document).ready(function() {
            $('.delivery_and_billing').trigger('change');
            $('.billing_address_list').trigger('change');

            setTimeout(() => {
                getBillingdetail();
                $('.shipping_change:checked').trigger('change');
                $('.payment_change:checked').trigger('change');
            }, 200);
        });

        $(document).on('change', '.delivery_and_billing', function(e) {
            $('.Delivery_Address').hide();
            if ($(this).prop('checked') != true) {
                $('.Delivery_Address').show();
            }

            var guest = '{{ Auth::guest() }}';
            if (guest == 1 && $(this).prop('checked') == true) {
                $('.Delivery_Address').show();

                var billing_address = $('input[name="billing_info[billing_address]"]').val();
                $('input[name="billing_info[delivery_address]"]').val(billing_address);

                var billing_country = $('select[name="billing_info[billing_country]"]').val();
                $('select[name="billing_info[delivery_country]"]').next().remove();
                $('select[name="billing_info[delivery_country]"]').val(billing_country);

                var billing_state = $('select[name="billing_info[billing_state]"]').val();
                $('select[name="billing_info[delivery_state]"]').attr('data-select', billing_state);

                var billing_city = $('select[name="billing_info[billing_city]"]').val();
                $('select[name="billing_info[delivery_city]"]').attr('data-select', billing_city);

                var billing_address = $('input[name="billing_info[billing_postecode]"]').val();
                $('input[name="billing_info[delivery_postcode]"]').val(billing_address);
            }
        });

        $(document).on('keyup', '.getvalueforval', function(e) {
            getBillingdetail();
        });

        $(document).on('change', '.shipping_change', function(e) {
            $('.shipping_img_path').attr('alt', '');
            var shipping_value = $(this).val();
            var shipping_img_path = $('.shippingimag' + shipping_value).attr('src');
            $('.shipping_img_path').attr('src', shipping_img_path);
            $('.shipping_img_path').attr('alt', shipping_value);
        });

        $(document).on('change', '.payment_change', function(e) {
            $('.payment_img_path').attr('alt', '');
            var payment_value = $(this).val();
            var payment_img_path = $('.paymentimag' + payment_value).attr('src');
            $('.payment_img_path').attr('src', payment_img_path);
            $('.payment_img_path').attr('alt', payment_value);
            $('.payment_type').attr('value', payment_value);

        });

        $(document).on('change', '.billing_address_list', function(e) {
            var billing_address_id = $(this).val();

            var data = {
                id: billing_address_id
            };

            $.ajax({
                url: '{{ route('get.addressbook.data', $slug) }}',
                method: 'GET',
                data: data,
                context: this,
                success: function(response) {
                    $('.addressbook_checkout_edit').html(response.addressbook_checkout_edit);
                    $('.country_change').trigger('change');
                    getBillingdetail();
                }
            });
        });

        function shipping_data(response, temp = 0) {

            var html = '';
            $.each(response.shipping_method, function(index, method) {

                var checked = index === temp ? 'checked' : '';
                html += '<div class="radio-group"><input type="radio" name="shipping_id" data-action ="' + index +
                    '" data-id="' + method.id + '" value="' + method.cost + '" id="shipping_price' + index +
                    '" class="shipping_mode" ' + checked + '>' +
                    ' <label name="shipping_label" for="shipping_price' + index + '"> ' + method.method_name +
                    '</label></div>';
            });
            setTimeout(() => {
                $('#shipping_location_content').html(html);
                $('.CURRENCY').html(response.CURRENCY);
                getshippingdata(false);
            }, 500);
        }

        // guest country wise shipping method
        $(document).on('change', '.delivery_list', function(e) {
            setTimeout(() => {
                var stateId = $("#state_id option:selected").val();
                var countryId = $("#country_id option:selected").val();
                var product_id = $('#product_id').val();
                var product_qty = $('#product_qty').val();

                var data = {
                    stateId: stateId,
                    countryId: countryId,
                    product_id: product_id,
                    product_qty: product_qty,
                };
                $.ajax({
                    url: '{{ route('get.shipping.data', $slug) }}',
                    method: 'POST',
                    data: data,
                    context: this,
                    success: function(response) {
                        shipping_data(response);
                    }
                });
            }, 700);
        });

        // Auth shipping method
        $(document).on('change', '.shipping_list', function(e) {
            var billing_address_id = $(this).val();
            var product_id = $('#product_id').val();
            var product_qty = $('#product_qty').val();
            var coupon_code = $('.coupon_code').val();

            var data = {
                address_id: billing_address_id,
                product_id: product_id,
                product_qty: product_qty,
                coupon_code: coupon_code,
            };

            $.ajax({
                url: '{{ route('get.shipping.data', $slug) }}',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {
                    shipping_data(response)
                }
            });
        });

        function getshippingdata(toastr_status = true) {
            var product_qty = $('#product_qty').val();
            var method_id = $('input[name="shipping_id"]:checked').attr('data-id');
            var data = {
                product_qty: product_qty,
                method_id: method_id,
            };

            $.ajax({
                url: '{{ route('shipping.method', $slug) }}',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {

                    $('#shipping_final_price').val(response.shipping_final_price);
                    $('.shipping_final_price').html(response.shipping_final_price);
                    $('.shipping_total_price').html(response.shipping_total_price);
                    $('.final_tax_price').html(response.final_tax_price);
                    $('.method_id').attr('value', method_id);

                    if (toastr_status == true) {
                        show_toastr('Success', response.message, 'success');
                    }
                }
            });
        }

        function getcoupondata(toastr_status = true) {
            var billing_address_id = $('.billing_address_list').val();
            var sub_total = $('.final_amount_currency').attr('final_total');
            var coupon_code = $('.coupon_code').val();
            var theme_id = $('.coupon_code').attr('theme_id');
            var final_sub_total = $('#subtotal').val();

            var temp = $('input[name="shipping_id"]:checked').data('action');

            var data = {
                sub_total: sub_total,
                coupon_code: coupon_code,
                theme_id: theme_id,
                address_id: billing_address_id,
                final_sub_total: final_sub_total,
            }

            $.ajax({
                url: '{{ route('applycoupon', $slug) }}',
                method: 'POST',
                data: data,
                context: this,
                success: function(response) {
                    console.log(response, 1, response.data.final_amount_currency);
                    $('#coupon_code').attr('value', '');
                    if (response.status == 0) {
                        show_toastr('Error', response.data.message, 'error');
                    } else {
                        $('.discount_amount_currency').html(' - ' + response.data.discount_amount_currency);
                        $('.final_amount_currency1').html(response.data.final_amount_currency);
                        $('.final_amount_currency').html(response.data.final_amount_currency);
                        $('.final_amount_currency').attr('final_total', response.data.discount_price);
                        $('#coupon_code').attr('value', coupon_code);
                        $('.CURRENCY').html(response.data.CURRENCY);
                        shipping_data(response.data, temp);
                        if (toastr_status == true) {
                            show_toastr('Success', response.data.message, 'success');

                        }
                    }
                }
            });
        }

        $(document).on('change', '.change_shipping', function(e) {
            getshippingdata();
            var coupon_code = $('.coupon_code').val();
            if (coupon_code) {
                getcoupondata(false);
            }

        });

        $(document).on('click', '.apply_coupon', function(e) {
            getshippingdata(false);
            getcoupondata();
        });

       

        $(document).on('click', '.billing_done', function(e) {
            var form_is_valid = $("#formdata").valid();
            if (form_is_valid == false) {
                return false;
            }

            $.ajax({
                url: '{{ route('paymentlist', $slug) }}',
                method: 'GET',
                context: this,
                success: function(response) {
                    $('.billing_data_tab').removeClass('is-open');
                    $('.billing_data_tab_list').hide();
                    $('.paymentlist_data').html(response.html_data);
                    $('.paymentlist_data_tab').addClass('is-open');
                    $('.paymentlist_data').show();

                    $('.shipping_change:checked').trigger('change');
                    $('.payment_change:checked').trigger('change');

                }
            });
        });

        
        $(document).on('click', '.additional_notes_tab', function(e) {
            $.ajax({
                url: '{{ route('additionalnote', $slug) }}',
                method: 'GET',
                context: this,
                success: function(response) {
                    $('.paymentlist_data_tab').removeClass('is-open');
                    $('.paymentlist_data').hide();
                    $('.additional_notes').html(response.html_data);
                    $('.additional_notes_tab').addClass('is-open');
                }
            });
        });

        $(document).on('click', '.additional_note_done', function(e) {
            $('.additional_notes_tab').removeClass('is-open');
            $('.additional_notes').hide();

            $('.comfirm_list_tab').addClass('is-open');
            $('.comfirm_list_data').show();

        });

        $(document).on('click', '.payment_done', function(e) {
            var payment_change = $('.payment_change').val();
            if (payment_change === undefined || payment_change === null || payment_change == 0) {
                return false;
            }

            var note = "{{ isset($settings['additional_notes']) ? $settings['additional_notes'] : 'off' }}";
            if (note == 'on') {
                $('.paymentlist_data_tab').removeClass('is-open');
                $('.paymentlist_data').hide();

                $('.additional_notes_tab').addClass('is-open');
                $('.additional_notes_tab').trigger('click');
                $('.additional_notes').show();
            } else {
                $('.paymentlist_data_tab').removeClass('is-open');
                $('.paymentlist_data').hide();

                $('.comfirm_list_tab').addClass('is-open');
                $('.comfirm_list_data').show();

            }

        });

        $(document).ready(function() {
            setTimeout(() => {
                $("#formdata").append("<div id='get-payfast-input'></div>");

            }, 100);
        });

        @if (Auth::check())
            $("#payfast_form").on("click", function(event) {
                var payment_type = $('.payment_type').val();

                if (payment_type == 'payfast') {
                    event.preventDefault()

                    var formdata = $('#formdata').serializeArray();
                    var slug = '{{ $slug }}';

                    $.ajax({
                        url: '{{ route('place.order', $slug) }}',
                        method: 'POST',
                        data: formdata,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {

                            if (data.success == true) {
                                $('#get-payfast-input').append(data.inputs);
                                $('#formdata').submit();
                            } else {
                                show_toastr('Error', data.success, 'error')
                            }

                        }
                    });
                }
            });
        @else
            $("#payfast_form").on("click", function(event) {
                var payment_type = $('.payment_type').val();

                if (payment_type == 'payfast') {
                    event.preventDefault()

                    var formdata = $('#formdata').serializeArray();
                    var slug = '{{ $slug }}';

                    $.ajax({
                        url: '{{ route('place.order.guest', $slug) }}',
                        method: 'POST',
                        data: formdata,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {

                            if (data.success == true) {
                                $('#get-payfast-input').append(data.inputs);
                                $('#formdata').submit();
                            } else {
                                show_toastr('Error', data.success, 'error')
                            }

                        }
                    });
                }
            });
        @endif

        $("#payfast_form").on("click", function(e) {
            var payment_type = $('#payment_type').val();

            if (payment_type == 'payfast') {
                $('#formdata').attr('action', "https://{{ $pfHost }}/eng/process");
                e.preventDefault();
            }
        });
    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        @if (
            !empty($is_Stripe_enabled) &&
                isset($is_Stripe_enabled) &&
                $is_Stripe_enabled == 1 &&
                !empty($publishable_key) &&
                !empty($stripe_secret))

            <?php $stripe_session = Session::get('stripe_session'); ?>
            <?php if(isset($stripe_session) && $stripe_session): ?>
                <
                script >
                var stripe = Stripe('{{ $publishable_key }}');
            stripe.redirectToCheckout({
                sessionId: '{{ $stripe_session->id }}',
            }).then((result) => {
                console.log(result);
            });
    </script>
    <?php endif ?>
    @endif
    </script>
@endpush