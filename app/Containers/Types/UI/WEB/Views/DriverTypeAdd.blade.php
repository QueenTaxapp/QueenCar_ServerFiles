@extends('layout::Layout')
@section('content')
    <?php

    $typeName ="";
    $typeIcon ="";


    if(session()->has('_old_input'))    {
        $typeName = session()->get('_old_input')["typeName"];

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

                        <h4 class="header">{{ trans('localization::lang_view.add_type')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminDriverTypeView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_type_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                        </h4>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form action="{{URL::Route('adminDriverTypeSave')}}"  method="post" enctype="multipart/form-data" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">

                                        <?php if($type_admin_key == 0){ ?>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <select name="typeAdmin" id="type_admin" required >
                                                    <option value="" >{{ trans('localization::lang_view.select')}}</option>
                                                    <?php
                                                    foreach($type_admins as $value){ ?>
                                                    <option value="<?=$value->admin_key;?>" > <?php echo $value->area_name;?></option>
                                                    <?php }; ?>


                                                </select>
                                                <label for="type_admin" class="">{{ trans('localization::lang_view.select_area_for_this_type')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <input name="typeAdmin" type="hidden" value="<?=$type_admin_key;?>" >
                                        <?php } ?>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="typeName" id="name" type="text" value="{{ $typeName}}" class="validate" required >
                                                <label for="name" class="active">{{ trans('localization::lang_view.type_name')}} <sup>*</sup></label>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <div class=" col s12 m12 l12">
                                                    <label for="avatar">{{ trans('localization::lang_view.add_icon')}}</label>
                                                </div>
                                                <div class="input-field col s12 m12 l12">
                                                    <input name="profile_pic" id="avatar input-file-to-destroy" data-default-file="" class="dropify" data-allowed-file-extensions="jpg jpeg" data-show-errors="true"  data-max-height="2000" type="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col s12 m12 l12">
                                        <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.add_type')}}
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