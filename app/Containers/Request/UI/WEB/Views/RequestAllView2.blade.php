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
        else if($filterType == 'date_option' )
        {
            $startDate = $request->session()->get('filter_value5');
            $endDate = $request->session()->get('filter_value6');

            $test = $test.$startDate.' '.trans('localization::lang_view.to').' '.$endDate;

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
                                    <form method="get" action="{{ URL::Route('adminAllRequest') }}">

                                        <div class="col s3 m1 l1"><a  onclick="help('menu','tab')">{{ trans('localization::lang_view.search')}}</a> : </div>
                                        <div id = "1" class="col s4 m2 l2">
                                            <input name="filter_value1" style="height: 2rem;" id="a1" type="text" value="<?php echo (!empty($_GET['filter_value1']) ? $_GET['filter_value1'] : '');?>" placeholder="{{ trans('localization::lang_view.enter_search_value')}}">

                                        </div>
                                        <div id = "2" style="margin-top: -1rem;" class="col s4 m2 l2">

                                            <select id="a2" class="select" name="filter_value2">



                                                <option value="is_trip_start" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == 'is_trip_start') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_not_yet_started') }}</option>
                                                <option value="is_cancelled" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == 'is_cancelled') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_cancelled') }}</option>
                                                <option value="is_completed" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == 'is_completed') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.trip_completed') }}</option>

                                            </select>
                                       </div>
                                        <div id = "3" style="margin-top: -1rem;" class="col s4 m2 l2">
                                            <select id="a3" class="select" name="filter_value3">

                                                <option value="0" <?php if(isset($value) && $value == 'un_paid' ) { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.un_paid') }}</option>
                                                <option value="1" <?php if(isset($value) && $value == 'paid') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.paid') }}</option>
                                            </select>
                                       </div>
                                       <div id = "4" style="margin-top: -1rem;" class="col s4 m2 l2">
                                            <select id="a4" class="select" name="filter_value4">

                                                <option value="0" <?php if(isset($value) && $value == 'card' ) { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.card') }}</option>
                                                <option value="1" <?php if(isset($value) && $value == 'cash' ) { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.cash') }}</option>
                                                <option value="2" <?php if(isset($value) && $value == 'wallet') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.wallet') }}</option>
                                                <option value="3" <?php if(isset($value) && $value == 'wallet/cash') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.wallet/cash') }}</option>


                                            </select>
                                        </div>
                                        <div id = "5" class="col s3 m2 l2">
                                            <input name="filter_value5" class="datepicker" style="height: 2rem;" id="a5" type="text" value="<?php echo (!empty($_GET['filter_value5']) ? $_GET['filter_value5'] : '');?>" placeholder="{{ trans('localization::lang_view.start_date')}}">

                                        </div>

                                        <div id = "6" class="col s3 m2 l2">
                                            <input name="filter_value6" class="datepicker" style="height: 2rem;" id="a6" type="text" value="<?php echo (!empty($_GET['filter_value6']) ? $_GET['filter_value6'] : '');?>" placeholder="{{ trans('localization::lang_view.end_date')}}">

                                        </div>

                                        <div style="margin-top: -1rem;" class="col s3 m2 l2">

                                            <select id = "sel" class="select" name="filter_type">
                                                <option value="request_id" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'request_id') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.request_id')}}

                                                </option>

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

                                                <option value="trip_status" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'trip_status') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.trip_status')}}
                                                </option>
                                                <option value="is_paid" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'is_paid') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.is_paid')}}
                                                </option>

                                                <option value="payment_option" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'payment_option') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.payment_option')}}
                                                </option>

                                                <option value="date_option" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'date_option') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.date_option')}}
                                                </option>



                                            </select>
                                        </div>

                                        <div class="col s6 m2">
                                            <button class="btn search-btn cyan waves-effect waves-light " type="submit" onclick="return DateValidate();" name="action">{{ trans('localization::lang_view.search')}}
                                                <i class="material-icons right">send</i>
                                            </button>

                                        <!--<button type="submit" id="btnsearch" name="submit" class="btn btn-flat btn-block btn-success" value="Download_Report">{{ trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}</button>-->
                                        </div>
                                        <div class="col s6 m2">
                                            <button class="btn download-btn cyan waves-effect waves-light " type="submit" name="submit" onclick="return DateValidate();" value="Download_Report">{{trans('localization::lang_view.report') }}
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
                                        <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.date/time')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.request_id')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.user_name')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.driver_name')}}</th>
                                        <th data-field="price">{{ trans('localization::lang_view.trip_status')}}</th>

                                        <th data-field="price">{{ trans('localization::lang_view.is_paid')}}</th>
                                        <th data-field="price">{{ trans('localization::lang_view.payment_option')}}</th>

                                        <th data-field="price"><a  onclick="help('menu1','tab1')">{{ trans('localization::lang_view.actions')}}</a></th>
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

                                        <td><?php if($value['trip_start_time'] != ""){
                                                echo $value['trip_start_time'];
                                            }else{
                                                echo $value['created_at'];
                                            }?>

                                        </td>
                                        <td><?=$value['request_id'];?></td>
                                        <td><?=$value['userName'];?></td>
                                        <td><?=$value['driverName'];?></td>
                                        <td>
                                            <?php
                                            if($value['is_cancelled'] == 1  )
                                            {
                                            ?>
                                            <span class="status-new">
                                                    {{ trans('localization::lang_view.trip_cancelled') }}

                                                </span>


                                            <?php
                                            }
                                            else if($value['is_trip_start'] == 0 && $value['is_cancelled'] != 1)
                                            {
                                            ?>
                                                <span class="status-taken">
                                                    {{  trans('localization::lang_view.trip_not_yet_started') }}
                                                </span>
                                            <?php

                                            }

                                            else if ($value['is_cancelled'] == 0 && $value['is_completed'] == 1 && $value['is_trip_start'] == 1)
                                            {
                                            ?>

                                            <span class="status-solved">

                                              {{  trans('localization::lang_view.trip_completed') }}
                                            </span>

                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($value['is_paid'] == 0 )
                                            {
                                            ?>
                                            <span class="status-new">
                                              {{  trans('localization::lang_view.un_paid') }}
                                            </span>

                                            <?php
                                            }
                                            else if($value['is_paid'] == 1)
                                            {
                                            ?>

                                            <span class="status-solved">
                                               {{  trans('localization::lang_view.paid') }}
                                            </span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if( $value['payment_opt'] == 0)
                                            {
                                            ?>
                                                <span class="status-card">
                                                    {{  trans('localization::lang_view.card') }}
                                                </span>

                                            <?php
                                            }
                                            else if( $value['payment_opt'] == 1)
                                            {
                                            ?>
                                                <span class="status-cash">
                                                    {{  trans('localization::lang_view.cash') }}
                                                </span>

                                            <?php
                                            }
                                            else if ( $value['payment_opt'] == 2)
                                            {
                                            ?>
                                                <span class="status-wallet">
                                                   {{  trans('localization::lang_view.wallet') }}
                                                </span>

                                            <?php
                                            }
                                                else if ( $value['payment_opt'] == 3)
                                                {
                                                ?>
                                                <span class="status-wallet-cash">
                                                   {{  trans('localization::lang_view.wallet/cash') }}
                                                </span>

                                                <?php
                                                }
                                            ?>

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
                                                        if($value['trip_start_time'] != null)
                                                        {
                                                        ?>

                                                        <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminRequest',$value['id']) }}">{{ trans('localization::lang_view.view')}}</a></li>
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

                                    echo $result->appends(array('filter_type' => $request->session()->get('filter_type'), 'filter_value1' => $request->session()->get('filter_value1')
                                    ,'filter_value2' => $request->session()->get('filter_value2'),'filter_value3' => $request->session()->get('filter_value3'),'filter_value4' => $request->session()->get('filter_value4')))->links();
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        function DateValidate(){

            if($('#sel').val() == "date_option"){

                var startDate = $('#a5').val();
                var endDate = $('#a6').val();

                if(startDate == ''){
                    Materialize.toast("{{trans('localization::errors.start_date_required')}}", 4000);
                    return false;
                }

                if(endDate == ''){
                    Materialize.toast("{{trans('localization::errors.end_date_required')}}", 4000);
                    return false;
                }

            }
        }
    </script>
    <script>

        $(document).ready(function()
        {
            $('.carousel').carousel();

            $('.carousel.carousel-slider').carousel({fullWidth: true}).unbind('click');

            $('.datepicker').pickadate({
                format:"yyyy-mm-dd"
            });


            $('#a5').change(function () {

                var startDate = $('#a5').val();
                var endDate = $('#a6').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#a5').val('');
                }
            });

            $('#a6').change(function () {
                var startDate = $('#a5').val();
                var endDate = $('#a6').val();
                if(startDate > endDate && startDate != ''){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#a6').val('');
                }
            });


        });


        $(document).ready(function()
        {

            if($('#sel').val() == 'is_paid')
            {
//                $("#a1").attr('disabled','disabled');

                $("#1").hide();
                $("#2").hide();
                $("#3").show();
                $("#4").hide();
                $("#5").hide();
                $("#6").hide();


            }
            else if($('#sel').val() == 'trip_status')
            {

//                $("#a2").attr('disabled','disabled');

                $("#1").hide();
                $("#2").show();
                $("#3").hide();
                $("#4").hide();
                $("#5").hide();
                $("#6").hide();
            }
            else if($('#sel').val() == "payment_option")
            {
//                $("#a1").removeAttr('disabled');
//                $("#a2").attr('disabled','disabled');

                $("#1").hide();
                $("#2").hide();
                $("#3").hide();
                $("#4").show();
                $("#5").hide();
                $("#6").hide();
            }
            else if($('#sel').val() == "date_option")
            {
//                $("#a1").removeAttr('disabled');
//                $("#a2").attr('disabled','disabled');

                $("#1").hide();
                $("#2").hide();
                $("#3").hide();
                $("#4").hide();
                $("#5").show();
                $("#6").show();
            }
            else
            {
                // $("#a2").attr('disabled','disabled');

                $("#1").show();
                $("#2").hide();
                $("#3").hide();
                $("#4").hide();
                $("#5").hide();
                $("#6").hide();

            }



            $("#sel").change(function()
            {
                if($(this).val() == "is_paid")
                {
//                    $("#a2").removeAttr('disabled');
//                    $("#a1").attr('disabled','disabled');


                    $("#1").hide();
                    $("#2").hide();
                    $("#3").show();
                    $("#4").hide();
                    $("#5").hide();
                    $("#6").hide();

                }
                else if($(this).val() == "trip_status")
                {
//                    $("#a1").removeAttr('disabled');
//                    $("#a2").attr('disabled','disabled');

                    $("#1").hide();
                    $("#2").show();
                    $("#3").hide();
                    $("#4").hide();
                    $("#5").hide();
                    $("#6").hide();
                }
                else if($(this).val() == "payment_option")
                {
//                    $("#a1").removeAttr('disabled');
//                    $("#a2").attr('disabled','disabled');

                    $("#1").hide();
                    $("#2").hide();
                    $("#3").hide();
                    $("#4").show();
                    $("#5").hide();
                    $("#6").hide();
                }
                else if($(this).val() == "date_option")
                {
                    $("#1").hide();
                    $("#2").hide();
                    $("#3").hide();
                    $("#4").hide();
                    $("#5").show();
                    $("#6").show();
                }
                else
                {
                    $("#1").show();
                    $("#2").hide();
                    $("#3").hide();
                    $("#4").hide();
                    $("#5").hide();
                    $("#6").hide();
                }

            });
        });

    </script>

@endsection
