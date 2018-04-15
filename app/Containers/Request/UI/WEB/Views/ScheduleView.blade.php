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


    <?php

    $test="";

    if($request->session()->get('filter_type') != '')
    {
        $test = trans('localization::errors.the table user filter by phone_number has ');

        $test=str_replace('user',trans('localization::lang_view.request'),$test);



        $test = str_replace('phone_number',trans('localization::lang_view.'.$request->session()->get('filter_type')),$test);


        $filterType = $request->session()->get('filter_type');

        $type = $filterType;

        if($filterType == 'trip_status' )
        {

            $filterValue = $request->session()->get('filter_value2');
            $value = $filterValue;

            if($filterValue == 'is_trip_start' )
            {
                $test = $test.trans('localization::lang_view.trip_not_yet_started');

            }
            else if( $filterValue == 'is_cancelled')
            {
                $test = $test.trans('localization::lang_view.trip_cancelled');

            }
            else if ($filterValue == 'is_completed')
            {
                $test = $test.trans('localization::lang_view.trip_completed');

            }
        }
        else if($filterType == 'is_paid' )
        {
            $filterValue = $request->session()->get('filter_value3');


            if($filterValue == '1' )
            {
                $test = $test.trans('localization::lang_view.paid');
                $value = 'paid';
            }
            else if($filterValue == '0')
            {
                $test = $test.trans('localization::lang_view.un_paid');
                $value = 'un_paid';
            }

        }
        else if($filterType == 'payment_option' )
        {
            $filterValue = $request->session()->get('filter_value4');

            if($filterValue == '0' )
            {
                $test = $test.trans('localization::lang_view.card');
                //paid
                $value = 'card';

            }
            else if($filterValue == '1')
            {
                $test = $test.trans('localization::lang_view.cash');
                //unpaid
                $value = 'cash';
            }
            else if($filterValue == '2')
            {
                $test = $test.trans('localization::lang_view.wallet');
                //unpaid
                $value = 'wallet';
            }
            else if($filterValue == '3')
            {
                $test = $test.trans('localization::lang_view.wallet/cash');
                //unpaid
                $value = 'wallet/cash';
            }
        }
        else
        {
            $filterValue = $request->session()->get('filter_value1');
            $value = $filterValue;

            if( $filterValue == '')
            {
                $test = '';
            }
            else
            {
                $test = $test.strtoupper($filterValue);
            }


        }


//        echo "<pre>";
//        print_r($type);
//        echo "<pre>";
//        print_r($value);
//        die();

        /*
                $filterValue = $request->session()->get('filter_value');

                $test= trans('localization::errors.the table user filter by phone_number has value');//.strtoupper($filterValue);

                $test=str_replace('user',trans('localization::lang_view.compliant'),$test);

                if($filterType == 'status')
                {
                    $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.'.$filterType)),$test);

                    if($filterValue == 1)
                    {
                        $test=str_replace('value',trans('localization::lang_view.new'),$test);

                    }
                    else if($filterValue == 2)
                    {
                        $test=str_replace('value',trans('localization::lang_view.taken'),$test);
                    }
                    else
                    {
                        $test=str_replace('value',strtoupper(trans('localization::lang_view.solved')),$test);

                    }
                }
                else if($filterType == 'company_name')
                {
                    $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.customer_name')),$test);
                    $test=str_replace('value',strtoupper($filterValue),$test);

                }
                    if($request->session()->get('status_value') != '')
            {
                $status_value = $request->session()->get('status_value');
            }
            else
            {
                $status_value = null;
            }
        */

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
                        <div class="col s8">
                            <h4 class="header"><?=$title;?></h4>
                        </div>
                        <div class="col s4">
                            <div class="header">

                            </div>
                        </div>

                        <div id="tab1" class="tap-target" data-activates="menu1">
                            <div class="tap-target-content">
                                <h5>Actions</h5>
                                <p>This is used to provide the actions for data</p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col s12 m12 l12">
                                <div class="row">
                                    <form method="get" action="{{ URL::Route('adminSchedule') }}">

                                        <div class="col s3 m2 l1"><a  onclick="help('menu','tab')">{{ trans('localization::lang_view.search')}}</a> : </div>

                                        <div id = "2" style="margin-top: -1rem;" class="col s5 m3 l2">

                                            <select id="a2" class="select" name="filter_value">

                                                <option value="is_scheduled" <?php if(isset($_GET['filter_value']) && $_GET['filter_value'] == 'is_scheduled') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_scheduled') }}</option>
                                                <option value="is_trip_start" <?php if(isset($_GET['filter_value']) && $_GET['filter_value'] == 'is_trip_start') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_inprogress') }}</option>
                                                <option value="is_completed" <?php if(isset($_GET['filter_value']) && $_GET['filter_value'] == 'is_completed') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_completed') }}</option>
                                                <option value="is_cancelled" <?php if(isset($_GET['filter_value']) && $_GET['filter_value'] == 'is_cancelled') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_cancelled') }}</option>

                                            </select>
                                        </div>

                                        <div class="col s4 m2 l2">
                                            <button class="btn search-btn cyan waves-effect waves-light" type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                <i class="material-icons right">send</i>
                                            </button>

                                        <!--<button type="submit" id="btnsearch" name="submit" class="btn btn-flat btn-block btn-success" value="Download_Report">{{ trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}</button>-->
                                        </div>
                                        <div class="col s6 m2 l2">
                                            <button class="btn download-btn cyan waves-effect waves-light" type="submit" name="submit" value="Download_Report">{{trans('localization::lang_view.report') }}
                                                <i class="material-icons right"> move_to_inbox </i>
                                            </button>
                                        </div>
                                        <div style="float: right" class="col s3 m3 right-align">

                                        </div>

                                    </form>

                                </div>
                                <div class="divider"></div><br>
                            </div>

                            <div class="col s12 m12 l12">
                            <div class="card" style="overflow: auto"><br>

                                <table id="table" class="bordered ">

                                    <thead>
                                    <tr>
                                        <th>{{ trans('localization::lang_view.s.no')}}</th>
                                        <th>{{ trans('localization::lang_view.request_id')}}</th>
                                        <th>{{ trans('localization::lang_view.user_name')}}</th>
                                        <th>{{ trans('localization::lang_view.date')}}</th>
                                        <th>{{ trans('localization::lang_view.time')}}</th>
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
                                    foreach ($result as $key=>$value)
                                    {

                                    ?>
                                    <tr>
                                        <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>

                                        <td><?=$value['request_id'];?></td>
                                        <td><?=$value['userName'];?></td>
                                        <?php
                                        $dates=date_create($value['trip_start_time']);
                                        $date=date_format($dates,"m-Y-d");
                                        $time=date_format($dates,"h:i A");
                                        ?>
                                        <td><?=$date;?></td>
                                        <td><?=$time;?></td>
                                        <td><?php if($value['is_completed']==1){?>
                                            <span class="status-solved">
                                                {{  trans('localization::lang_view.trip_completed') }}
                                            </span>
                                            <?php }elseif($value['is_cancelled']==1){?>
                                            <span class="status-new">
                                                {{ trans('localization::lang_view.trip_cancelled') }}
                                            </span>
                                            <?php }elseif($value['is_trip_start'] == 0 && $value['is_completed'] != 1 && $value['is_cancelled'] != 1){?>
                                            <span class="status-taken">
                                                {{  trans('localization::lang_view.trip_scheduled') }}
                                            </span>
                                            <?php }else{ ?>
                                            <span class="status-cash">
                                                {{  trans('localization::lang_view.trip_inprogress') }}
                                            </span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="container">
                                                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                    <i class="material-icons hide-on-med-and-up">settings</i>
                                                    <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                    <i class="material-icons right">arrow_drop_down</i>
                                                </a>
                                                <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">

                                                    <?php
                                                    if($value['is_trip_start'] == 0 && $value['is_completed'] != 1 && $value['is_cancelled'] != 1)
                                                    {
                                                    ?>
                                                    <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminScheduleCancel',$value['id']) }}">{{ trans('localization::lang_view.cancel')}}</a></li>
                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php $s_no++; }?>
                                    </tbody>
                                </table><br><br><br><br><br>

                                <div class="pagination" align="left" id="paglink">
                                    <?php

                                    echo $result->appends(array('filter_value' => $request->session()->get('filter_value')))->links();
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
