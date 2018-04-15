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


<?php $test="";
if($request->session()->get('filter_type') != ''&& $request->session()->get('filter_value')!= '')
{
    $filterType = $request->session()->get('filter_type');

    $filterValue = $request->session()->get('filter_value');

    $test= trans('localization::errors.the table user filter by phone_number has ').strtoupper($filterValue);

    $test=str_replace('user',trans('localization::lang_view.driver'),$test);

    if($filterType == 'name')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.name')),$test);
    }
    else if($filterType == 'registration_code')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.registration_code')),$test);
    }
    else if($filterType == 'email')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.email')),$test);
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
                                            <form method="get" action="{{ URL::Route('adminDriverView') }}">

                                            <div class="col s3 m1 l1"><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.search')}}</a> : </div>
                                            <div class="col s4 m2 l2">
                                                    <input name="filter_value" style="height: 2rem;" id="search_value" type="text" value="<?php echo (!empty($_GET['filter_value']) ? $_GET['filter_value'] : '');?>" placeholder="{{ trans('localization::lang_view.enter_search_value')}}">
                                            </div>

                                            <div style="margin-top: -1rem;" class="col s5 m2 l2">
                                                <select class="select" name="filter_type">
                                                    <option value="name" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'name') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.driver').' '. trans('localization::lang_view.name')}}</option>
                                                    <option value="registration_code" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'registration_code') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.driver').' '. trans('localization::lang_view.registration_code')}}</option>
                                                    <option value="email" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'email') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.driver').' '. trans('localization::lang_view.email')}}</option>
                                                    <option value="phone" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'phone') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.driver').' '. trans('localization::lang_view.phone_number')}}</option>
                                                </select>
                                            </div>
                                            <div class="col s4 m2 l2">
                                                <button class="btn search-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                            <div class="col s5 m3 l3">
                                                <button class="btn download-btn cyan waves-effect waves-light right" type="submit" name="submit" value="Download_Report">{{trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}
                                                    <!--<i class="material-icons right">send</i>-->
                                                </button>
                                            </div>
                                            <div style="float: right" class="col s3 m2 l2 right-align">
                                                <a href="{{ URL::Route('adminDriverAdd') }}" class="add-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_driver')}}" >
                                                    <i class="material-icons left">add</i>{{ trans('localization::lang_view.add')}}
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
                                                <th data-field="id">{{ trans('localization::lang_view.name')}}</th>
                                                <th data-field="name">{{ trans('localization::lang_view.registration_code')}}</th>
                                                <th data-field="name">{{ trans('localization::lang_view.email')}}</th>
                                                <th data-field="price">{{ trans('localization::lang_view.phone_number')}}</th>
                                                <th data-field="price">{{ trans('localization::lang_view.status')}}</th>
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
                                                <td><?=$value['firstname'].' '.$value['lastname'];?></td>
                                                <td><?=$value['registration_code'];?></td>
                                                <td><?=$value['email'];?></td>
                                                <td><?=$value['phone_number'];?></td>

                                                <td><?php if($value->is_approve==1)
                                                    {
                                                    ?>
                                                    <span class="status-green"><?php echo trans('localization::lang_view.approved');?></span>
                                                    <?php
                                                    }elseif($value->is_approve==0)
                                                    {
                                                    ?>
                                                    <span class="status-red"><?php echo trans('localization::lang_view.declined');?></span>
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
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminDriverEdit',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('adminDriverDelete',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>


                                                            <li><a class="<?php if($value->is_approve==0){echo "sweet-approve";}else{echo "sweet-decline";} ?> grey-text text-darken-2" href="{{ URL::Route('adminDriverApprove',$value->id) }}">
                                                                    <?php if ($value->is_approve == 0) { ?>
                                                                        {{ trans('localization::lang_view.approve')}}
                                                                    <?php } else { ?>
                                                                        {{ trans('localization::lang_view.decline')}}
                                                                    <?php } ?>
                                                                </a>
                                                            </li>

                                                            <?php if($value->account_present == 1){ ?>

                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('adminDriverDeleteAccount',$value->id) }}">{{ trans('localization::lang_view.delete_account')}}</a></li>

                                                           <?php  }else{ ?>
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminDriverAddAccount',$value->id) }}">{{ trans('localization::lang_view.add_account')}}</a></li>
                                                            <?php  }

                                                            $array = array('id'=>$value->id,'days'=> 3);
                                                            ?>

                                                            <li><a class="grey-text text-darken-2" href="{{ URL("admin/driver/income/$value->id/null") }}">{{ trans('localization::lang_view.income')}}</a></li>

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