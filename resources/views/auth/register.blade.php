@extends('layouts.guest')

@section('page-title')
    {{__('Register')}}
@endsection

@if(env('RECAPTCHA_MODULE') == 'yes')
    {!! NoCaptcha::renderJs() !!}
@endif

@section('content')
    {{--
    <div class="">
        @if (session('status'))
        <div class="mb-4 font-medium text-lg text-green-600 text-danger">
            {{ __('Email SMTP settings does not configured so please contact to your site admin.') }}
        </div>
        @endif
        <h2 class="mb-3 f-w-600">Register</h2>
    </div>
    <div class="">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('admin.register') }}">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label" for="name">{{ __('Name') }}</label>
                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="name">{{ __('Store name') }}</label>
                <x-input id="name" class="form-control" type="text" name="store_name" :value="old('store_name')" required autofocus />
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>
            <div class="form-group mb-3">
                <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
            </div>
            @if(env('RECAPTCHA_MODULE') == 'yes')
                <div class="form-group col-lg-12 col-md-12 mt-3">
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                    <span class="error small text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            @endif

            <div class="d-grid">
                <button class="btn btn-primary btn-block mt-2" type="submit"> {{ __('Register') }} </button>
            </div>
        </form>
    </div>
    <p class="mb-2 text-center">
        Already have an account?
        <a href="{{ route('admin.login') }}" class="f-w-400 text-primary">Signin</a>
    </p>
    --}}

    {{--
    <div class="PagTitle mt-0">
        <div class="">
            <h1>Selling from Home</h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Selling</a></li>
            </ol>
        </div>
    </div>

    <div class="FormSelling pt-3">
        <div class="">
            <div class="FormSellingForm">
                <form>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-0 row">
                                        <label class="LableText col-lg-3 col-md-3 col-sm-12">Enter your shop Name *
                                            <span class=""
                                                    data-container="body"
                                                    data-toggle="popover"
                                                    data-trigger="hover"
                                                    data-placement="top"
                                                    data-content="This will be your shop URL if you don’t have registered domain address">
                                                    <i class="fas fa-question"></i>

                                            </span>
                                        </label>
                                        <div class="fomgroupDisplayFlex col-md-5 col-md-5 col-sm-12">
                                            <div class="fomgroupDisplayCOntent">
                                                <div class="BoxAnaonlineName">
                                                    <input type="text" placeholder="Shop Name" class="form-control minwidth200px" required> <span style="margin: 0 5px;">.Anaonline.io</span>
                                                </div>
                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="font-size-14 mb-4">Do you have Domain Name *</h5>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="formRadios"
                                                        id="haveDomain">
                                                    <label class="form-check-label" for="haveDomain">
                                                        Yes, I have a domain name
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 toggle-box" style="display: none" id="haveDomain_Box">
                                                <div class="form-group">
                                                    <label class="LableText">Write your domain *</label>
                                                    <div class="fomgroupDisplayFlex">
                                                        <div class="fomgroupDisplayCOntent">
                                                            <input type="text" placeholder="Write your domain" class="form-control minwidth250px" required>
                                                            <span class="text-success"><i class="fas fa-check"></i></span>
                                                            <span class="text-danger"><i class="fas fa-times"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="formRadios"
                                                        id="RegistrDomain">
                                                    <label class="form-check-label" for="RegistrDomain">
                                                        No, Register a new domain
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 toggle-box" style="display: none" id="RegistrDomain_Box">
                                                <div class="form-group">
                                                    <label class="LableText">Search your domain *</label>
                                                    <div class="fomgroupDisplayFlex">
                                                        <div class="fomgroupDisplayCOntent">
                                                            <input type="text" placeholder="Search your domain" class="form-control minwidth250px" required>
                                                            <span class="text-success"><i class="fas fa-check"></i></span>
                                                            <span class="text-danger"><i class="fas fa-times"></i></span>
                                                            <div class="BTNSEARCH">
                                                                <button type="button">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="formRadios"
                                                        id="NoThanks">
                                                    <label class="form-check-label" for="NoThanks">
                                                        No, Thanks I will continue with shopname.anaonline.io
                                                    </label>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6">

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="Bakagessss mb-3">
                                            <div class="card mt-3 hidden-xs">
                        <div class="card-body">
                            <div class="tab-box" >
                <ul class="tab-nav align-center">
                    <li class="active"><a href="#">Monthly plan</a></li>
                    <li><a href="#">Yearly plan</a></li>
                </ul>
                <div class="panel active" >
                    <div class="row" >
                            <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Starter</h2>
                                    <div class="price">$<span>19</span></div>
                                    <p>Per Month</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                id="CheckPlan1">
                                            <label class="form-check-label" for="CheckPlan1">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>100 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>30 Days money back guarantee</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>


                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-4 anima">
                            <div class="cnt-box RequmendedBox cnt-pricing-table">
                                <div class="Requmended">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Professional</h2>
                                    <div class="price">$<span>49</span></div>
                                    <p>Per Month</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                id="CheckPlan2">
                                            <label class="form-check-label" for="CheckPlan2">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>1000 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>Social Media Auto Publisher Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Premium</h2>
                                    <div class="price">$<span>89</span></div>
                                    <p>Per Month</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios"
                                                id="CheckPlan3">
                                            <label class="form-check-label" for="CheckPlan3">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>Unlimited Products</li>
                                    <li>AI Photo Editor</li>
                                    <li>Social Media Auto Publisher</li>
                                    <li>Email Marketing Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel">
                    <div class="row">
                        <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Starter</h2>
                                    <div class="price">$<span>19</span></div>
                                    <p>Per Year</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                id="CheckPlan4">
                                            <label class="form-check-label" for="CheckPlan4">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>100 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>30 Days money back guarantee</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>


                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-4 anima">
                            <div class="cnt-box RequmendedBox cnt-pricing-table">
                                <div class="Requmended">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Professional</h2>
                                    <div class="price">$<span>49</span></div>
                                    <p>Per Year</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios"
                                                id="CheckPlan5">
                                            <label class="form-check-label" for="CheckPlan5">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>1000 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>Social Media Auto Publisher Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Premium</h2>
                                    <div class="price">$<span>89</span></div>
                                    <p>Per Year</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios"
                                                id="CheckPlan6">
                                            <label class="form-check-label" for="CheckPlan6">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>Unlimited Products</li>
                                    <li>AI Photo Editor</li>
                                    <li>Social Media Auto Publisher</li>
                                    <li>Email Marketing Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

                        </div>
                    </div>

                    <div class="card mt-3 visible-xs">
                        <div class="card-body">
                            <div class="tab-box" >
                <ul class="tab-nav align-center">
                    <li class="active"><a href="#">Monthly plan</a></li>
                    <li><a href="#">Yearly plan</a></li>
                </ul>
                <div class="panel active" >
                    <div class="tab-box ChildTapRespons" >
                        <ul class="tab-nav align-center">
                            <li class="active"><a href="#">Starter</a></li>
                            <li><a href="#">Professional</a></li>
                            <li><a href="#">Premium</a></li>
                        </ul>
                        <div class="panel active" >
                            <div class="row" >
                                    <div class="col-lg-4 anima">
                                    <div class="cnt-box cnt-pricing-table">
                                        <div class="Requmended" style="opacity: 0">
                                            <p>Recommended</p>
                                        </div>
                                        <div class="top-area">
                                            <h2>Starter</h2>
                                            <div class="price">$<span>19</span></div>
                                            <p>Per Month</p>
                                        </div>
                                        <div class="bottom-area form-group mb-0">
                                            <div class="form-check">
                                                    <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                        id="CheckPlan_M_1">
                                                    <label class="form-check-label" for="CheckPlan_M_1">
                                                        Select Plane
                                                    </label>
                                                </div>
                                        </div>
                                        <ul>
                                            <li>100 Products limits</li>
                                            <li>AI Photo Editor Tool</li>
                                            <li>30 Days money back guarantee</li>
                                            <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>


                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="row">

                                <div class="col-lg-4 anima">
                            <div class="cnt-box RequmendedBox cnt-pricing-table">
                                <div class="Requmended">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Professional</h2>
                                    <div class="price">$<span>49</span></div>
                                    <p>Per Month</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                id="CheckPlan_M_2">
                                            <label class="form-check-label" for="CheckPlan_M_2">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>1000 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>Social Media Auto Publisher Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>

                            </div>
                        </div>
                        <div class="panel" >
                            <div class="row" >
                                    <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Premium</h2>
                                    <div class="price">$<span>89</span></div>
                                    <p>Per Month</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios_Mobile"
                                                id="CheckPlan_M_3">
                                            <label class="form-check-label" for="CheckPlan_M_3">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>Unlimited Products</li>
                                    <li>AI Photo Editor</li>
                                    <li>Social Media Auto Publisher</li>
                                    <li>Email Marketing Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel">
                    <div class="tab-box ChildTapRespons" >
                        <ul class="tab-nav align-center">
                            <li class="active"><a href="#">Starter</a></li>
                            <li><a href="#">Professional</a></li>
                            <li><a href="#">Premium</a></li>
                        </ul>
                        <div class="panel active" >
                            <div class="row" >
                                    <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Starter</h2>
                                    <div class="price">$<span>19</span></div>
                                    <p>Per Year</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                id="CheckPlan_M_4">
                                            <label class="form-check-label" for="CheckPlan_M_4">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>100 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>30 Days money back guarantee</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>


                                </ul>

                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="row">

                                <div class="col-lg-4 anima">
                            <div class="cnt-box RequmendedBox cnt-pricing-table">
                                <div class="Requmended">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Professional</h2>
                                    <div class="price">$<span>49</span></div>
                                    <p>Per Year</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input style="display: none" class="form-check-input radioBTNN" type="radio" name="formRadios_Mobile"
                                                id="CheckPlan_M_5">
                                            <label class="form-check-label" for="CheckPlan_M_5">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>1000 Products limits</li>
                                    <li>AI Photo Editor Tool</li>
                                    <li>Social Media Auto Publisher Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>

                            </div>
                        </div>
                        <div class="panel" >
                            <div class="row" >
                                    <div class="col-lg-4 anima">
                            <div class="cnt-box cnt-pricing-table">
                                <div class="Requmended" style="opacity: 0">
                                    <p>Recommended</p>
                                </div>
                                <div class="top-area">
                                    <h2>Premium</h2>
                                    <div class="price">$<span>89</span></div>
                                    <p>Per Year</p>
                                </div>
                                <div class="bottom-area form-group mb-0">
                                    <div class="form-check">
                                            <input class="form-check-input radioBTNN" style="display: none" type="radio" name="formRadios_Mobile"
                                                id="CheckPlan_M_6">
                                            <label class="form-check-label" for="CheckPlan_M_6">
                                                Select Plane
                                            </label>
                                        </div>
                                </div>
                                <ul>
                                    <li>Unlimited Products</li>
                                    <li>AI Photo Editor</li>
                                    <li>Social Media Auto Publisher</li>
                                    <li>Email Marketing Tool</li>
                                    <li>Payment Integrated (VisaMaster-Mobile wallet – Fawry)</li>

                                </ul>

                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        </div>
                    </div>


                    </div>








                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <h4>Business Information:
                                <span class=""
                                                    data-container="body"
                                                    data-toggle="popover"
                                                    data-trigger="click"
                                                    data-placement="top"
                                                    data-content="All data must be entered as shown/stated in your National ID Card">
                                                    <i class="fas fa-question"></i>
                                            </span></h4>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Brand/Business Name *
                                        </label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="Brand/Business Name " class="form-control " required>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Authorized Person Full Name *
                                            <span class=""
                                                    data-container="body"
                                                    data-toggle="popover"
                                                    data-trigger="hover"
                                                    data-placement="top"
                                                    data-content="Full name of authorized owner of the business must be entered as shown/stated in National ID">
                                                    <i class="fas fa-question"></i>
                                            </span>
                                        </label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="Authorized Person Full Name" class="form-control" required>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Business Industry/Activity *
                                            <span class=""
                                                    data-container="body"
                                                    data-toggle="popover"
                                                    data-trigger="hover"
                                                    data-placement="top"
                                                    data-content="For following activities extra documents will be required (Tourism-Doctors-Charity-Pharmacies-Cosmetics Services)">
                                                    <i class="fas fa-question"></i>
                                            </span>
                                        </label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="Business Industry/Activity" class="form-control" required>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Business Website/Social Media URLs</label>
                                        <div class="fomgroupDisplayFlex mb-2">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="" class="form-control" required>
                                                <button class="ADDMORE"><i class="fas fa-plus"></i> Add</button>
                                            </div>
                                        </div>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="" class="form-control" required>
                                                <button class="DeleteMore"><i class="fas fa-trash-alt"></i> Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Phone Number</label>
                                        <div class="fomgroupDisplayFlex mb-2">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="" class="form-control" required>
                                                <button class="ADDMORE"><i class="fas fa-plus"></i> Add</button>
                                            </div>
                                        </div>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="" class="form-control" required>
                                                <button class="DeleteMore"><i class="fas fa-trash-alt"></i> Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="LableText">Business Owner Address *</label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="Company Address" class="form-control" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">City</label>
                                        <div class="fomgroupDisplayFlex mb-2">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="City" class="form-control" required>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Country</label>
                                        <div class="fomgroupDisplayFlex mb-2">
                                            <div class="fomgroupDisplayCOntent">

                                                    <select class="form-control">
                                                        <option>Select Country</option>
                                                    <option >Egypt</option>
                                                    <option disabled>Kewait Comming Soon</option>
                                                    <option disabled>Saudi Arabia Comming Soon</option>
                                                    <option disabled> United State Of Emarate Comming Soon</option>
                                                    <option disabled>Qater Comming Soon</option>
                                                    <option disabled>Oman Comming Soon</option>
                                                    <option disabled>Ordon Comming Soon</option>
                                                    <option disabled> Kinia Comming Soon</option>
                                                    <option disabled> Nigeria Comming Soon</option>

                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Email *</label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="Email" class="form-control" required>
                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="LableText">Conform Email</label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="text" placeholder="Confirm Email" class="form-control" required>
                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                        <div class="card mb-3">
                        <div class="card-body">
                            <h4>Business Papers:</h4>
                            <div class="row">


                                <div class="col-lg-6">
                                    <div class="form-group FileUplaod">
                                        <label class="LableText">Authorized Person National ID *
                                            <span class=""
                                                    data-container="body"
                                                    data-toggle="popover"
                                                    data-trigger="hover"
                                                    data-placement="top"
                                                    data-content="Full name of authorized owner of the business must be entered as shown/stated in National ID">
                                                    <i class="fas fa-question"></i>
                                            </span>
                                        </label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent" >
                                                <input type="file" placeholder="Last Name" class="form-control" required>
                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group width_87">
                                        <label class="LableText mb-0">Document expiry date</label>
                                        <div class="fomgroupDisplayFlex mb-0">
                                            <div class="fomgroupDisplayCOntent">
                                                <input id="start1" type="date" class="form-control" required>
                                                <span class="IconCalnder"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group FileUplaod">
                                        <label class="LableText">Utility Bill (Electricity,Water,Gas,etc) Max(3month Old):
                                            <span class="CustomQuesTionIcon"
                                                    data-container="body"
                                                    data-toggle="popover"
                                                    data-trigger="hover"
                                                    data-placement="top"
                                                    data-content="Clear and high quality scan document/photo for New Utility bill (Electric, Water, Gas,etc) not older than 3 months with same address of the National ID Card.">
                                                    <i class="fas fa-question"></i>
                                            </span>
                                        </label>
                                        <div class="fomgroupDisplayFlex">
                                            <div class="fomgroupDisplayCOntent">
                                                <input type="file" placeholder="" class="form-control" required>
                                                <span class="text-success"><i class="fas fa-check"></i></span>
                                                <span class="text-danger"><i class="fas fa-times"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group width_87">
                                        <label class="LableText mb-0">Date Of Utility Bill</label>
                                        <div class="fomgroupDisplayFlex mb-0">
                                            <div class="fomgroupDisplayCOntent">
                                                <input id="MinDtate" type="date" class="form-control" required>
                                                <span class="IconCalnder"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <h4>Banking Details
                                <span class=""
                                        data-container="body"
                                        data-toggle="popover"
                                        data-trigger="hover"
                                        data-placement="top"
                                        data-content="All of your shop online payments will be credited to this account">
                                        <i class="fas fa-question"></i>
                                </span>
                            </h4>
                            </div>

                            <div class="row">


                                <div class="col-lg-12">
                                    <div class="row">
                                            <div class="col-lg-12">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="LableText">Bank Name *</label>
                                                        <input type="text" placeholder="Bank Name" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="LableText">Bank Branch Name *</label>
                                                        <input type="text" placeholder="Bank Branch Name" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="LableText">Bank Account Name *</label>
                                                        <input type="text" placeholder="Bank Account Name" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="LableText">Bank Account Number *</label>
                                                        <input type="text" placeholder="Bank Account Number" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="LableText">IBAN *</label>
                                                        <input type="text" placeholder="IBAN" class="form-control" required>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group">
                                <h4>Payment Details

                            </h4>
                            </div>

                            <div class="row">


                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="LableText">Name on Card *</label>
                                                        <input type="text" placeholder="Name on Card" class="form-control" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="LableText">Card Number *</label>
                                                        <input type="text" placeholder="Card Number" class="form-control" required>

                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label class="LableText">Expiry Date *</label>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6">
                                                                        <input type="text" placeholder="MM" class="form-control" required>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6">
                                                                        <input type="text" placeholder="YY" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label class="LableText">CVC *</label>
                                                                <input type="text" placeholder="CVC" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-xs-12">
                                            <div class="DiscountBox">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group DiscodeInput">
                                                            <label class="LableText">Discount Code</label>
                                                            <input type="text" placeholder="Discount Code" class="form-control" required>
                                                            <button type="button" class="ApplayDiscount">Apply</button>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <div class="RolresPaymentItem">
                                                                <div class="rightSide">
                                                                    <p>Starter</p>
                                                                    <span class="Bahatan">Annually – 1 Year or Monthly – 1 Month</span>
                                                                </div>
                                                                <div class="leftSide">
                                                                    <span class="ValueItem">6666 EGP</span>
                                                                </div>
                                                            </div>
                                                            <div class="RolresPaymentItem">
                                                                <div class="rightSide">
                                                                    <p>Domain</p>
                                                                    <span class="Bahatan">1 Year </span>
                                                                </div>
                                                                <div class="leftSide">
                                                                    <span class="ValueItem">370 EGP</span>
                                                                </div>
                                                            </div>
                                                            <div class="RolresPaymentItem">
                                                                <div class="rightSide">
                                                                    <p>Payment Gate fees
                                                                        <span class="Info"
                                                                    data-container="body"
                                                                    data-toggle="popover"
                                                                    data-trigger="hover"
                                                                    data-placement="top"
                                                                    data-content="Fees of Payment Gateway integration fees paid only 1 time">
                                                                    <i class="fas fa-question"></i>
                                                                </span> </p>
                                                                    <span class="Bahatan">Annually/ monthly </span>
                                                                </div>
                                                                <div class="leftSide">
                                                                    <span class="ValueItem">370 EGP</span>
                                                                </div>
                                                            </div>
                                                            <div class="RolresPaymentItem">
                                                                <div class="rightSide">
                                                                    <p>Taxes 14%:</p>
                                                                </div>
                                                                <div class="leftSide">
                                                                    <span class="ValueItem">985.04 EPG</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <h1><span>Total:</span><span>8021.04 EGP</span></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-check form-checkbox-outline form-check-info mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    id="customCheckcolor3" >
                                                <label class="form-check-label" for="customCheckcolor3">
                                                    I agree to terms &
                                                </label>
                                                <button type="button" class="PolicyPOPUP" data-bs-toggle="modal" data-bs-target="#exampleModal" >Condition & Policy</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="BTNSUBMIT">
                        <button type="submit" class="CheckOut">Check Out</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    --}}

    <section id="Selling" class="section-base SellingSection">
        <div class="container">
            <h2 class="SectionTitl">Selling Form Store Or Home</h2>
            <div class="row" style="justify-content: center">

                <div class="col-lg-5">
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <i class="im-globe"></i>
                            <div class="caption">
                                <h2>Selling from Store</h2>
                                <p>
                                    I Have Official Company Papers
                                </p>
                                <a href="{{ route('selling.store') }}" class="btn-text">Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <i class="im-bar-chart4"></i>
                            <div class="caption">
                                <h2>Selling from Home</h2>
                                <p>
                                    I Don’t Have Official Company Papers
                                </p>
                                <a href="{{ route('selling.home') }}" class="btn-text">Start Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
