@extends('layout::Layout')
@section('content')
    <?php

    $company_name ="";
    $name ="";
    $phone_number ="";
    $email ="";
    $vat = "";
    $landline_number = "";
    $address ="";
    $pincode ="";
    $state ="";
    $country ="";
    $profile_pic = "";
    $documentName = "";


    if(session()->has('_old_input'))
    {
        $company_name = session()->get('_old_input')["company_name"];
        $name  = session()->get('_old_input')["name"];
        $phone_number  = session()->get('_old_input')["phone_number"];
        $email  = session()->get('_old_input')["email"];
        $address  = session()->get('_old_input')["address"];
        $pincode  = session()->get('_old_input')["pincode"];
        $state = session()->get('_old_input')["state"];
        $country = session()->get('_old_input')["country"];
        $vat    = session()->get('_old_input')["vat"];
        $landline_number = session()->get('_old_input')["landline_number"];
        $documentName = session()->get('_old_input')["document_name"];
        // $document = session()->get('_old_input')["document"];
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

                        <h4 class="header">{{ trans('localization::lang_view.register_company')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{URL::Route('companyView')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_view_company_details')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                        </h4>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form action="{{URL::Route('registerCompany')}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">


                                        <?php if($company_admin_key == 0){ ?>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <select name="companyAdmin" id="company_admin" required >
                                                    <option value="" > {{ trans('localization::lang_view.select')}}</option>
                                                    <?php
                                                    foreach($company_admins as $value){ ?>
                                                    <option value="<?=$value->admin_key;?>" > <?php echo $value->area_name;?></option>
                                                    <?php }; ?>
                                                </select>
                                                <label for="company_admin" class="">{{ trans('localization::lang_view.select_area_for_this_company')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <input name="companyAdmin" type="hidden" value="<?=$company_admin_key;?>" >
                                        <?php } ?>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="company_name" id="company_name" type="text"  class="validate" value="{{ $company_name}}" required >
                                                <label for="company_name" class="active">{{ trans('localization::lang_view.company_name')}} <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="name" id="name" type="text"  class="validate" value="{{$name}}" required >
                                                <label for="name" class="active">{{ trans('localization::lang_view.owner_name')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="vat" id="vat" type="text"  class="validate" value="{{$vat}}" required >
                                                <label for="vat" class="active">{{ trans('localization::lang_view.vat_number')}} <sup>*</sup></label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="phone_number" id="phone" type="text" value="{{ $phone_number}}" class="validate" value="{{ $phone_number}}" required >
                                                <label for="phone" class="active">{{ trans('localization::lang_view.phone_number')}} <sup> * </sup>  ( {{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}} )</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="landline_number" id="landline_number" type="text" value="{{ $landline_number}}" class="validate" value="" >
                                                <label for="landline_number" class="active">{{ trans('localization::lang_view.landline_number')}} </label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m4 l4">
                                                <input name="email" id="email" type="email"  class="validate" value="{{ $email}}"required >
                                                <label for="email" class="active">{{ trans('localization::lang_view.email')}} <sup>*  </sup> </label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="password" id="password" type="password"  class="validate" required >
                                                <label for="password" class="active">{{ trans('localization::lang_view.password')}} <sup>*  </sup> </label>
                                            </div>
                                            <div class="input-field col s12 m4 l4">
                                                <input name="confirm_password" id="confirm_password" type="password"  class="validate" required >
                                                <label for="confirm_password" class="active">{{ trans('localization::lang_view.confirm_password')}} <sup>*  </sup> </label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="address" id="address" type="text"  class="validate" value="{{ $address}}">
                                                <label for="address" >{{ trans('localization::lang_view.address')}}</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m4 l4">
                                                <input name="pincode" id="pincode" type="text" value="{{ $pincode}}" >
                                                <label for="pincode">{{ trans('localization::lang_view.postal_code')}}</label>
                                            </div>

                                            <div class="input-field col s12 m4 l4">
                                                <input name="state" id="state" type="text" value="{{ $state}}" >
                                                <label for="state">{{ trans('localization::lang_view.state')}}</label>
                                            </div>

                                            <div class="input-field col s12 m4 l4">
                                                <input name="country" id="country" type="text"  class="validate" value="{{ $country}}" >
                                                <label for="country" class="active">{{ trans('localization::lang_view.country')}} </label>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="col s12 m6 l6">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar">{{ trans('localization::lang_view.document')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="document" id="avatar input-file-to-destroy" data-default-file="" class="dropify" data-allowed-file-extensions="jpg png jpeg pdf" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="document_name" id="document_name" type="text" value="{{ $documentName}}" >
                                                    <label for="document_name">{{ trans('localization::lang_view.document_name')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="col s12 m6 l6">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar">{{ trans('localization::lang_view.set_profile_picture')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="profile_pic" id="avatar input-file-to-destroy" data-default-file="" class="dropify" data-allowed-file-extensions="jpg png jpeg pdf" data-show-errors="true"  data-max-height="2000" type="file">
                                                    <br>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col s12 m12 l12">
                                            <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="submit" value = "add">{{ trans('localization::lang_view.register')}}
                                                <i class="material-icons right">send</i>
                                            </button>

                                        </div>


                                    </div>


                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!--end container-->
        </div>
    </section>



@endsection