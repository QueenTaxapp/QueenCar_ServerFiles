@extends('layout::Layout')
@section('content')
    <style>
        sup{
            color:red;
            font-size: 12px;
            left: 2px;

        }
        #noresult
        {
            text-align: center;

        }
    </style>
    <?php
    $test = "";
    ?>


    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="bordered-table">

                        <h4 class="header">{{ trans('localization::lang_view.edit_admin_types')}}
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{URL::Route('adminView')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                        </h4>
                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form id="RegisterValidation" action="{{ URL::Route('adminPasswordUpdate',$request->id)}}"  method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <input name="password" id="password" type="password"  class="validate" required >
                                                <label for="password">{{ trans('localization::lang_view.password')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                    </div>

                                <button type="submit" class="btn save-btn cyan waves-effect waves-light right" >
                                    {{ trans('localization::lang_view.update_type')}}
                                    <i class="material-icons right">send</i>
                                </button>
                                <div class="clearfix"></div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




@endsection