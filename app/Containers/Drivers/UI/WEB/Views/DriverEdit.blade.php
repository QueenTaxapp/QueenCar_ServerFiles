@extends('layout::Layout')
@section('content')

    <style>
        .highlight{
            border-color: red;
        }
    </style>


    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="bordered-table">

                        <h4 class="header">{{ trans('localization::lang_view.edit_driver')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminDriverView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_driver_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                        </h4>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form action="{{URL::Route('adminDriverUpdate',$driver->driver_id)}}" method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">

                                        <?php
                                        if($driver_admin_key == 0){ ?>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <select onchange="driverAdminSelectOption()" name="driverAdmin" id="driver_admin" required >
                                                    <?php
                                                    foreach($driver_admins as $value){ ?>
                                                    <option value="<?=$value->admin_key;?>" <?php if($driver->admin_reference == $value->admin_key){echo "selected";}?> > <?php echo $value->area_name;?></option>
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
                                                <input name="firstName" id="first_name" type="text" value="<?=$driver->firstname;?>" class="validate" required >
                                                <label for="first_name" class="active">{{ trans('localization::lang_view.first_name')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="lastName" id="last_name" type="text" value="<?=$driver->lastname;?>" class="validate" required >
                                                <label for="last_name">{{ trans('localization::lang_view.last_name')}}  <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="address" id="address" type="text" value="<?=$driver->address;?>" class="validate">
                                                <label for="address" >{{ trans('localization::lang_view.address')}}</label>
                                            </div>
                                        </div>


                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s4">
                                                <input name="city" id="city" type="text" value="<?=$driver->city;?>" class="validate" required >
                                                <label for="city" class="active">{{ trans('localization::lang_view.city')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s4">
                                                <input name="state" id="state" type="text" value="<?=$driver->state;?>" >
                                                <label for="state">{{ trans('localization::lang_view.state')}}</label>
                                            </div>
                                            <div class="input-field col s4">
                                                <select name="country_code" id="country" required >
                                                    <?php
                                                    foreach($country_array as $value){ ?>
                                                    <option value="<?=$value->name;?>" <?php if($driver->country==$value->name){echo "selected";}?> > <?php echo $value->name.' ('.$value->d_code.')';?></option>
                                                    <?php }; ?>

                                                </select>
                                                <label for="country" >{{ trans('localization::lang_view.country')}} <sup>*</sup></label>
                                            </div>
                                        </div>


                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="email" id="email" type="email" class="validate" value="<?=$driver->email;?>" required >
                                                <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
                                                <input name="update" value="1" type="hidden">
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="phone_number" id="phone" type="text" value="<?=$driver->phone_number;?>" class="validate" required >
                                                <label for="phone" class="active">{{ trans('localization::lang_view.phone_number')}} <sup>*</sup>({{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <select name="gender" id="gender"  >
                                                    <option value="1" <?php if($driver->gender==1){echo "selected";}?> >{{ trans('localization::lang_view.male')}}</option>
                                                    <option value="2" <?php if($driver->gender==2){echo "selected";}?> >{{ trans('localization::lang_view.female')}}</option>
                                                </select>
                                                <label for="gender">{{ trans('localization::lang_view.gender')}}</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m4 l4">
                                                <select id="mySelectType" name="type"  required >


                                                    <option value="">{{ trans('localization::lang_view.select_driver_type')}}</option>
                                                    <?php foreach($types as $key=>$value){?>

                                                    <option class="left" value="<?=$value->id?>" data-icon="<?=$value->icon;?>" <?php if($driver->type==$value->id){echo "selected";} ?> ><?=$value->name?></option>

                                                    <?php }?>
                                                </select>
                                                <label for="type">{{ trans('localization::lang_view.type')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="car_model" id="car_model" type="text" value="<?=$driver->car_model;?>" >
                                                <label for="car_model">{{ trans('localization::lang_view.car_model')}}</label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="car_number" id="car_no" type="text" value="<?=$driver->car_number;?>" >
                                                <label for="car_no">{{ trans('localization::lang_view.car_number')}}</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="col s12 m6 l6">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar">{{ trans('localization::lang_view.add_profile_picture')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="profile_pic" id="avatar" data-default-file="<?=$driver->profile_pic;?>" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <select name="company" id="company" >
                                                    <option value="0">{{ trans('localization::lang_view.individual')}}</option>
                                                    <?php foreach($company as $key=>$value){?>

                                                    <option value="<?=$value->id?>" <?php if($driver->company==$value->id){echo "selected";} ?> ><?=$value->company_name?></option>

                                                    <?php }?>
                                                </select>
                                                <label for="company">{{ trans('localization::lang_view.company')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr><br>
                                    <div class="row">
                                        <div class="col s12 m12 l12">{{ trans('localization::lang_view.add_documents')}}</div>

                                        <?php
                                        $alpha=array('one','two','three');
                                        $count=1;
                                        foreach($driver_documents as $doc_value){?>
                                        <div class="col s12 m12 l12">    <input type="hidden" name="doc_id[]" value="<?=$doc_value->id?>">
                                            <div class="input-field col s6 m4 l4 ">
                                                <input name="doc_name_<?=$alpha[$count-1]?>" id="doc_name<?=$count?>" type="text" value="<?=$doc_value->document_name;?>" >
                                                <label for="doc_name<?=$count?>">{{ trans('localization::lang_view.document_name')}}</label>
                                            </div>
                                            <div class="input-field col s6 m4 l4">
                                                <input class="datepicker" name="expiry_date_<?=$alpha[$count-1]?>" id="expiry_date<?=$count?>" type="text" value="<?=$doc_value->document_ex_date;?>" >
                                                <label for="expiry_date<?=$count?>">{{ trans('localization::lang_view.expiry_date')}}</label>
                                            </div>
                                            <div class="col s12 m4 l4">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar<?=$alpha[$count-1]?>">{{ trans('localization::lang_view.add_document')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12 ">
                                                    <input name="document_<?=$alpha[$count-1]?>" id="avatar<?=$alpha[$count-1]?>" data-default-file="<?=$doc_value->document;?>" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                        </div>

                                        <?php $count++;}?>

                                    </div>
                                    <br>
                                    <div class="col s12 m12 l12">
                                        <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action">{{ trans('localization::lang_view.update_driver')}}
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
                min: new Date()
            });

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
                        var driverType = "<?php echo $driver->type;?>";


                        $("#mySelectType").append('<option  id = "type_'+result[i].id+'"class="left" value="'+result[i].id+'" data-icon="'+result[i].icon+'" <?php if($driver->type==$value->id){echo "selected";} ?> >'+result[i].name+'</option>');

                        if (driverType == result[i].id)
                        {

                            $("#type_"+result[i].id).attr('selected', 'selected');
                        }
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
                    $('#company').empty();

                    $("#company").append('<option value="0" >{{ trans('localization::lang_view.individual')}}</option>');

                    for(var i = 0 ; i < result.length ; i++)
                    {
                        // console.log(result[i]);
                        $("#company").append('<option value="'+result[i].id+'" <?php if($driver->company==$value->id){echo "selected";} ?> >'+result[i].name+'</option>');
                    }

                    $('#company').material_select();
                },
                error: function()
                {

                }
            });


        });


        function DocumentValidate(){

            var doc_one = $('#doc_name1').val();
            var doc_two = $('#doc_name2').val();
            var doc_three = $('#doc_name3').val();

            if(doc_one != "" && ($('#expiry_date1').val())==""){

                Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

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

            else if((doc_two == "")&& (($('#expiry_date2').val()) != "" ||($('#avatartwo').val())!="" )){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

            }
            if(doc_three != "" && ($('#expiry_date3').val())==""){

                Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

                return false;
            }

            else if((doc_three == "")&& (($('#expiry_date3').val()) != "" ||($('#avatarthree').val())!="" )){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

            }



            return true;

        }
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

                    // for(var i = 0 ; i < result.length ; i++)
                    // {
                    //   // console.log(result[i]);
                    //   $("#mySelectType").append('<option  class="left" value="'+result[i].id+'" data-icon="'+result[i].icon+'" <?php if($driver->type==$value->id){echo "selected";} ?> >'+result[i].name+'</option>');
                    // }

                    for(var i = 0 ; i < result.length ; i++)
                    {
                        var driverType = "<?php echo $driver->type;?>";


                        $("#mySelectType").append('<option  id = "type_'+result[i].id+'"class="left" value="'+result[i].id+'" data-icon="'+result[i].icon+'" <?php if($driver->type==$value->id){echo "selected";} ?> >'+result[i].name+'</option>');

                        if (driverType == result[i].id)
                        {

                            $("#type_"+result[i].id).attr('selected', 'selected');
                        }
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
                    'referenceValue': value
                },
                success: function(result)
                {
                    $('#company').empty();

                    $("#company").append('<option value="0">{{ trans('localization::lang_view.individual')}}</option>');

                    for(var i = 0 ; i < result.length ; i++)
                    {
                        // console.log(result[i]);
                        $("#company").append('<option value="'+result[i].id+'" <?php if($driver->company==$value->id){echo "selected";} ?> >'+result[i].name+'</option>');
                    }

                    $('#company').material_select();
                },
                error: function()
                {

                }
            });
        }

    </script>

@endsection
