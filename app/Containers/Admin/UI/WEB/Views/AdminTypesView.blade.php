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
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
        .pagination li.active {
            width: 30px;
        }

    </style>




    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="bordered-table">
                        <h4  class="header"><?=$title;?></h4>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div id="tab" class="tap-target" data-activates="menu">
                                    <div class="tap-target-content">
                                        <h5>Actions</h5>
                                        <p>This is used to provide the actions for data</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col s12 m12 l12">
                                <div style="" class="col s4 m2 right">
                                    <a href="{{ URL::Route('adminTypesAdd') }}" class="add-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_role')}}" >
                                        <i class="material-icons left">add</i>{{ trans('localization::lang_view.add')}}
                                    </a>

                                </div>

                            </div>

                            <div class="col s12 m12 l12">
                                    <br><div class="divider"></div><br>
                                <div class="card" style="overflow: auto">
                                    <br>
                                <table id="table" class="bordered">
                                    <tr>
                                        <th>{{ trans('localization::lang_view.s.no')}}</th>
                                        <th>{{ trans('localization::lang_view.name')}}</th>
                                        <th><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                    </tr>
                                    <?php
                                    $array = $result;
                                    $count = count($array);
                                    if($count == 0)
                                    {
                                    ?>
                                    <tr>
                                        <td class="no-result" colspan="11" style="text-align:center;">
                                            {{ trans('localization::lang_view.no_result_found')}}
                                        </td>

                                    </tr>
                                    <?php
                                    }

                                    $no=1;
                                    foreach($array as $value) { ?>
                                    <tr>
                                        <td><?php echo $no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>

                                        <td><?php echo $value->types?></td>

                                        <td>

                                            <div class="container">
                                                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$no;?>" style="">
                                                    <i class="material-icons hide-on-med-and-up">settings</i>
                                                    <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                    <i class="material-icons right">arrow_drop_down</i>
                                                </a>
                                                <ul id="dropdown<?=$no;?>" class="drop dropdown-content" style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                                    <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminTypeNameEdit',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                    <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminTypePrivilegeEdit',$value->id) }}">{{ trans('localization::lang_view.set_privilege')}}</a></li>

                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php   $no++; }

                                    ?>
                                </table><br><br><br><br><br>

                                <div align="left" id="paglink">
                                    <?php

                                    echo $array->appends(array())->links();
                                    ?>
                                </div><br><br><br><br><br>
                            </div>
                        </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        document.addEventListener("DOMContentLoaded", function() {
            var window_size = $(window).width();

            $(window).resize(function() {

                window_size = $(window).width();
                WidthChange();
            });


            if($(window).width() <=300){

                var width = document.getElementById("table").offsetWidth;

                $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

            }

        });

        function WidthChange(){

            if($(window).width() <=300){

                var width = document.getElementById("table").offsetWidth;

                $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

            }

        }

    </script>



@endsection