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

//     echo "<pre>";
//     print_r($result);
//     die();

    $test="";
    if($request->session()->get('filter_type') != '' && $request->session()->get('filter_value')!= '')
    {
        $filterType = $request->session()->get('filter_type');




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


    }

    if($request->session()->get('status_value') != '')
    {
        $status_value = $request->session()->get('status_value');
    }
    else
    {
        $status_value = null;
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
                                <a href="{{ URL::Route('driverCompliantView') }}" class="user-state-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.driver_compliant')}} " style="top: 14px;float: right;">
                                    {{trans('localization::lang_view.driver_compliant')}}
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">

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
                                    <form method="get" action="{{ URL::Route('userCompliantView') }}">

                                        <div class="col s3 m1 l1"><a  onclick="help('menu','tab')">{{ trans('localization::lang_view.search')}}</a> : </div>
                                        <div id = "1" class="col s4 m2 l2">
                                            <input name="filter_value1" style="height: 2rem;" id="a1" type="text" value="<?php echo (!empty($_GET['filter_value1']) ? $_GET['filter_value1'] : '');?>" placeholder="{{ trans('localization::lang_view.enter_search_value')}}">

                                        </div>
                                        <div id = "2" style="margin-top: -1rem;" class="col s5 m2 l2">

                                            <select id="a2" class="select" name="filter_value2">

                                                <option value="1" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == '1') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.new') }}</option>
                                                <option value="2" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == '2') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.taken') }}</option>
                                                <option value="3" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == '3') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.solved') }}</option>


                                            </select>
                                        </div>

                                        <div style="margin-top: -1rem;" class="col s4 m2 l2">

                                            <select id = "sel" class="select" name="filter_type">



                                                <option value="status" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'status') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.status')}}
                                                </option>
                                                <option value="company_name" <?php
                                                        if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'company_name') {
                                                            echo 'selected="selected"';
                                                        } ?> >{{ trans('localization::lang_view.customer_name')}}

                                                </option>



                                            </select>
                                        </div>
                                        <div class="col s6 m2 l2">
                                            <button class="btn search-btn cyan waves-effect waves-light " type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                <i class="material-icons right">send</i>
                                            </button>

                                        <!--<button type="submit" id="btnsearch" name="submit" class="btn btn-flat btn-block btn-success" value="Download_Report">{{ trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}</button>-->
                                        </div>
                                        <div class="col s6 m3 l2">
                                            <button class="btn download-btn cyan waves-effect waves-light " type="submit" name="submit" value="Download_Report">{{trans('localization::lang_view.report') }}
                                            <i class="material-icons right"> move_to_inbox </i>
                                            </button>
                                        </div>
                                        <div style="float: right" class="col s12 m2 l3">
                                            <a href="{{ URL::Route('compliantView') }}" class="add-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.compliant_view')}}" >
                                                <i class="material-icons left">add</i>{{ trans('localization::lang_view.view_compliant')}}
                                            </a>
                                        </div>

                                    </form>

                                </div>
                                <div class="divider"></div><br>
                            </div>



                            <div class="col s12 m12 l12">

                                <div class="card" style="overflow: auto">
                                    <br>
                                    <table id="table" class="bordered ">

                                    <thead>
                                    <tr>
                                        <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.compliants_title')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.description')}}</th>
                                        <th data-field="company_name">{{ trans('localization::lang_view.status')}}</th>
                                        <th data-field="price">{{ trans('localization::lang_view.customer_name')}}</th>
                                        <th data-field="price"><a  onclick="help('menu1','tab1')">{{ trans('localization::lang_view.actions')}}</a></th>
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
                                        <td><?=$value['compliant_title'];?></td>
                                        <td><?=$value['description'];?></td>

                                        <td><?php
                                            if($value->compliant_status == 1)
                                            {
                                            ?>
                                            <span class="status-new"><?php echo trans('localization::lang_view.new');?></span>

                                        <?php
                                            }

                                            else if($value->compliant_status == 2)
                                            {
                                            ?>
                                            <span class="status-taken"><?php echo trans('localization::lang_view.taken');?></span>
                                            <?php
                                            }
                                            elseif($value->compliant_status == 3)
                                            {
                                            ?>
                                            <span class="status-solved"><?php echo trans('localization::lang_view.solved');?></span>

                                            <?php
                                            }

                                            ?>
                                        </td>
                                        <td><?=$value['username'];?></td>


                                        <td>

                                            <div class="container">
                                                <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                    <i class="material-icons hide-on-med-and-up">settings</i>
                                                    <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                    <i class="material-icons right">arrow_drop_down</i>
                                                </a>
                                                <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                                    <li><a class="grey-text text-darken-2" href="{{ URL::Route('userCompliantEditPage',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                    {{--<li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('deleteCompany',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>--}}

                                                <!--<li><a class="grey-text text-darken-2" href="{{ URL::Route('adminUserPrivilegesEdit',$value->admin_id) }}">{{ trans('localization::lang_view.set_privilege')}}</a></li>-->

                                                    <?php


                                                    if ($value->compliant_status == 1)
                                                    {
                                                    ?>
                                                    <li><a onclick="" class="sweet-done" href="{{ URL::Route('taken',$value->id) }}">{{ trans('localization::lang_view.taken')}}</a></li>

                                                    <li><a onclick="" class="sweet-done" href="{{ URL::Route('solved',$value->id) }}">{{ trans('localization::lang_view.solved')}}</a></li>
                                                    <?php
                                                    }
                                                    else if ($value->compliant_status == 2)
                                                    { ?>

                                                    <li><a onclick="" class="sweet-done" href="{{ URL::Route('solved',$value->id) }}">{{ trans('localization::lang_view.solved')}}</a></li>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

        $(document).ready(function()
        {
            $('.carousel').carousel();

            $('.carousel.carousel-slider').carousel({fullWidth: true}).unbind('click');


        });




        $(document).ready(function()
        {
            if($('#sel').val() == 'status')
            {
                $("#a1").attr('disabled','disabled');

                $("#1").hide();

            }
            else
            {
                // $("#a2").attr('disabled','disabled');

                $("#2").hide();



            }



            $("#sel").change(function()
            {
                if($(this).val() == "status")
                {
                    $("#a2").removeAttr('disabled');
                    $("#a1").attr('disabled','disabled');


                    $("#1").hide();
                    $("#2").show();
                }
                else
                {
                    $("#a1").removeAttr('disabled');
                    $("#a2").attr('disabled','disabled');



                    $("#2").hide();
                    $("#1").show();

                }

            });
        });

    </script>

@endsection
