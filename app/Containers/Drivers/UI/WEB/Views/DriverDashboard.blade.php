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


    $test='';
    $result = $result[0];

    $colorArray = array('card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text','card gradient-45deg-red-pink gradient-shadow min-height-100 white-text','card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text','card gradient-45deg-green-teal gradient-shadow min-height-100 white-text');

    if( $days == 0 )
    {
        $test = trans('localization::lang_view.today');
    }

    if( $days == 'null' )
    {
        $test = trans('localization::lang_view.over_all');
    }


    if( $days == 7 )
    {
        $test = trans('localization::lang_view.last_week');
    }

    if( $days == 31 )
    {
        $test = trans('localization::lang_view.last_month');
    }

    if( $days == 365 )
    {
        $test = trans('localization::lang_view.last_year');
    }



    $test =  trans('localization::lang_view.the_driver').' ' .$test.' '.trans('localization::lang_view.income');




    ?>



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


                                    <form method="post" action="{{ URL::Route('adminDriverIncomeValue') }}">

                                        <div class="col s3 m1 l1"><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.search')}}</a> : </div>

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input name="id" type="hidden" value = {{ $id }} >


                                        <div style="margin-top: -1rem;" class="col s5 m2 l2">
                                            <select class="select" name="filter_type">
                                                <option value="0" <?php
                                                        if ($days == 0) {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.today')}}</option>
                                                <option value="7" <?php
                                                        if ($days == '7') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{  trans('localization::lang_view.last_week')}}</option>
                                                <option value="31" <?php
                                                        if ($days == '31') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{  trans('localization::lang_view.last_month')}}</option>
                                                <option value="365" <?php
                                                        if ($days == '365') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{  trans('localization::lang_view.last_year')}}</option>

                                                <option value= null <?php
                                                        if ($days == 'null') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{  trans('localization::lang_view.over_all')}}</option>
                                            </select>
                                        </div>


                                        <div class="col s4 m2 l2">
                                            <button class="btn search-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>

                                    </form>


                                </div>
                                <div class="divider"></div><br>
                            </div>



                            <div class="col s12">

                                    <div class="col s12 m6 l3">
                                        <div style="min-height: 150px !important;" class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                                            <div class="padding-4">
                                                <div class="col s7 m7 l7">
                                                    <i class="material-icons background-round mt-5">account_box</i>
                                                    <p> {{ trans('localization::lang_view.total_trip') }}</p>
                                                </div>
                                                <div class="col s5 m5 l5 right-align">
                                                    <h5 class="mb-0"> {{ $result->total_trip }}</h5>
                                                    {{--<p class="no-margin">New</p>--}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col s12 m6 l3">
                                        <div style="min-height: 150px !important;" class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">

                                            <div class="padding-4">
                                                <div class="col s7 m7 l7">
                                                    <i class="material-icons background-round mt-5">account_box</i>
                                                    <p> {{ trans('localization::lang_view.total_earned') }}</p>
                                                </div>
                                                <div class="col s5 m5 l5 right-align">
                                                    <h5 class="mb-0" style="margin-left: -80px;">

                                                        <?php
                                                        if($result->total_earned != null)
                                                        {
                                                            echo  $result->total_earned ;

                                                        }
                                                        else
                                                        {
                                                            echo "0" ;

                                                        }
                                                        ?>

                                                    </h5>
                                                    {{--<p class="no-margin">Growth</p>--}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col s12 m6 l3">

                                        <div style="min-height: 150px !important;" class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">

                                            <div class="padding-4">
                                                <div class="col s7 m7 l7">
                                                    <i class="material-icons background-round mt-5">account_box</i>
                                                    <p> {{ trans('localization::lang_view.transfered') }}</p>
                                                </div>
                                                <div class="col s5 m5 l5 right-align">

                                                    <h5 class="mb-0" style="margin-left: -80px;">
                                                        <?php
                                                        if($result->transfered != null)
                                                        {
                                                            echo  $result->transfered ;

                                                        }
                                                        else
                                                        {
                                                            echo "0" ;

                                                        }
                                                        ?>
                                                    </h5>
                                                    {{--<p class="no-margin">Growth</p>--}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col s12 m6 l3">
                                        <div style="min-height: 150px !important;" class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">

                                            <div class="padding-4">
                                                <div class="col s7 m7 l7">
                                                    <i class="material-icons background-round mt-5">account_box</i>
                                                    <p> {{ trans('localization::lang_view.non_transfered') }}</p>
                                                </div>
                                                <div class="col s5 m5 l5 right-align">
                                                    <h5 class="mb-0" style="margin-left: -80px;">

                                                        <?php
                                                        if($result->non_transfered != null)
                                                        {
                                                            echo  $result->non_transfered ;

                                                        }
                                                        else
                                                        {
                                                            echo "0" ;

                                                        }
                                                        ?>
                                                    </h5>
                                                    {{--<p class="no-margin">Growth</p>--}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>



                        <div class="col s12 m12 l12">

                            <div class="card" style="overflow: auto">
                                <br>
                            <table id="table" class="bordered ">


                                <thead>
                                <tr>
                                    <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                    <th data-field="id">{{ trans('localization::lang_view.request_id')}}</th>
                                    <th data-field="name">{{ trans('localization::lang_view.date_time')}}</th>
                                    <th data-field="price">{{ trans('localization::lang_view.payment_type')}}</th>
                                    <th data-field="price">{{ trans('localization::lang_view.status')}}</th>
                                    <th data-field="price"><a class="tooltipped" onclick="help('menu1','tab1')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                </tr>

                                </thead>

                                <tbody>

                                    <?php
                                    if(count($tableResult) == 0)
                                    {

                                    ?>
                                <tr>
                                    <td class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</td>
                                </tr>
                                    <?php

                                    }
                                    else
                                    {
                                    $s_no = 1;

                                    foreach ($tableResult as $key => $value)
                                    {

                                    ?>
                                <tr>
                                    <td> {{ $s_no }} </td>
                                    <td> {{ $value->requestId  }} </td>
                                    <td> {{ $value->date  }}</td>
                                    <td>

                                        <?php

                                            if($value->paymentType == '0')
                                            {

                                        ?>

                                            <span class="status-card">
                                                    {{  trans('localization::lang_view.card') }}
                                            </span>
                                        <?php
                                            }
                                            else if($value->paymentType == 1)
                                            {
                                        ?>
                                            <span class="status-cash">
                                                    {{  trans('localization::lang_view.cash') }}
                                            </span>
                                        <?php
                                            }


                                        ?>

                                    </td>
                                    <td>

                                        <?php

                                            if($value->isPaid == 0 )
                                            {
                                        ?>
                                                <span class="status-red"><?php echo trans('localization::lang_view.unpaid_to_driver');?></span>
                                        <?php
                                            }
                                            elseif($value->isPaid == 1)
                                            {
                                        ?>
                                                <span class="status-green"><?php echo trans('localization::lang_view.paid_to_driver');?></span>
                                        <?php
                                            }
                                            elseif($value->isPaid == 2)
                                            {
                                        ?>
                                                <span class="status-cash"><?php echo trans('localization::lang_view.paid_to_company');?></span>
                                        <?php
                                            }
                                        ?>

                                    </td>
                                    <td>

                                        <?php

                                        if($value->isPaid != 1)
                                        {
                                        ?>

                                            <div class="container">
                                                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                    <i class="material-icons hide-on-med-and-up">settings</i>
                                                    <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                    <i class="material-icons right">arrow_drop_down</i>
                                                </a>
                                                <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">


                                                    <?php if($value->isPaid != 1){ ?>

                                                    <li><a  href="{{ URL::Route('adminDriverIncomePaid',$value->id) }}">{{ trans('localization::lang_view.paid_to_driver')}}</a></li>

                                                    <?php  }



                                                    ?>


                                                </ul>

                                            </div>
                                        <?php
                                        }


                                        ?>


                                    </td>
                                </tr>
                                    <?php

                                    $s_no = $s_no+1;

                                    }
                                    ?>


                                    <?php
                                    }

                                    ?>

                                </tbody>
                            </table><br><br><br><br><br>


                            {{ $tableResult->appends(\Illuminate\Support\Facades\Input::except('page'))->render() }}
                                <br><br><br><br><br>

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


            if($(window).width() <=600){

                var width = document.getElementById("table").offsetWidth;

                $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

            }

        });

        function WidthChange(){

            if($(window).width() <=600){

                var width = document.getElementById("table").offsetWidth;

                $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

            }

        }

    </script>

@endsection