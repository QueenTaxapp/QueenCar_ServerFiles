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

    // echo "<pre>";
    // print_r($result);
    // die();

$test="";
if($request->session()->get('filter_type') != '' && $request->session()->get('filter_value')!= '')
{
    $filterType = $request->session()->get('filter_type');

    $filterValue = $request->session()->get('filter_value');

    $test= trans('localization::errors.the table user filter by phone_number has value');//.strtoupper($filterValue);

    $test=str_replace('user',trans('localization::lang_view.company'),$test);

    if($filterType == 'status')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.'.$filterType)),$test);

        if($filterValue == 0)
        {
            $test=str_replace('value',trans('localization::lang_view.active'),$test);

        }
        else
        {
            $test=str_replace('value',strtoupper(trans('localization::lang_view.in_active')),$test);

        }
    }
    else if($filterType == 'company_name')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.company_name')),$test);
        $test=str_replace('value',strtoupper($filterValue),$test);

    }
    else if($filterType == 'name')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.name')),$test);
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
                                            <form method="get" action="{{ URL::Route('companyView') }}">

                                            <div class="col s3 m1 l1"><a  onclick="help('menu','tab')">{{ trans('localization::lang_view.search')}}</a> : </div>
                                            <div id = "1" class="col s5 m2 l2">
                                                    <input name="filter_value1" style="height: 2rem;" id="a1" type="text" value="<?php echo (!empty($_GET['filter_value1']) ? $_GET['filter_value1'] : '');?>" placeholder="{{ trans('localization::lang_view.enter_search_value')}}">

                                            </div>
                                            <div id = "2" style="margin-top: -1rem;" class="col s5 m2 l2">

                                                    <select id="a2" class="select" name="filter_value2">

                                                            <option value="0" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == '0') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.active') }}</option>
                                                            <option value="1" <?php if(isset($_GET['filter_value2']) && $_GET['filter_value2'] == '1') { echo 'selected="selected"';} ?> > {{trans('localization::lang_view.in_active') }}</option>


                                                    </select>
                                            </div>

                                            <div style="margin-top: -1rem;" class="col s4 m2">

                                             <select id = "sel" class="select" name="filter_type">


                                                 <option value="company_name" <?php
                                                         if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'company_name') {
                                                             echo 'selected="selected"';
                                                         } ?> >{{ trans('localization::lang_view.company').' '. trans('localization::lang_view.name')}}

                                                 </option>

                                                 <option value="name" <?php
                                                         if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'name') {
                                                             echo 'selected="selected"';
                                                         } ?> >{{trans('localization::lang_view.name')}}
                                                 </option>
                                                   <option value="status" <?php
                                                            if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'status') {
                                                                echo 'selected="selected"';
                                                            } ?> >{{ trans('localization::lang_view.status')}}
                                                    </option>


                                                </select>
                                            </div>
                                            <div class="col s4 m2">
                                                <button class="btn search-btn cyan waves-effect waves-light" type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                    <i class="material-icons right">send</i>
                                                </button>

                                                <!--<button type="submit" id="btnsearch" name="submit" class="btn btn-flat btn-block btn-success" value="Download_Report">{{ trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}</button>-->
                                            </div>
                                            <div class="col s4 m3">
                                                <button class="btn download-btn cyan waves-effect waves-light" type="submit" name="submit" value="Download_Report">{{trans('localization::lang_view.download').' '.trans('localization::lang_view.report') }}
                                                    <!--<i class="material-icons right">send</i>-->
                                                </button>
                                            </div>
                                            <div style="float: right" class="col s3 m2 right-align">
                                                <a href="{{ URL::Route('addCompanyPage') }}" class="add-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_company')}}" >
                                                    <i class="material-icons left">add</i>{{ trans('localization::lang_view.add')}}
                                                </a>
                                            </div>

                                            </form>

                                        </div>
                                        <div class="divider"></div><br>
                                    </div>



                                    <div class="col s12">

                                        <div class="card" style="overflow: auto"><br>

                                        <table id="table" class="bordered ">

                                            <thead>
                                            <tr>
                                                <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                                <th data-field="company_name">{{ trans('localization::lang_view.company_name')}}</th>
                                                <th data-field="company_name">{{ trans('localization::lang_view.name')}}</th>
                                                <th data-field="price">{{ trans('localization::lang_view.status')}}</th>
                                                <th data-field="price">{{ trans('localization::lang_view.blocked/unblocked')}}</th>

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
                                                <td><?=$value['company_name'];?></td>
                                                <td><?=$value['name'];?></td>


                                                <td><?php if($value->status == 0)
                                                    {
                                                    ?>
                                                    <span class="status-green"><?php echo trans('localization::lang_view.active');?></span>
                                                    <?php
                                                    }
                                                    elseif($value->status == 1)
                                                    {
                                                    ?>
                                                    <span class="status-red"><?php echo trans('localization::lang_view.inactive');?></span>

                                                    <?php
                                                    }

                                                    ?>
                                                </td>

                                                <td>

                                                    <?php
                                                    if($value->block == 1)
                                                    {
                                                    ?>

                                                    <span class="status-green"><?php echo trans('localization::lang_view.unblock');?></span>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <span class="status-red"><?php echo trans('localization::lang_view.blocked');?></span>

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
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('editCompany',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('deleteCompany',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>

                                                            <!--<li><a class="grey-text text-darken-2" href="{{ URL::Route('adminUserPrivilegesEdit',$value->admin_id) }}">{{ trans('localization::lang_view.set_privilege')}}</a></li>-->

                                                            <?php

                                                            $path = asset('admin/company/status/toogle/'.$value->id.'/'.$value->status);
                                                            if ($value->status == 1)
                                                            {

                                                        //   {{ url('sig/edit/ ' . $value->id . '/' . $value->ticketid }}
                                                            ?>
                                                            <li><a onclick="" class="sweet-active grey-text text-darken-2" href="{{ URL($path) }}">{{ trans('localization::lang_view.active')}}</a></li>
                                                            <?php
                                                            }
                                                             else
                                                             { ?>
                                                            <li><a class="sweet-inactive grey-text text-darken-2" href="{{ URL($path) }}">{{ trans('localization::lang_view.inactive')}} </a></li>
                                                            <?php
                                                            }
                                                            if($value->block == 0)
                                                            {
                                                                $path = asset('admin/company/block/toogle/'.$value->id.'/'.$value->block);

                                                            ?>
                                                            <li><a onclick="" class="sweet-active grey-text text-darken-2" href="{{ URL($path) }}">{{ trans('localization::lang_view.unblock')}}</a></li>
                                                            <?php
                                                            }

                                                            ?>
                                                            <?php if($value->account_present == 1){ ?>
                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('adminCompanyDeleteAccount',$value->id) }}">{{ trans('localization::lang_view.delete_account')}}</a></li>
                                                            <?php  }else{ ?>
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminCompanyAddAccount',$value->id) }}">{{ trans('localization::lang_view.add_account')}}</a></li>
                                                            <?php  } ?>
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


        if($(window).width() <=640){

            var width = document.getElementById("table").offsetWidth;

            $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

        }

    });

    function WidthChange(){

        if($(window).width() <=640){

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
