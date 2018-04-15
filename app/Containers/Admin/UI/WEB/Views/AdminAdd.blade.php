@extends('layout::Layout')
@section('content')
    <?php



    $role = Session::get('role');



    $timezones=$result;

    $firstName ="";
    $lastName ="";
    $address ="";
    $country ="";
    $pincode ="";
    $emailAddress ="";
    $phoneNumber ="";
    $emergencyNumber ="";
    $doc_name_one ="";
    $area_name ="";
    $timezone = '';
    $lang = '';
    $tempRole  = '';

    if(session()->has('_old_input'))    {




        $firstName = session()->get('_old_input')["firstName"];
        $lastName  = session()->get('_old_input')["lastName"];
        $address  = session()->get('_old_input')["address"];
        $country  = session()->get('_old_input')["country"];
        $pincode  = session()->get('_old_input')["pincode"];
        $emailAddress  = session()->get('_old_input')["email"];
        $phoneNumber = session()->get('_old_input')["phone_number"];
        $emergencyNumber = session()->get('_old_input')["emergency_number"];
        $doc_name_one = session()->get('_old_input')["doc_name_one"];
        $timezone = session()->get('_old_input')["timezone"];
        $lang = session()->get('_old_input')["admin_language"];
        $tempRole = session()->get('_old_input')["role"];

        if(session()->has('_old_input')["area_name"])
        {
            $area_name = session()->get('_old_input')["area_name"];
        }



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

                        <h4 class="header">{{ trans('localization::lang_view.add_admin')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                        </h4>

                        <div class="row">

                            <div class="col s12">
                                <form action="{{URL::Route('adminAddSave')}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">
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
                                                <input name="address" id="address" type="text" value="{{ $address}}" class="validate">
                                                <label for="address" >{{ trans('localization::lang_view.address')}}</label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m4 l4">
                                                <input name="country" id="country" type="text" value="{{ $country}}" class="validate" required >
                                                <label for="country" class="active">{{ trans('localization::lang_view.country')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="pincode" id="pincode" type="text" value="{{ $pincode}}" >
                                                <label for="pincode">{{ trans('localization::lang_view.postal_code')}}</label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">

                                                <select name="timezone" id="timezone" required >
                                                    <?php

                                                    foreach($timezones as $key => $value ){
                                                    foreach($value['zones'] as $zone_key => $zone_value ){?>
                                                    <option value="<?=$zone_value['value'];?>" <?php if($zone_value['value'] == $timezone){echo " selected";}?>><?=$zone_value['name'];?></option>
                                                    <?php }
                                                    };

                                                    ?>

                                                </select>
                                                <label for="timezone">{{ trans('localization::lang_view.timezone')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">
                                        
                                            <div class="input-field col s6 m6 l6">



                                                <select name="admin_language" id="admin_language"   required >
                                                    <option value="">{{ trans('localization::common_language.select_language')}}</option>
                                                    <?php

                                                    foreach($language as $value)
                                                    {
                                                    ?>

                                                    <option value="{{ $value->short_lang }}" <?php if($value->short_lang == $lang){echo " selected";}?>>{{ trans('localization::common_language.'.$value->name).' ( '.trans('localization::lang_view.'.$value->name).') '}}</option>


                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="admin_language">{{ trans('localization::common_language.admin_language')}} <sup>*</sup></label>

                                            </div>

                                            <div class="input-field col s6 m6 l6">
                                                <input name="email" id="email" type="email" class="validate" value="{{$emailAddress}}" required >
                                                <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l6">
                                                <input name="phone_number" id="phone" type="text" value="{{ $phoneNumber }}" class="validate" required >
                                                <label for="phone" class="active">{{ trans('localization::lang_view.phone_number')}} <sup>*</sup>({{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
                                            </div>
                                            <div class="input-field col s12 m12 l6">
                                                <input name="emergency_number" id="emergency_number" type="text" value="{{ $emergencyNumber }}" class="validate" required >
                                                <label for="emergency_number" class="active">{{ trans('localization::lang_view.emergency_number')}} <sup>*</sup>({{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
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
                                                    <input name="profile_pic" id="avatar input-file-to-destroy" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                            <div class="input-field col s12 m6 l6">


                                                <select name="role" id="role_type"  onchange="alertMessage();" required >
                                                    <option value="">{{ trans('localization::lang_view.select_admin_role')}}</option>

                                                    <?php

                                                    if($role == 0)
                                                    {
                                                    ?>
                                                    <option value="0" <?php if($tempRole == 0){echo " selected";}?>>{{ trans('localization::lang_view.super_admin')}}</option>
                                                    <option value="99999" <?php if($tempRole == 99999){echo " selected";}?>>{{ trans('localization::lang_view.admin')}}</option>


                                                    <?php
                                                    }
                                                    else if($role == 99999)
                                                    {
                                                    ?>

                                                    <option value="100000" <?php if($tempRole == 100000){echo " selected";}?>>{{ trans('localization::lang_view.dispatcher')}}</option>
                                                    <?php

                                                    foreach($types as $key=>$value)
                                                    {
                                                    ?>
                                                    <option value="<?=$value->id?>" <?php if($tempRole == $value->id){echo " selected";}?>><?=$value->types?></option>

                                                    <?php
                                                    }
                                                    }
                                                    else
                                                    {

                                                    foreach($types as $key=>$value)
                                                    {
                                                    ?>
                                                    <option value="<?=$value->id?>"><?=$value->types?></option>
                                                    <?php
                                                    }
                                                    }

                                                    ?>


                                                </select>

                                                <label for="type">{{ trans('localization::lang_view.role')}} <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="area_name" id="select_area_name" type="text" value="{{ $area_name}}" class="validate" >
                                                <label for="area_name" id = "area_name_label">{{ trans('localization::lang_view.area_name')}}</label>
                                            </div>
                                        </div>

                                    </div>
                                    <br><hr><br>
                                    <div class="row">
                                        <div class="col s12 m12 l12">{{ trans('localization::lang_view.add_documents')}}</div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="doc_name_one" id="doc_name1" type="text" value="{{ $doc_name_one }}" >
                                                <label for="doc_name1">{{ trans('localization::lang_view.document_name')}}</label>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <div class=" col s12">
                                                    <label for="avatarone">{{ trans('localization::lang_view.add_document')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12 ">
                                                    <input name="document_one" id="avatarone" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col s12 m12 l12">
                                        <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action">{{ trans('localization::lang_view.add_admin')}}
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

        document.getElementById("select_area_name").disabled = 'true';
        document.getElementById('select_area_name').style.visibility='hidden';
        document.getElementById('area_name_label').style.visibility='hidden';

        function DocumentValidate(){

            var doc_one = $('#doc_name1').val();


            if(doc_one != "" && ($('#avatarone').val())=="" ){
                Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

                return false;

            }
            else if((doc_one == "")&& ($('#avatarone').val())!="" ){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

            }

            if(document.getElementById('role_type').value == '99999')
            {

                if(document.getElementById('area_name').value == '')
                {
                    Materialize.toast("{{trans('localization::errors.area_name_required')}}", 4000);
                    return false
                }

            }


            return true;

        }

        function alertMessage()
        {
            if(document.getElementById('role_type').value == '99999')
            {
                document.getElementById("select_area_name").disabled = '';
                document.getElementById('select_area_name').style.visibility='visible';
                document.getElementById('area_name_label').style.visibility='visible';
            }
            else
            {
                document.getElementById("select_area_name").disabled = 'true';
                document.getElementById('select_area_name').style.visibility='hidden';
                document.getElementById('area_name_label').style.visibility='hidden';
            }
        }


    </script>
    <script type="text/javascript">
        $(".timezone").chosen();
    </script>
@endsection