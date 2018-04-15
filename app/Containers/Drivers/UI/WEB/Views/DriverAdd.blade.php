@extends('layout::Layout')
@section('content')

    <style>
        .highlight{
            border-color: red;
        }

    </style>
    <?php

    $typesAdminKey = array();
    foreach ($types as $value)
    {
        if(!array_key_exists($value->admin_reference,array_flip($typesAdminKey)))
        {
            $random_key = rand(1,1000000);
            $typesAdminKey[$value->admin_reference] = $random_key;
        }

    }

    ?>

    <?php
    $firstName ="";
    $lastName ="";
    $address ="";
    $city ="";
    $state ="";
    $country_code ="";
    $emailAddress ="";
    $phoneNumber ="";
    $typeCheck = "";
    $car_model ="";
    $car_number ="";
    $companyCheck ="";
    $doc_name_one ="";
    $doc_name_two ="";
    $doc_name_three ="";

    if(session()->has('_old_input'))    {
        $firstName = session()->get('_old_input')["firstName"];
        $lastName  = session()->get('_old_input')["lastName"];
        $address  = session()->get('_old_input')["address"];
        $city  = session()->get('_old_input')["city"];
        $state  = session()->get('_old_input')["state"];
        $country_code  = session()->get('_old_input')["country_code"];
        $emailAddress  = session()->get('_old_input')["email"];
        $phoneNumber = session()->get('_old_input')["phone_number"];
        $typeCheck = session()->get('_old_input')["type"];
        $car_model = session()->get('_old_input')["car_model"];
        $car_number = session()->get('_old_input')["car_number"];
        $companyCheck = session()->get('_old_input')["company"];
        $doc_name_one = session()->get('_old_input')["doc_name_one"];
        $doc_name_two = session()->get('_old_input')["doc_name_two"];
        $doc_name_three = session()->get('_old_input')["doc_name_three"];

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

                        <h4 class="header">{{ trans('localization::lang_view.add_driver')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminDriverView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_driver_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                        </h4>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form action="{{URL::Route('adminDriverSave')}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">


                                        <?php if($driver_admin_key == 0){ ?>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <select onchange="driverAdminSelectOption()" name="driverAdmin" id="driver_admin"  required >
                                                    <option value="">{{trans('localization::lang_view.select')}}</option>
                                                    <?php
                                                    foreach($driver_admins as $value){ ?>
                                                    <option value="<?=$value->admin_key;?>" > <?php echo $value->area_name;?></option>
                                                    <?php }; ?>

                                                </select>
                                                <label for="driver_admin" class="">{{ trans('localization::lang_view.select_area_for_this_driver')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <input name="driverAdmin" type="hidden" value="<?=$driver_admin_key;?>" >
                                        <?php } ?>

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
                                                    <option value="<?=$value->name;?>" <?php if($country_code==$value->name){echo "selected";}?> > <?php echo $value->name.' ('.$value->d_code.')';?></option>
                                                    <?php }; ?>

                                                </select>
                                                <label for="country" >{{ trans('localization::lang_view.country')}} <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="email" id="email" type="email" class="validate" value="{{$emailAddress}}" required >
                                                <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
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
                                            <div id = "driver_types_test" class="input-field col s12 m4 l4">
                                                <select id="mySelectType" name="type"  required >
                                                    <option value="">{{ trans('localization::lang_view.select_driver_type')}}</option>
                                                    <?php foreach($types as $key=>$value){?>

                                                    <option  class="left" value="<?=$value->id?>" data-icon="<?=$value->icon;?>" <?php if($typeCheck==$value->id){echo "selected";} ?> ><?=$value->name?></option>

                                                    <?php }?>
                                                </select>
                                                <label for="type">{{ trans('localization::lang_view.type')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="car_model" id="car_model" type="text" value="{{ $car_model }}" >
                                                <label for="car_model">{{ trans('localization::lang_view.car_model')}}</label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="car_number" id="car_no" type="text" value="{{ $car_number }}" >
                                                <label for="car_no">{{ trans('localization::lang_view.car_number')}}</label>
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
                                            <div class="input-field col s12 m6 l6">
                                                <select name="company" id="company" >
                                                    <option value="0">{{ trans('localization::lang_view.individual')}}</option>
                                                    <?php foreach($company as $key=>$value){?>

                                                    <option value="<?=$value->id?>" <?php if($companyCheck==$value->id){echo "selected";} ?> ><?=$value->company_name?></option>

                                                    <?php }?>
                                                </select>
                                                <label for="company">{{ trans('localization::lang_view.company')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>
                                    <div class="row">
                                        <div class="col s12 m12 l12">{{ trans('localization::lang_view.add_documents')}}</div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s6 m4 l4">
                                                <input name="doc_name_one" id="doc_name1" type="text" value="{{ $doc_name_one }}" >
                                                <label for="doc_name1">{{ trans('localization::lang_view.document_name')}}</label>
                                            </div>
                                            <div class="input-field col s6 m4 l4">
                                                <input class="datepicker" name="expiry_date_one" id="expiry_date1" type="text" >
                                                <label for="expiry_date1">{{ trans('localization::lang_view.expiry_date')}}</label>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatarone">{{ trans('localization::lang_view.add_document')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="document_one" id="avatarone" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s6 m4 l4 ">
                                                <input name="doc_name_two" id="doc_name2" type="text" value="{{ $doc_name_two }}" >
                                                <label for="doc_name2">{{ trans('localization::lang_view.document_name')}}</label>
                                            </div>
                                            <div class="input-field col s6 m4 l4">
                                                <input class="datepicker" name="expiry_date_two" id="expiry_date2" type="text" >
                                                <label for="expiry_date2">{{ trans('localization::lang_view.expiry_date')}}</label>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatartwo">{{ trans('localization::lang_view.add_document')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12 ">
                                                    <input name="document_two" id="avatartwo" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s6 m4 l4">
                                                <input name="doc_name_three" id="doc_name3" type="text" value="{{ $doc_name_three }}" >
                                                <label for="doc_name3">{{ trans('localization::lang_view.document_name')}}</label>
                                            </div>
                                            <div class="input-field col s6 m4 l4">
                                                <input class="datepicker" name="expiry_date_three" id="expiry_date3" type="text" >
                                                <label for="expiry_date3">{{ trans('localization::lang_view.expiry_date')}}</label>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatarthree">{{ trans('localization::lang_view.add_document')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12 ">
                                                    <input name="document_three" id="avatarthree" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="col s12 m12 l12">
                                        <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action">{{ trans('localization::lang_view.add_driver')}}
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

        function driverAdminSelectOption()
        {

            var value = document.getElementById('driver_admin').value;
            var ajaxPath = "<?php echo route('adminSpecificTypes');?>";
            var ajaxPathCompany = "<?php echo route('companySpecificTypes');?>";

            $.ajax({
                url: ajaxPath,
                type:  'POST',
                data: {
                    'referenceValue': value,
                },
                success: function(result)
                {
                    $('#mySelectType').empty();

                    $("#mySelectType").append('<option value="">{{ trans('localization::lang_view.select_driver_type')}}</option>');

                    for(var i = 0 ; i < result.length ; i++)
                    {
                        // console.log(result[i]);
                        $("#mySelectType").append('<option  class="left" value="'+result[i].id+'" data-icon="'+result[i].icon+'"  >'+result[i].name+'</option>');
                    }

                    $('#mySelectType').material_select();
                },
                error: function()
                {

                }
            });

            $.ajax({
                url: ajaxPathCompany,
                type:  'POST',
                data: {
                    'referenceValue': value,
                },
                success: function(result)
                {
                    console.log(result);
                    $('#company').empty();

                    $("#company").append('<option value="0">{{ trans('localization::lang_view.individual')}}</option>');

                    for(var i = 0 ; i < result.length ; i++)
                    {
                        // console.log(result[i]);
                        $("#company").append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }

                    $('#company').material_select();
                },
                error: function()
                {

                }
            });
        }



        $(document).ready(function(){
            $('.datepicker').pickadate({
                min: new Date()
            })
        });



        function DocumentValidate(){

            var doc_one = $('#doc_name1').val();
            var doc_two = $('#doc_name2').val();
            var doc_three = $('#doc_name3').val();

            if(doc_one != "" && ($('#expiry_date1').val())==""){

                Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

                return false;
            }
            else if((doc_one != "" || ($('#expiry_date1').val()) != "") &&($('#avatarone').val())=="" ){
                Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

                return false;

            }
            else if((doc_one == "")&& (($('#expiry_date1').val()) != "" ||($('#avatarone').val())!="" )){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

            }
            if(doc_two != "" && ($('#expiry_date2').val())==""){

                Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

                return false;
            }
            else if((doc_two != "" || ($('#expiry_date2').val()) != "") &&($('#avatartwo').val())=="" ){
                Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

                return false;

            }
            else if((doc_two == "")&& (($('#expiry_date2').val()) != "" ||($('#avatartwo').val())!="" )){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

            }

            if(doc_three != "" && ($('#expiry_date3').val())=="")
            {

                Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

                return false;
            }
            else if((doc_three != "" || ($('#expiry_date3').val()) != "") &&($('#avatarthree').val())=="" ){
                Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

                return false;

            }
            else if((doc_three == "")&& (($('#expiry_date3').val()) != "" ||($('#avatarthree').val())!="" )){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

            }



            return true;

        }


    </script>

@endsection
