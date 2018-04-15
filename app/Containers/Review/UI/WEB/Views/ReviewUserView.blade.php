@extends('layout::Layout')
@section('content')


<?php 
    // echo "<pre>";
    // print_r($result);
    // die();
?>
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


<?php $test="";
if($request->session()->get('filter_type') != ''&& $request->session()->get('filter_value')!= '')
{
    $filterType = $request->session()->get('filter_type');

    $filterValue = $request->session()->get('filter_value');

    $test= trans('localization::errors.the table user filter by phone_number has ').strtoupper($filterValue);

    $test=str_replace('user',trans('localization::lang_view.review'),$test);

    if($filterType == 'user_name')
    {

        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.user_name')),$test);
        //die( $test=str_replace('phone_number',trans('localization::lang_view.name'),$test));
    }
    else if($filterType == 'driver_name')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.driver_name')),$test);
    }
    else if($filterType == 'phone')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.phone_number')),$test);
    }


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

                                   <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h4 class="header">{{$title}}
                                            <a href="{{ URL::Route('driverReview') }}" class="user-state-btn waves-effect waves-light btn right tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.to_view_driver_review')}}" >
                                                {{ trans('localization::lang_view.driver_review')}}
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 m12 l12">

                                        <!-- Element Showed -->

                                        <!-- Tap Target Structure -->
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

                                        <p>{{$test}}</p>

                                    </div>
                                    <div class="col s12 m12 l12">
                                        <div class="row">
                                            <form method="get" action="{{ URL::Route('userReview') }}">

                                            <div class="col s3 m1 l1"><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.search')}}</a> : </div>
                                            <div class="col s4 m2 l2">
                                                    <input name="filter_value" style="height: 2rem;" id="search_value" type="text" value="<?php echo (!empty($_GET['filter_value']) ? $_GET['filter_value'] : '');?>" placeholder="{{ trans('localization::lang_view.enter_search_value')}}">
                                            </div>
                                            <div style="margin-top: -1rem;" class="col s5 m3 l2">
                                                <select class="select" name="filter_type">
                                                    <option value="user_name" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'user_name') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.user_name')}}
                                                    </option>
                                                    <option value="driver_name" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'driver_name') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.driver_name')}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col s6 m3 l2">
                                                <button class="btn search-btn cyan waves-effect waves-light " type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                            <div class="col s6 m3 l3">
                                                <button class="btn download-btn cyan waves-effect waves-light " type="submit" name="submit" value="Download_Report">{{trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}
                                                    <!--<i class="material-icons right">send</i>-->
                                                </button>
                                            </div>

                                            </form>

                                        </div>

                                    </div>



                                    <div class="col s12 m12 l12">
                                    <div class="card" style="overflow: auto">
                                        <br>
                                        <table id="table" class="bordered ">


                                            <thead>
                                            <tr>
                                                <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                                <th data-field="price">{{ trans('localization::lang_view.user_name')}}</th>

                                                <th data-field="name">{{ trans('localization::lang_view.rating') }}</th>
                                                <th data-field="price"> {{trans('localization::lang_view.comment')}}</th>
                                                <th data-field="price">{{ trans('localization::lang_view.request_id')}}</th>
                                                <th data-field="id">{{ trans('localization::lang_view.driver_name') }}</th>
                                                <th data-field="price"><a class="tooltipped" onclick="help('menu1','tab1')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
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

                                                <td><?=$value->user_name;?></td>
                                                <td><?=$value->rating;?></td>
                                                <td><?=json_decode($value->comment);?></td>
                                                <td><?=$value->request_id;?></td>
                                                <td><?=$value->driver_name;?></td>



                                                <td>
                                                    <div class="container">
                                                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                            <i class="material-icons hide-on-med-and-up">settings</i>
                                                            <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                            <i class="material-icons right">arrow_drop_down</i>
                                                        </a>
                                                        <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('editUserReview',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>
                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                          <?php $s_no++; }?>
                                            </tbody>
                                        </table><br><br><br><br><br>

                                        <div class="pagination" align="left" id="paglink">
                                            <?php

                                            echo $result->appends(array('filter_type' => $request->session()->get('filter_type'), 'filter_value' => $request->session()->get('filter_value')))->links();
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


        if($(window).width() <=520){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

        }

    });

    function WidthChange(){

        if($(window).width() <=520){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

        }

    }

</script>


@endsection