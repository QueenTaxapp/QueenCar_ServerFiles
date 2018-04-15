@extends('layout::Layout')
@section('content')

<style>
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


    <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{$title}}</h4>

                                <div class="row">

                                    <div id="tab1" class="tap-target" data-activates="menu1">
                                            <div class="tap-target-content">
                                                <h5>Actions</h5>
                                                <p>This is used to provide the actions for data</p>
                                            </div>
                                        </div>

                                    <div class="col s12 m12 l12">
                                        <div style="" class="col s6 m3 l3 right">
                                            <a href="{{ URL::Route('zoneAdd') }}" class="add-btn waves-effect waves-light btn right tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_zone')}}" >
                                                <i class="material-icons left">add</i>{{ trans('localization::lang_view.add')}}
                                            </a>

                                        </div>
                                    </div>

                                    <div class="col s12 m12 l12">
                                        <div class="card" style="overflow: auto">
                                            <br>
                                        <table id="table" class="bordered ">

                                            <thead>
                                            <tr>
                                                <th>{{ trans('localization::lang_view.s.no')}}</th>
                                                <th>{{ trans('localization::lang_view.zone_name')}}</th>
                                                <th>{{ trans('localization::lang_view.status')}}</th>
                                                <th><a class="tooltipped" onclick="help('menu1','tab1')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(count($result)==0){?>
                                                    <td class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</td>
                                             <?php   }
                                            $s_no=1;
                                            foreach ($result as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>

                                                <td><?=$value['name'];?></td>
                                                <td><?php if($value->is_active==1)
                                                    {
                                                    ?>
                                                    <span class="status-green"><?php echo trans('localization::lang_view.active');?></span>
                                                    <?php
                                                    }elseif($value->is_active==0)
                                                    {
                                                    ?>
                                                    <span class="status-red"><?php echo trans('localization::lang_view.inactive');?></span>
                                                    <?php
                                                    }?>
                                                </td>

                                                <td>
                                                    <div class="container">
                                                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                            <i class="material-icons hide-on-med-and-up">settings</i>
                                                            <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                            <i class="material-icons right">arrow_drop_down</i>
                                                        </a>
                                                        <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">

                                                            {{-- <li><a class="grey-text text-darken-2" href="">{{ trans('localization::lang_view.edit')}}</a></li>--}}

                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('zoneMapView',$value->id) }}">{{ trans('localization::lang_view.map_view')}}</a></li>

                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('zoneTypeView',$value->id) }}">{{ trans('localization::lang_view.type_view')}}</a></li>

                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('zoneSurge',$value->id) }}">{{ trans('localization::lang_view.surge_price')}}</a></li>

                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('zoneCurrencyEdit',$value->id) }}">{{ trans('localization::lang_view.zone_settings')}}</a></li>

                                                            <li><a onclick="" class="<?php if($value->is_active == 0){echo "sweet-active";}else{echo "sweet-inactive";}?> grey-text text-darken-2" href="{{ URL::Route('zoneStatusToggle',$value->id) }}">
                                                                    <?php if ($value->is_active == 0) { ?>
                                                                    {{ trans('localization::lang_view.active')}}
                                                                    <?php } else { ?>
                                                                    {{ trans('localization::lang_view.inactive')}}
                                                                    <?php } ?>
                                                                </a>
                                                            </li>

                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('zoneDelete',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>


                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                          <?php $s_no++; }?>
                                            </tbody>
                                        </table><br><br><br><br><br><br>

                                        <div class="pagination" align="left" id="paglink">
                                            <?php

                                            echo $result->appends(array())->links();
                                            ?>
                                        </div><br><br><br><br><br><br>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <!--end container-->
            </div>
        </section>

<script>

    document.addEventListener("DOMContentLoaded", function() {
        var window_size = $(window).width();

        $(window).resize(function() {

            window_size = $(window).width();
            WidthChange();
        });


        if($(window).width() <=340){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-130)+"px !important;}"}).appendTo('head');

        }

    });

    function WidthChange(){

        if($(window).width() <=340){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-130)+"px !important;}"}).appendTo('head');

        }

    }

</script>


@endsection