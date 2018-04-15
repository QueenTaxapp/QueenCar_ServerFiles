@extends('layout::Layout')
@section('content')

 <style>
     .highlight{
         border-color: red;
     }
 </style>
    <?php

    $firstName ="";
    $lastName ="";
    $address ="";
    $city ="";
    $region ="";
    $postal_code ="";
    $emailAddress ="";
    $phoneNumber ="";
    $dob = "";
    $accountNumber = "";
    $ifscCode = "";
    $socialSecurityNumber = "";


    if(session()->has('_old_input'))    {

        $firstName = session()->get('_old_input')["firstName"];
        $lastName  = session()->get('_old_input')["lastName"];
        $address  = session()->get('_old_input')["address"];
        $city  = session()->get('_old_input')["city"];
        $region  = session()->get('_old_input')["region"];
        $postal_code  = session()->get('_old_input')["postal_code"];
        $emailAddress  = session()->get('_old_input')["email"];
        $phoneNumber = session()->get('_old_input')["phone_number"];
        $dob = session()->get('_old_input')["dob"];
        $accountNumber = session()->get('_old_input')["acc_number"];
        $ifscCode = session()->get('_old_input')["ifsc"];
        $socialSecurityNumber = session()->get('_old_input')["ssn"];


    }

    if(Illuminate\Support\Facades\Cache::has('acc_firstname'))    {

        $firstName = Illuminate\Support\Facades\Cache::get('acc_firstname');
        $lastName  = Illuminate\Support\Facades\Cache::get('acc_lastname');
        $address  = Illuminate\Support\Facades\Cache::get('acc_address');
        $city  = Illuminate\Support\Facades\Cache::get('acc_city');
        $region  = Illuminate\Support\Facades\Cache::get('acc_region');
        $postal_code  = Illuminate\Support\Facades\Cache::get('acc_postalCode');
        $emailAddress  = Illuminate\Support\Facades\Cache::get('acc_email');
        $phoneNumber = Illuminate\Support\Facades\Cache::get('acc_phone');
        $dob = Illuminate\Support\Facades\Cache::get('acc_dob');
        $accountNumber = Illuminate\Support\Facades\Cache::get('acc_accountNumber');
        $ifscCode = Illuminate\Support\Facades\Cache::get('acc_routingNumber');
        $socialSecurityNumber = Illuminate\Support\Facades\Cache::get('acc_ssn');
    }

    ?>

    <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{ trans('localization::lang_view.add_account')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('companyView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_company_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('adminCompanySaveAccount',$request->company_id)}}" method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12"><b>{{ trans('localization::lang_view.individual_details')}}</b></div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="firstName" id="first_name" type="text" value="{{ $firstName}}" class="validate" required >
                                                        <label for="first_name" class="active">{{ trans('localization::lang_view.first_name')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="lastName" id="last_name" type="text" value="{{ $lastName}}" class="validate" required >
                                                        <label for="last_name">{{ trans('localization::lang_view.last_name')}}  <sup>*</sup></label>
                                                    </div>
                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m12 l12">
                                                        <input name="address" id="address" type="text" value="{{ $address}}" class="validate" required >
                                                        <label for="address" >{{ trans('localization::lang_view.street_address')}}<sup>*</sup></label>
                                                    </div>
                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="city" id="city" type="text" value="{{ $city}}" class="validate" required >
                                                        <label for="city" class="active">{{ trans('localization::lang_view.locality')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="region" id="region" maxlength="2" type="text" value="{{ $region}}" required >
                                                        <label for="region">{{ trans('localization::lang_view.region')}}<sup>*</sup> ({{trans('localization::lang_view.only_two_letters')}})</label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="postal_code" id="pincode" maxlength="5" type="text" value="{{ $postal_code}}" required >
                                                        <label for="pincode">{{ trans('localization::lang_view.postal_code')}}<sup>*</sup> ({{trans('localization::lang_view.only_five_letters')}})</label>
                                                    </div>
                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m12 l12">
                                                        <input name="email" id="email" type="email" class="validate" value="{{ $emailAddress }}" required >
                                                        <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
                                                    </div>
                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="phone_number" id="phone" type="text" value="{{ $phoneNumber }}" class="validate" required >
                                                        <label for="phone" class="active">{{ trans('localization::lang_view.phone')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="dob" id="dob" type="text" value="{{ $dob }}" class="datepicker" required >
                                                        <label for="dob" class="active">{{ trans('localization::lang_view.date_of_birth')}} <sup>*</sup></label>
                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m12 l12">
                                                        <input name="ssn" id="ssn" type="text" minlength="4" maxlength="9" value="{{ $socialSecurityNumber }}" class="validate" required >
                                                        <label for="ssn">{{ trans('localization::lang_view.social_security_number')}} <sup>*</sup></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m12 l12"><b>{{ trans('localization::lang_view.funding_details')}}</b></div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="acc_number" id="account" type="text" value="{{ $accountNumber }}" class="validate" required >
                                                        <label for="account" class="active">{{ trans('localization::lang_view.account_number')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="ifsc" id="ifsc" type="text" value="{{ $ifscCode }}" class="validate" required >
                                                        <label for="ifsc" class="active">{{ trans('localization::lang_view.routing_number')}} <sup>*</sup></label>
                                                    </div>
                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l4">
                                                        <input name="tos" id="terms" type="checkbox" style="z-index: 1;pointer-events:auto ;width: 17px;height: 17px;margin-top: 15px;margin-left: 10px;" >
                                                        <label for="terms">{{ trans('localization::lang_view.accept_terms_and_conditions')}}</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <br>
                                            <div class="col s12 m12 l12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.add_account')}}
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>

                                        </form>
                                        <br><br><br><br><br><br><br><br>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                <!--end container-->
            </div>
        </section>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

    $(document).ready(function(){
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            max: new Date(),
            labelMonthNext: 'Next month',
            labelMonthPrev: 'Previous month',
            labelMonthSelect: 'Select a month',
            labelYearSelect: 'Select a year',
            selectMonths: true,
            selectYears: 50
        })
    });

</script>

@endsection