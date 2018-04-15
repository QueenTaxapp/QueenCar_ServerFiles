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

    $type_name ="";

    if(session()->has('_old_input'))    {
        $type_name = session()->get('_old_input')["type_name"];
    }

    ?>


    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="bordered-table">

                        <h4 class="header">{{ trans('localization::lang_view.add_admin_types')}}
                            <span class="back-button"  style="float: right;"><a class="tooltipped" href="{{URL::Route('adminTypesView')}}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_role_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                        </h4>
                        <div class="row">

                            <div class="col s12 m12 l12">

                                <form id="RegisterValidation" action="{{ URL::Route('adminTypesSave')}}"  method="post" enctype="multipart/form-data" >
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">

                                        <?php if($role_admin_key == 0){ ?>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <select name="roleAdmin" id="role_admin"  required >
                                                    <option value="">{{trans('localization::lang_view.select')}}</option>
                                                    <?php
                                                    foreach($role_admins as $value){ ?>
                                                    <option value="<?=$value->admin_key;?>" > <?php echo $value->area_name;?></option>
                                                    <?php }; ?>

                                                </select>
                                                <label for="role_admin" class="">{{ trans('localization::lang_view.select_area_for_this_type')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <input name="roleAdmin" type="hidden" value="<?=$role_admin_key;?>" >
                                        <?php } ?>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m12 l12">
                                                <div class="input-field">
                                                    <label for="type_name">{{trans('localization::lang_view.type_name')}}<sup>*</sup></label>
                                                    <input name="type_name" id="type_name" type="text" value="{{$type_name}}" class="form-control" required >
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn save-btn cyan waves-effect waves-light right" >{{ trans('localization::lang_view.add_type')}}
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