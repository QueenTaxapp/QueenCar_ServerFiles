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
if($request->session()->get('filter_type') != ''&&($request->session()->get('filter_value')!= '' || $request->session()->get('filter_value_select')!= ''))
{
    $filterType = $request->session()->get('filter_type');

    $filterValue = $request->session()->get('filter_value');

    if($filterType=="type"){
        $filterValue = $request->session()->get('filter_value_select');
        if($filterValue==0){
            $filterValue=trans('localization::lang_view.fixed');
        }else{
            $filterValue=trans('localization::lang_view.percentage');
        }
    }

    $test= trans('localization::errors.the table user filter by phone_number has ').strtoupper($filterValue);

    $test=str_replace('user',trans('localization::lang_view.promo_code'),$test);

    if($filterType == 'coupon_name')
    {

        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.coupon_code')),$test);
        //die( $test=str_replace('phone_number',trans('localization::lang_view.name'),$test));
    }
    else if($filterType == 'type')
    {
        $test=str_replace('phone_number',strtoupper(trans('localization::lang_view.type')),$test);
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
                                    <div class="col s12">

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
                                            <form method="get" action="{{ URL::Route('adminPromoView') }}">

                                                <div class="col s3 m2 l1"><a class="tooltipped" onclick="help('menu','tab')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.search')}}</a> : </div>

                                                <div id="promo_text" class="col s4 m2 l2">
                                                    <input required name="filter_value" style="height: 2rem;" id="promo_search_text" type="text" value="<?php echo (!empty($_GET['filter_value']) ? $_GET['filter_value'] : '');?>" placeholder="{{ trans('localization::lang_view.enter_search_value')}}">
                                                </div>
                                                <div id="promo_select" style="margin-top: -1rem;" class="col s4 m2 l2">
                                                    <select id="promo_search_select" class="select" name="filter_value_select">
                                                        <option value="0" <?php
                                                                if (isset($_GET['filter_value_select']) && $_GET['filter_value_select'] == 0) {
                                                                    echo 'selected="selected"';
                                                                } ?> >fixed</option>
                                                        <option value="1"<?php
                                                                if (isset($_GET['filter_value_select']) && $_GET['filter_value_select'] == 1) {
                                                                    echo 'selected="selected"';
                                                                } ?> >percentage</option>
                                                    </select>
                                                </div>
                                                <div style="margin-top: -1rem;" class="col s5 m2 l2">
                                                    <select class="select" name="filter_type" id="promo_type">
                                                        <option value="coupon_name" <?php
                                                                if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'coupon_name') {
                                                                    echo 'selected="selected"';
                                                                } ?> >{{ trans('localization::lang_view.promo').' '. trans('localization::lang_view.name')}}</option>
                                                        <option value="type" <?php
                                                                if (isset($_GET['filter_type']) && $_GET['filter_type'] == 'type') {
                                                                    echo 'selected="selected"';
                                                                } ?> >{{ trans('localization::lang_view.promo').' '. trans('localization::lang_view.type')}}</option>

                                                    </select>
                                                </div>
                                                <div class="col s4 m2">
                                                    <button class="btn search-btn cyan waves-effect waves-light" type="submit" name="action">{{ trans('localization::lang_view.search')}}
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                                <div style="float: right" class="col s2 m2 right-align">
                                                    <a href="{{ URL::Route('adminPromoAdd') }}" class="add-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_promo_code')}}" >
                                                        <i class="material-icons left">add</i>{{ trans('localization::lang_view.add')}}
                                                    </a>
                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                    <div class="col s12 m12 l12">

                                        <div class="card" style="overflow: auto"><br>
                                        <table id="table" class="bordered ">
                                            <thead>
                                            <tr>
                                                <th>{{ trans('localization::lang_view.s.no')}}</th>
                                                <th>{{ trans('localization::lang_view.coupon_code')}}</th>
                                                <th>{{ trans('localization::lang_view.value')}}</th>
                                                <th>{{ trans('localization::lang_view.type')}}</th>
                                                <th>{{ trans('localization::lang_view.uses')}}</th>
                                                <th>{{ trans('localization::lang_view.status')}}</th>
                                                <th>{{ trans('localization::lang_view.start_date')}}</th>
                                                <th>{{ trans('localization::lang_view.expiry_date')}}</th>
                                                <th><a class="tooltipped" onclick="help('menu1','tab1')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(count($promo)==0){?>
                                                    <td class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</td>
                                             <?php   }
                                            $s_no=1;
                                            foreach ($promo as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>
                                                <td><?=$value->coupon_code;?></td>
                                                <td><?=$value->value;?></td>
                                                <td><?php if($value->type == 0){echo trans('localization::lang_view.fixed');}else{echo trans('localization::lang_view.percentage');}?></td>
                                                <td><?=$value->uses;?></td>
                                                <td><?php if($value->state==1)
                                                    {
                                                    ?>
                                                    <span class="status-green"><?php echo trans('localization::lang_view.active');?></span>
                                                    <?php
                                                    }elseif($value->state==0)
                                                    {
                                                    ?>
                                                    <span class="status-red"><?php echo trans('localization::lang_view.inactive');?></span>
                                                    <?php
                                                    }?></td>
                                                <td><?=$value->start_date;?></td>
                                                <td><?=$value->expiry_date;?></td>

                                                <td>
                                                    <div class="container">
                                                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn gradient-45deg-light-blue-cyan gradient-shadow" data-activates="dropdown<?=$s_no;?>" style="">
                                                            <i class="material-icons hide-on-med-and-up">settings</i>
                                                            <span class="hide-on-small-onl"> {{ trans('localization::lang_view.actions')}}</span>
                                                            <i class="material-icons right">arrow_drop_down</i>
                                                        </a>
                                                        <ul id="dropdown<?=$s_no;?>" class="drop dropdown-content " style="white-space: nowrap; opacity: 1;width: 140px; top: 130px; display: none;">
                                                            <li><a class="grey-text text-darken-2" href="{{ URL::Route('adminPromoEdit',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                            <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('adminPromoDelete',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>


                                                            <li><a onclick="" class="<?php if($value->state==0){echo "sweet-active";}else{echo "sweet-inactive";} ?> grey-text text-darken-2" href="{{ URL::Route('adminPromoActive',$value->id) }}">
                                                                    <?php if ($value->state == 0) { ?>
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

                                            echo $promo->appends(array('filter_type' => $request->session()->get('filter_type'), 'filter_value' => $request->session()->get('filter_value'), 'filter_value_select' => $request->session()->get('filter_value_select')))->links();
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function()
    {
        if($('#promo_type').val() == 'type')
        {
            $("#promo_search_text").attr('disabled',true);

            $("#promo_text").hide();

        }
        else
        {
            //$("#promo_search_select").attr('disabled',true);

            $("#promo_select").hide();

        }

        $("#promo_type").on('change',function()
        {
            $type_value=$('#promo_type').val();

            if($type_value == "type")
            {
                $("#promo_search_select").removeAttr('disabled');
                $("#promo_search_text").attr('disabled',true);

                $("#promo_text").hide();
                $("#promo_select").show();
            }
            else
            {
                $("#promo_search_text").removeAttr('disabled');
                $("#promo_search_select").attr('disabled',true);

                $("#promo_select").hide();
                $("#promo_text").show();

            }

        });
    });

</script>

@endsection