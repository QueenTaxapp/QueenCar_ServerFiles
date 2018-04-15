@extends('layout::Layout')
@section('content')


    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="bordered-table">

                        <h4 class="header">{{ trans('localization::lang_view.edit_user')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminUserView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_user_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                        </h4>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form action="{{URL::Route('adminUserUpdate',$user->id)}}"  method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="firstName" id="first_name" type="text" value="<?=$user->firstname;?>" class="validate" required >
                                                <label for="first_name" class="active">{{ trans('localization::lang_view.first_name')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="lastName" id="last_name" type="text" value="<?=$user->lastname;?>" required >
                                                <label for="last_name">{{ trans('localization::lang_view.last_name')}}  <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="address" id="address" type="text" value="<?=$user->address;?>" class="validate">
                                                <label for="address" >{{ trans('localization::lang_view.address')}}</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="city" id="city" type="text" value="<?=$user->city;?>" class="validate" required >
                                                <label for="city" class="active">{{ trans('localization::lang_view.city')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">

                                                <input name="state" id="state" type="text" value="<?=$user->state;?>" >
                                                <label for="state">{{ trans('localization::lang_view.state')}}</label>
                                            </div>
                                        </div>

                                        <div class="col s12 m12 l12">

                                            <div class="input-field col s12 m12 l12">
                                                <input name="email" id="email" type="email" class="validate" value="<?=$user->email;?>" required >
                                                <label for="email" data-error="wrong" data-success="right">{{ trans('localization::lang_view.email')}} <sup>*</sup></label>
                                                <input name="update" value="1" type="hidden">
                                            </div>

                                        </div>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="phone_number" id="phone" type="text" value="<?=$user->phone_number;?>" class="validate" required >
                                                <label for="phone" class="active">{{ trans('localization::lang_view.phone_number')}} <sup>*</sup>({{ trans('localization::lang_view.with_country_code').' '.trans('localization::lang_view.ex.+91')}})</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <select name="gender" id="gender"  >
                                                    <option value="1" <?php if($user->gender==1){echo "selected";}?> >{{ trans('localization::lang_view.male')}}</option>
                                                    <option value="2" <?php if($user->gender==2){echo "selected";}?> >{{ trans('localization::lang_view.female')}}</option>
                                                </select>
                                                <label for="gender">{{ trans('localization::lang_view.gender')}}</label>
                                            </div>
                                        </div>
                                        <div class="col s12 m12 l12">

                                            <div class="col s12 m6 l6">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar">{{ trans('localization::lang_view.change_profile_picture')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="profile_pic" id="avatar" data-default-file="<?=$user->profile_pic;?>" class="dropify" data-allowed-file-extensions="jpg jpeg png" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="col s12 m12 l12">
                                        <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.update_user')}}
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
