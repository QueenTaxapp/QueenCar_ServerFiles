@extends('layout::Layout')
@section('content')


    <?php
//                echo "<pre>";
//                print_r($value);die();

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
                    <h4 class="header">{{$title}}
                        <span class="back-button" style="float: right; font-size: 24px;"><a class="tooltipped" href="{{  URL::Route('userCompliantView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_view_user_complaints')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                    </h4>
                </div>

                <div class="col s12 m12 l12">
                    <div id="bordered-table">

                        <div class="col s12 m12 l12">
                            <a class="btn add-btn cyan waves-effect waves-light" style="float: right;" href="{{ URL::Route('addCompliant') }}">{{ trans('localization::lang_view.add_compliants')}} <i class="material-icons right"> library_add </i></a>
                        </div>

                        <div class="col s12 m12 l12">
                            <div class="card" style="overflow: auto">
                                <br>
                            <table id="table" class="bordered ">

                                <thead>
                                <tr>
                                    <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                    <th data-field="id">{{ trans('localization::lang_view.compliants_title')}}</th>
                                    <th data-field="id">{{ trans('localization::lang_view.type')}}</th>
                                    <th data-field="name">{{ trans('localization::lang_view.status')}}</th>
                                    <th data-field="price"><a class="tooltipped" onclick="help('menu1','tab1')" data-position="top" data-delay="50" data-tooltip="{{trans('localization::errors.click_me_help')}}" >{{ trans('localization::lang_view.actions')}}</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(count($value)==0){?>
                                <td class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</td>
                                <?php   }
                                $s_no=1;
                                        $values = $value;
                                foreach ($values as $key=>$value){?>
                                <tr>

                                    <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>

                                    <td><?=$value['title'];?></td>
                                    <?php
                                    if($value['type'] == 1)
                                    {
                                        $type = trans('localization::lang_view.user');
                                    ?>
                                    <td>

                                        <span class="status-user">{{ $type }}</span>

                                    </td>

                                    <?php
                                    }
                                    else
                                    {
                                        $type = trans('localization::lang_view.driver');

                                    ?>
                                    <td>

                                        <span class="status-driver">{{ $type }}</span>

                                    </td>
                                    <?php
                                    }

                                    ?>




                                    <td><?php if($value->status==1)
                                        {
                                        ?>
                                        <span class="status-green"><?php echo trans('localization::lang_view.approved');?></span>
                                        <?php
                                        }elseif($value->status==0)
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
                                                <li><a class="grey-text text-darken-2" href="{{ URL::Route('editCompliant',$value->id) }}">{{ trans('localization::lang_view.edit')}}</a></li>

                                                <li><a class="sweet-delete grey-text text-darken-2" href="{{ URL::Route('deleteCompliant',$value->id) }}">{{ trans('localization::lang_view.delete')}}</a></li>

                                                <?php if ($value->status == 0) {
                                                ?>
                                                <li><a class= "sweet-approve grey-text text-darken-2" href="{{ URL::Route('acceptCompliant',$value->id) }}">

                                                {{ trans('localization::lang_view.approve')}}
                                                <?php
                                                } else {


                                                ?>
                                                <li><a class= "sweet-decline grey-text text-darken-2" href="{{ URL::Route('declineCompliant',$value->id) }}">

                                                        {{ trans('localization::lang_view.decline')}}
                                                        <?php } ?>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                <?php $s_no++; }?>
                                </tbody>
                            </table><br><br><br><br><br>

                            <div class="pagination" align="left" id="paglink">
                                <?php

                                echo $values->appends(array('filter_type' => $request->session()->get('filter_type'), 'filter_value' => $request->session()->get('filter_value')))->links();
                                ?>
                            </div><br><br><br><br><br>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end container-->
        
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var window_size = $(window).width();

            $(window).resize(function() {

                window_size = $(window).width();
                WidthChange();
            });


            if($(window).width() <=480){

                var width = document.getElementById("table").offsetWidth;

                $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

            }

        });

        function WidthChange(){

            if($(window).width() <=480){

                var width = document.getElementById("table").offsetWidth;

                $("<style/>", {text: ".drop {left: "+(width-140)+"px !important;}"}).appendTo('head');

            }

        }

    </script>

@endsection