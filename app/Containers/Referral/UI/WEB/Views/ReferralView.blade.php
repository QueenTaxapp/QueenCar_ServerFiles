@extends('layout::Layout')
@section('content')


    <?php
    $colorArray = array('card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text','card gradient-45deg-red-pink gradient-shadow min-height-100 white-text','card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text','card gradient-45deg-green-teal gradient-shadow min-height-100 white-text');
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

    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
                <div class="row">

                    <h5>{{$title}}</h5>

                    <div class="col s12 m6 l4">
                        <div style="min-height: 150px !important;color:#fff;" class="<?php echo "$colorArray[0]"?>;">
                            <div class="padding-4">
                                <div class="col s7 m7 l7">
                                    <i class="material-icons background-round mt-5">local_atm</i>
                                    <p>{{ trans('localization::lang_view.total_earnings')}}</p>
                                </div>
                                <div class="col s5 m5 l5 right-align">
                                    <h5 class="mb-0">{{$payment_array['total_earned']}}</h5>
                                    {{--<p class="no-margin">{{ trans('localization::new_lang_view.new')}}</p>--}}

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l4">
                        <div style="min-height: 150px !important;color:#fff;" class="<?php echo "$colorArray[1]"?>;">
                            <div class="padding-4">
                                <div class="col s7 m7 l7">
                                    <i class="material-icons background-round mt-5">credit_card</i>
                                    <p>{{ trans('localization::lang_view.total_payments')}}</p>
                                </div>
                                <div class="col s5 m5 l5 right-align">
                                    <h5 class="mb-0">{{$payment_array['total_spent']}}</h5>
                                    {{--<p class="no-margin">{{ trans('localization::lang_view.new')}}</p>--}}

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div><br><br>

            <div id="card-stats">
                <div class="row">
                    <div class="col s12 m12 l12">

                        <div class="card" style="overflow: auto">
                            <br>
                        <table id="table" class="bordered ">

                            <thead>
                            <tr>
                                <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                <th data-field="id">{{ trans('localization::lang_view.referral_code')}}</th>
                                <th data-field="id">{{ trans('localization::lang_view.user_name')}}</th>
                                <th data-field="name">{{ trans('localization::lang_view.amount_earned')}}</th>
                                <th data-field="price">{{ trans('localization::lang_view.amount_spent')}}</th>
                                <th data-field="price">{{ trans('localization::lang_view.amount_balance')}}</th>

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
                                <td><?=$value['code'];?></td>
                                <td><?=$value['ufname'].' '.$value['ulname'];?></td>
                                <td><?=$value['amount_earned'];?></td>
                                <td><?=$value['amount_spent'];?></td>
                                <td><?= $value['amount_earned'] - $value['amount_spent'];?></td>

                            </tr>
                            <?php $s_no++; }?>
                            </tbody>
                        </table><br><br><br><br><br>

                        <div class="pagination" align="left" id="paglink">
                            <?php

                            echo $result->appends(array())->links();
                            ?>
                        </div><br><br><br><br><br>

                    </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection