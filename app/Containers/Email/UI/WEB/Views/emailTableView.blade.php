@extends('admin::Layout')
@section('content')

    <style>
        sup{
            color:red;
            font-size: 12px;
            left: 2px;

        }
    </style>


<!--<?php //echo "<pre>";print_r( session()->all());?>-->



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">contacts</i>
                            </div>

                               {{-- <p class="category">Complete your profile</p>--}}
                            <div class="card-content">
                                <h4 >{{ trans('localization::lang_view.create_user')}}</h4>
                                <span style="position: absolute;float: right;right: 32px;top: 16px;"><a href="{{ URL::Route('viewUser')}}" data-toggle="tooltip" title="{{ trans('localization::lang_view.back_to_view_users_details')}}">{{ trans('localization::lang_view.view_users')}}<i class="material-icons">reply</i> </a></span>

                                <form id="RegisterValidation" action="{{ URL::Route('saveUser')}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.first_name')}}<sup>*</sup></label>
                                                <input name="firstName" type="text" class="form-control" value = "{{$firstName}}" required >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.last_name')}}<sup>*</sup></label>
                                                <input name="lastName" type="text" class="form-control" value = "{{$lastName}}" required >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.address')}}</label>
                                                <input name="adr" type="text" value = "{{$address}}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.username')}}<sup>*</sup></label>
                                                <input name="username" type="text" class="form-control" value = "{{$username}}"required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.email_address')}}<sup>*</sup></label>
                                                <input name="email" type="email" class="form-control" value = "{{$emailAddress}}"required >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.phone_number')}}<sup>*</sup></label>
                                                <input name="phone_number" type="text" class="form-control" value = "{{$phoneNumber}}"required >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ trans('localization::lang_view.password')}}<sup>*</sup></label>
                                                <input name="pass" type="password" id="pass_id" class="form-control valid" required >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">

                                                <label class="control-label">{{ trans('localization::lang_view.confirm_password')}}<sup>*</sup></label>
                                                <input id="registerPasswordConfirmation" type="password" equalTo="#pass_id" class="form-control error" required >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6 col-sm-4">
                                            <legend>{{ trans('localization::lang_view.set_profile_picture')}}</legend>
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img name="profile_pic" src="http://via.placeholder.com/200?text=Upload%20Image" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round btn-rose btn-file">
                                                        <span class="fileinput-new">{{ trans('localization::lang_view.add_photo')}}</span>
                                                        <span class="fileinput-exists">{{ trans('localization::lang_view.change')}}</span>
                                                        <input type="file" name="avatar">
                                                    <div class="ripple-container"></div></span>
                                                    <br>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>{{ trans('localization::lang_view.remove')}}</a>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-3">
                                            <button type="submit" class="btn btn-primary pull-right" >{{ trans('localization::lang_view.add_user')}}</button>
                                        </div>
                                    </div>

                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




@endsection