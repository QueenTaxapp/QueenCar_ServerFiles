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

    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

                <div class="row">
                    <h4>{{ trans('localization::lang_view.user_wallet')}}
                        <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminUserView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_user_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                    </h4>
                   <?php if(count($wallet)==0){?>
                    <div style="text-align: center" class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</div>
                    <?php }else {?>
                    <div class="col s12 m6 l4">
                        <div style="min-height: 150px !important;" class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">add_box</i>
                                    <p>{{ trans('localization::lang_view.amount_added')}}</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0"><?=$wallet->amount_earned?></h5>
                                    <p class="no-margin"></p>

                                </div>
                            </div>
                        </div>
                     </div>
                    <div class="col s12 m6 l4">
                        <div style="min-height: 150px !important;" class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">account_balance_wallet</i>
                                    <p>{{ trans('localization::lang_view.amount_balance')}}</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0"><?=$wallet->amount_balance?></h5>
                                    <p class="no-margin"></p>

                                </div>
                            </div>
                        </div>
                     </div>
                    <div class="col s12 m6 l4">
                        <div style="min-height: 150px !important;" class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">monetization_on</i>
                                    <p>{{ trans('localization::lang_view.amount_spent')}}</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0"><?=$wallet->amount_spent?></h5>
                                    <p class="no-margin"></p>

                                </div>
                            </div>
                        </div>
                     </div>
<?php }?>
                    </div>
                <br>
                <h4>{{ trans('localization::lang_view.transaction_history')}}
                    <div style="float: right" class="col s6 m2 l2 right-align">
                        <a href="{{ URL::Route('adminUserWalletSpent',$request->id) }}" class="wallet-spent-btn waves-effect waves-light btn tooltipped" data-position="top" data-delay="50" data-tooltip="{{trans('localization::lang_view.spent_history')}}" >
                            {{ trans('localization::lang_view.spent_history')}}
                        </a>
                    </div>
                </h4>
                <br>
                <hr>
                <div class="row">
                    <div class="col s12 m12 l12">

                        <div class="card" style="overflow: auto"><br>

                        <table  class="bordered ">


                            <thead>
                            <tr>
                                <th data-field="id">{{ trans('localization::lang_view.s.no')}}</th>
                                <th data-field="id">{{ trans('localization::lang_view.transaction_id')}}</th>
                                <th data-field="name">{{ trans('localization::lang_view.amount')}}</th>
                                <th data-field="name">{{ trans('localization::lang_view.transaction_date')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(count($wallet_history)==0){?>
                            <td class="no-result" colspan="11">{{ trans('localization::lang_view.no_result_found')}}</td>
                            <?php   }
                            $s_no=1;
                            foreach ($wallet_history as $key=>$value){?>
                            <tr>
                                <td><?php echo $s_no+($request->input('page',1)==1?0:($request->input('page',1)-1)*App\Containers\Common\GetConfigs::getConfigs('paginate'));?></td>

                                <td><?=$value['transact_id'];?></td>
                                <td><?=$value['amount'];?></td>
                                <td>
                                    <?php
                                    $dates = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value['created_at'])->timezone(App\Containers\Common\GetConfigs::getConfigs('time_zone'))->toDateTimeString();
                                    $dates=date_create($dates);
                                    $date=date_format($dates,"Y-m-d h:i A");
                                      echo $date;
                                   ?></td>
                            </tr>
                            <?php $s_no++; }?>
                            </tbody>
                        </table><br><br><br><br><br>

                        <div class="pagination" align="left" id="paglink">
                            <?php

                            echo $wallet_history->appends(array())->links();
                            ?>
                        </div><br><br><br><br><br>

                    </div>
                    </div>

                </div>


            </div>
    </section>

@endsection