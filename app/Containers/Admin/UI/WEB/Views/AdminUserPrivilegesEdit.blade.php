@extends('layout::Layout')
@section('content')






    <style>
        sup{
            color:red;
            font-size: 12px;
            left: 2px;

        }
    </style>

    <?php
    $admin_id=$id;

    ?>

    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">


                    <h4 class="header">{{ trans('localization::lang_view.set_admin_privilege')}}
                        <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                    </h4>

                    <form id="RegisterValidation" action="{{ URL::Route('adminUserPrivilegesUpdate',$admin_id)}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">






                        <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">

                            <?php
                            $collapse_id="1";
                            //print_r($user_permissions);die();
                            foreach ($array as $module_key=>$module){


                            if(is_array($user_permissions) && count($user_permissions) != 0 ){

                                if(in_array($module_key,$user_permissions['module'])){
                                    $checks="checked";
                                }else{
                                    $checks="";
                                }

                            }else{
                                $checks="";
                            }

                            ?>


                            <li class="">
                                <div class="collapsible-header">

                                    <input type="checkbox" name="<?=$module_key?>" id="<?=$module_key?>" <?=$checks?>  onclick="event.stopPropagation()" style="z-index: 1;pointer-events:auto ;width: 17px;height: 17px;"/>
                                    <label style="pointer-events:none ;" for="<?=$module_key?>"><b><?=$module_key?> </b></label>
                                </div>

                                <div class="collapsible-body" style="display: none;">

                                    <?php



                                    foreach ($module['sub_module'] as $key=>$value){  //echo "<pre>";print_r($key);die();

                                    if(is_array($user_permissions)){

                                        if(in_array($value,$user_permissions['sub_module'])){

                                            $checks="checked";
                                        }else{
                                            $checks="";
                                        }

                                    }else{
                                        $checks="";
                                    }

                                    ?>
                                    <table class="table table-bordered">

                                        <tr><td>
                                                <input type="checkbox" name="<?=$key;?>" id="<?=$key;?>" value="<?=$value;?>" <?=$checks?> onclick="event.stopPropagation()" style="z-index: 1;pointer-events: auto;width: 17px;height: 17px;"/>
                                                <label for="<?=$key;?>"> <?=$value;?> </label>
                                            </td></tr>
                                    </table>
                                    <?php }
                                    ?>


                                </div>
                            </li>


                            <?php $collapse_id++; } ?>

                        </ul>


                        <br>
                        <button type="submit" class="btn save-btn  btn-primary right" >{{ trans('localization::lang_view.save_admin_privilege')}}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </section>




@endsection