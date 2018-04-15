@extends('layout::Layout')
@section('content')
    <?php
    $firstName ="";
    $lastName ="";
    $address ="";
    $city ="";
    $state ="";
    $country_code ="";

    $emailAddress ="";
    $phoneNumber ="";

    if(session()->has('_old_input'))    {
        $firstName = session()->get('_old_input')["firstName"];
        $lastName  = session()->get('_old_input')["lastName"];
        $address  = session()->get('_old_input')["address"];
        $city  = session()->get('_old_input')["city"];
        $state  = session()->get('_old_input')["state"];
        $country_code  = session()->get('_old_input')["country_code"];
        $emailAddress  = session()->get('_old_input')["email"];
        $phoneNumber = session()->get('_old_input')["phone_number"];

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

                        <h4 class="header">{{ trans('localization::lang_view.add_user')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminUserView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_user_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                        </h4>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form action="{{URL::Route('adminUserSave')}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="firstName" id="first_name" type="text" value="{{ $firstName}}" class="validate" required >
                                                <label for="first_name" class="active">{{ trans('localization::lang_view.first_name')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="lastName" id="last_name" type="text" value="{{ $lastName}}" required >
                                                <label for="last_name">{{ trans('localization::lang_view.last_name')}}  <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="address" id="address" type="text" value="{{ $address}}" class="validate">
                                                <label for="address" >{{ trans('localization::lang_view.address')}}</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m4 l4">
                                                <input name="city" id="city" type="text" value="{{ $city}}" class="validate" required >
                                                <label for="city" class="active">{{ trans('localization::lang_view.city')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="state" id="state" type="text" value="{{ $state}}" >
                                                <label for="state">{{ trans('localization::lang_view.state')}}</label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <select name="country_code" id="country" required >
                                                    <?php
                                                    foreach($country_array as $value){ ?>
                                                    <option value="<?=$value->name;?>"><?php echo $value->name.' ('.$value->d_code.')';?></option>
                                                    <?php }; ?>

                                                </select>
                                                <label for="country" >{{ trans('localization::lang_view.country')}} <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s6 m6 l6">
                                                <input name="email" id="email" type="email" class="validate" value="{{$emailAddress}}" required >
                                                <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s6 m6 l6">

                                                <select name="timezone" id="timezone" required >
                                                    <option value="">{{ trans('localization::lang_view.select_time_zone') }}</option>

                                                    <?php
                                                    foreach($timezones as $key => $value )
                                                    {
                                                    foreach($value['zones'] as $zone_key => $zone_value )
                                                    {
                                                    ?>

                                                    <option value="<?=$zone_value['value'];?>"><?=$zone_value['name'];?></option>
                                                    <?php
                                                    }
                                                    };

                                                    ?>

                                                </select>
                                                <label for="timezone">{{ trans('localization::lang_view.timezone')}} <sup>*</sup></label>

                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="phone_number" id="phone" type="text" value="{{ $phoneNumber }}" class="validate" required >
                                                <label for="phone" class="active">{{ trans('localization::lang_view.phone_number')}} <sup>*</sup>({{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <select name="gender" id="gender"  >
                                                    <option value="1">{{ trans('localization::lang_view.male')}}</option>
                                                    <option value="2">{{ trans('localization::lang_view.female')}}</option>
                                                </select>
                                                <label for="gender">{{ trans('localization::lang_view.gender')}}</label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="password" id="password" type="password" class="validate" required >
                                                <label for="password">{{ trans('localization::lang_view.password')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="confirm_password" id="confirm_password" type="password"  class="validate" required >
                                                <label for="confirm_password">{{ trans('localization::lang_view.confirm_password')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">

                                            <div class="col s12 m6 l6">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar">{{ trans('localization::lang_view.add_profile_picture')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="profile_pic" id="avatar" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="col s12 m12 l12">
                                        <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.add_user')}}
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



@endsection
