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
                            <span class="back-button" style="float: right;"><a class="tooltipped" href="{{URL::Route('adminTypesView')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_role_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                        </h4>
                        <div class="row">

                            <div class="col s12 m12 l12">
                                <form id="RegisterValidation" action="{{ URL::Route('adminTypeNameSave',$result->id)}}"  method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">
                                        <div class="col s12 m12 l12">
                                            <div class="input-field">
                                                <label class="control-label">{{ trans('localization::lang_view.type_name')}}<sup>*</sup></label>
                                                <input name="type_name" type="text" class="form-control" value="<?=$result->types;?>" required >
                                                <input name="update" value="1" type="hidden">
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