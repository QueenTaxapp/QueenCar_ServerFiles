@extends('layout::Layout')
@section('content')
    <?php

    $timezones=$result;

    $role = $admin->role;
   /* foreach($timezones as $key => $value ){
        foreach($value['zones'] as $zone_key => $zone_value ){
             echo "<pre>";  print_r($zone_value['value']);
        }
    };die();*/
    //echo "<pre>";print_r($timezones);die();


    ?>

    <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{ trans('localization::lang_view.edit_admin')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{URL::Route('adminView')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('adminUpdate',$admin->admin_id)}}" method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="firstName" id="first_name" type="text" maxlength="15" value="<?=$admin->firstname;?>" class="validate" required >
                                                        <label for="first_name" class="active">{{ trans('localization::lang_view.first_name')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="lastName" id="last_name" type="text" maxlength="15" value="<?=$admin->lastname;?>" class="validate" required >
                                                        <label for="last_name">{{ trans('localization::lang_view.last_name')}} <sup>*</sup></label>
                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m12 l12">
                                                        <input name="address" id="address" type="text" value="<?=$admin->address;?>" class="validate">
                                                        <label for="address" >{{ trans('localization::lang_view.address')}}</label>
                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="country" id="country" type="text" value="<?=$admin->country;?>" class="validate" required >
                                                        <label for="country" class="active">{{ trans('localization::lang_view.country')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="pincode" id="pincode" type="text" value="<?=$admin->postalcode;?>" >
                                                        <label for="pincode">{{ trans('localization::lang_view.postal_code')}}</label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <select name="timezone" id="timezone" required >
                                                            <?php

                                                                //print_r($admin->timezone);die();

                                                            foreach($timezones as $key => $value ){
                                                                foreach($value['zones'] as $zone_key => $zone_value ){?>
                                                                <option value="<?=$zone_value['value'];?>" <?php if($zone_value['value'] == $admin->timezone){echo " selected";}?>><?=$zone_value['name'];?></option>
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

                                                            <option value="{{ $value->short_lang }}" <?php if($admin->language == $value->short_lang){echo "selected";}?> >{{ trans('localization::common_language.'.$value->name).' ( '.trans('localization::lang_view.'.$value->name).') '}}</option>


                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="admin_language">{{ trans('localization::common_language.admin_language')}} <sup>*</sup></label>

                                                    </div>

                                                   <div class="input-field col s6 m6 l6">
                                                       <input type="hidden" name="old_email" value="<?=$admin->email;?>">

                                                       <input name="email" id="email" type="email" value="<?=$admin->email;?>" class="validate" required >
                                                       <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
                                                       <input name="update" value="1" type="hidden">
                                                   </div>


                                                </div>



                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m12 l6">
                                                        <input type="hidden" name="old_phone_number" value="<?=$admin->phone_number;?>">

                                                        <input name="phone_number" id="phone" type="text" value="<?=$admin->phone_number;?>" class="validate" required >
                                                        <label for="phone" class="active">{{ trans('localization::lang_view.phone_number')}} <sup>*  </sup> ({{trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
                                                    </div>
                                                    <div class="input-field col s12 m12 l6">
                                                        <input type="hidden" name="old_emergency_number" value="<?=$admin->emergency_number;?>">
                                                        <input name="emergency_number" id="emergency_number" type="text" value="<?=$admin->emergency_number;?>" class="validate" required >
                                                        <label for="emergency_number" class="active">{{ trans('localization::lang_view.emergency_number')}} <sup>*</sup>({{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="col s12 m6 l6">
                                                        <div class=" col s12 m12 l12">
                                                            <label for="avatar">{{ trans('localization::lang_view.set_profile_picture')}}</label>
                                                        </div>
                                                        <div class="input-field col s12 m12 l12">
                                                            <input name="profile_pic" id="avatar input-file-to-destroy" data-default-file="<?=$admin->profile_pic;?>" class="dropify" data-allowed-file-extensions="jpg png jpeg" data-show-errors="true"  data-max-height="2000" type="file">
                                                        </div>
                                                    </div>

                                                    <div class="input-field col s12 m6 l6">
                                                        <select name="role" id="role_type"  onchange="alertMessage();" required >

                                                            <option value="">{{ trans('localization::lang_view.select_admin_role')}}</option>

                                                            <?php

                                                            if($role == 0)
                                                            {
                                                            ?>
                                                                <option value="0" selected >{{ trans('localization::lang_view.super_admin')}}</option>



                                                            <?php
                                                            }
                                                            else if($role == 99999)
                                                            {
                                                            ?>
                                                                <option value="99999" selected>{{ trans('localization::lang_view.admin')}}</option>
                                                            <?php


                                                            }
                                                            else
                                                            {
                                                                foreach($types as $key=>$value)
                                                                {
                                                                ?>
                                                                <option value="<?=$value->id?>"  <?php if($admin->role == $value->id){echo "selected";}?> ><?=$value->types?></option>

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
                                                        <input type="hidden" name="old_area_name" value="<?=$admin->area_name;?>">

                                                        <input name="area_name" id="select_area_name" type="text" value="{{ $admin->area_name}}" class="validate" >
                                                        <label for="area_name" id = "area_name_label">{{ trans('localization::lang_view.area_name')}}</label>
                                                    </div>
                                                </div>
                                            </div>



                                            <br><hr><br>
                                            <div class="row">
                                                <div class="col s12 m12 l12">{{ trans('localization::lang_view.add_documents')}}</div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6 ">
                                                        <input name="doc_name_one" id="doc_name1" type="text" value="<?=$admin->document_name;?>" >
                                                        <label for="doc_name1">{{ trans('localization::lang_view.document_name')}}</label>
                                                    </div>
                                                    <div class="col s12 m6 l6">
                                                        <div class=" col s12 m12 l12">
                                                            <label for="avatarone">{{ trans('localization::lang_view.change_document')}}</label>
                                                        </div>
                                                        <div class="input-field col s12 m12 l12 ">
                                                            <input name="document_one" id="avatarone" data-default-file="<?=$admin->document;?>" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col s12 m12 l12">

                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action" value="edit_modify">{{ trans('localization::lang_view.apply_changes')}}

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


        function DocumentValidate(){

            var doc_one = $('#doc_name1').val();

            if((doc_one == "")&& ($('#avatarone').val())!="" ){
                Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
                return false;

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



@endsection
