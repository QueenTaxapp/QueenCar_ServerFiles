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

                                <h4 class="header"><?=$title;?></h4>

                                <div class="row">
                                    <div class="col s12">

                                        <div style="float: right" class="col s3 m2 l2 right-align">
                                            <a href="{{ URL::Route('adminCurrencyAdd') }}" class="add-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_currency')}}" >
                                                <i class="material-icons left">add</i>{{ trans('localization::lang_view.add')}}
                                            </a>
                                        </div>

                                        <div id="tab" class="tap-target" data-activates="menu">
                                            <div class="tap-target-content">
                                                <h5>Search</h5>
                                                <p>This is used to search the values</p>
                                            </div>
                                        </div>

                                        <div id="tab1" class="tap-target" data-activates="menu1">
                                            <div class="tap-target-content">
                                                <h5>Actions</h5>
                                                <p>This is used to provide the actions for data</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col s12 m12 l12">
                                        <br><div class="divider"></div><br>

                                        <div class="card" style="overflow: auto">
                                        <table id="table" class="bordered ">
                                            <thead>
                                            <tr>
                                                <th>{{ trans('localization::lang_view.s.no')}}</th>
                                                <th>{{ trans('localization::lang_view.currency_name')}}</th>
                                                <th>{{ trans('localization::lang_view.symbol')}}</th>
                                                <th>{{ trans('localization::lang_view.standard_name')}}</th>
                                                <th>{{ trans('localization::lang_view.status')}}</th>
                                                <th><a class="tooltipped" onclick="help('menu1','tab1')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(count($currency)==0){?>
                                                    <td class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</td>
                                             <?php   }
                                            $s_no=1;
                                            foreach ($currency as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>
                                                <td><?=$value->name;?></td>
                                                <td><?=$value->symbol;?></td>
                                                <td><?=$value->standard_name;?></td>
                                                <td><?php if($value->status==1)
                                                    {
                                                    ?>
                                                    <span class="status-green"><?php echo trans('localization::lang_view.active');?></span>
                                                    <?php
                                                    }elseif($value->status==0)
                                                    {
                                                    ?>
                                                    <span class="status-red"><?php echo trans('localization::lang_view.inactive');?></span>
                                                    <?php
                                                    }?></td>

                                                <td>
                                                    <div class="container">
                                                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                            <i class="material-icons hide-on-med-and-up">settings</i>
                                                            <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                            <i class="material-icons right">arrow_drop_down</i>
                                                        </a>
                                                        <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminCurrencyEdit',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('adminCurrencyDelete',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>


                                                            <li><a onclick="" class="<?php if($value->status==0){echo "sweet-active";}else{echo "sweet-inactive";} ?> grey-text text-darken-2" href="{{ URL::Route('adminCurrencyToggle',$value->id) }}">
                                                                    <?php if ($value->status == 0) { ?>
                                                                        {{ trans('localization::lang_view.active')}}
                                                                    <?php }else{ ?>
                                                                        {{ trans('localization::lang_view.inactive')}}
                                                                    <?php   } ?>
                                                                </a></li>

                                                            {{--<li><a class="sweet-inactive grey-text text-darken-2" href="{{ URL::Route('adminPromoInactive',$value->id) }}">{{ trans('localization::lang_view.inactive')}} </a></li>--}}

                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                          <?php $s_no++; }?>
                                            </tbody>
                                        </table><br><br><br><br><br>

                                        <div class="pagination" align="left" id="paglink">
                                            <?php

                                            echo $currency->appends(array('filter_type' => $request->session()->get('filter_type'), 'filter_value' => $request->session()->get('filter_value'), 'filter_value_select' => $request->session()->get('filter_value_select')))->links();
                                            ?>
                                        </div><br><br><br><br><br>

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


        if($(window).width() <=800){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

        }

    });

    function WidthChange(){

        if($(window).width() <=800){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

        }

    }

</script>


@endsection