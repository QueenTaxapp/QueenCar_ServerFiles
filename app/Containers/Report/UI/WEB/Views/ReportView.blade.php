@extends('layout::Layout')
@section('content')




    <style>
        sup{
            color:red;
            font-size: 12px;
            left: 2px;

        }
    </style>



    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">

                    <h4 class="header">{{ $title }}</h4>


                        <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">


                            <li id="financial_report" class="">

                                <div class="collapsible-header active">

                                    <h6><b>{{ trans('localization::lang_view.financial_reports')}}</b></h6>
                                </div>

                                <div class="collapsible-body" style="overflow: auto;display: none;">

                                    <div class="table-bordered">

                                        <form onsubmit="return FormValidate('date_option-financial','start-date-financial','end-date-financial');" action="{{ URL::Route('adminReportDownload')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="row">

                                            <div class="col s12 m4 l4">
                                                <select name="date_option" id="date_option-financial" class="input-field date_option" required>
                                                    <option value=""> {{trans('localization::lang_view.select')}}</option>
                                                    <option value="date_select">{{ trans('localization::lang_view.date') }}</option>
                                                    <option value="today">{{ trans('localization::lang_view.today') }}</option>
                                                    <option value="yesterday">{{ trans('localization::lang_view.yesterday') }}</option>
                                                    <option value="current_week">{{ trans('localization::lang_view.current_week') }}</option>
                                                    <option value="last_week">{{ trans('localization::lang_view.last_week') }}</option>
                                                    <option value="current_month">{{ trans('localization::lang_view.current_month') }}</option>
                                                    <option value="previous_month">{{ trans('localization::lang_view.previous_month') }}</option>
                                                    <option value="current_year">{{ trans('localization::lang_view.current_year') }}</option>
                                                    <option value="last_year">{{ trans('localization::lang_view.last_year') }}</option>
                                                </select>
                                                <label for="start-date">{{ trans('localization::lang_view.start_date')}}</label>
                                            </div>

                                            <div class="col s12 m4 l4 input-field">
                                                <input type="text" class="datepicker"
                                                       id="start-date-financial" name="start_date"
                                                       placeholder="{{ trans('localization::lang_view.start').' '.trans('localization::lang_view.date') }}"
                                                       value="{{--{{ Input::get('start_date') }}--}}">

                                            </div>

                                            <div class="col s12 m4 l4 input-field">
                                                <input type="text" class="datepicker"
                                                       id="end-date-financial" name="end_date"
                                                       placeholder="{{ trans('localization::lang_view.end').' '.trans('localization::lang_view.date') }}"
                                                       value="{{--{{ Input::get('end_date') }}--}}" />
                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="input-field col s12 m12 l12">
                                                <select name="company" id="company" >
                                                    <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                    <option value="0">{{ trans('localization::lang_view.individual')}}</option>
                                                    <?php foreach($company as $key=>$value){?>

                                                    <option value="<?=$value->id?>"  ><?=$value->company_name?></option>

                                                    <?php }?>
                                                </select>
                                                <label for="company">{{ trans('localization::lang_view.company')}}</label>
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="input-field col s12 m6 l6">

                                                <select name="trip_status" id="status" class="">
                                                    <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                    <option value="1">{{ trans('localization::lang_view.completed') }}</option>
                                                    <option value="2">{{ trans('localization::lang_view.cancelled') }}</option>
                                                </select>
                                                <label for="status">{{ trans('localization::lang_view.status')}}</label>
                                            </div>

                                            <div class="input-field col s12 m6 l6">

                                                <select name="payment" id="payment" class="">
                                                    <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                    <option value="0">{{ trans('localization::lang_view.card') }}</option>
                                                    <option value="1">{{ trans('localization::lang_view.cash') }}</option>
                                                    <option value="2">{{ trans('localization::lang_view.wallet') }}</option>
                                                </select>
                                                <label for="payment">{{ trans('localization::lang_view.payment_method')}}</label>
                                            </div>


                                        </div>

                                        <button type="submit" name="submit" value="financial_report" class="btn save-btn btn-primary right" >{{ trans('localization::lang_view.download')}}</button>
                                        <div class="clearfix"></div>

                                        </form>


                                    </div>

                                </div>
                            </li>


                     {{--       //Business--}}

                            <li id="business_report" class="">

                                <div class="collapsible-header">

                                    <h6><b>{{ trans('localization::lang_view.business_reports')}}</b></h6>
                                </div>

                                <div class="collapsible-body" style="overflow: auto;display: none;">

                                    <div class="table-bordered">

                                        <form onsubmit="return FormValidate('date_option-business','start-date-business','end-date-business');" action="{{ URL::Route('adminReportDownload')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">

                                                <div class="col s12 m4 l4">
                                                    <select name="date_option" id="date_option-business" class="input-field date_option" required>
                                                        <option value=""> {{trans('localization::lang_view.select')}}</option>
                                                        <option value="date_select">{{ trans('localization::lang_view.date') }}</option>
                                                        <option value="today">{{ trans('localization::lang_view.today') }}</option>
                                                        <option value="yesterday">{{ trans('localization::lang_view.yesterday') }}</option>
                                                        <option value="current_week">{{ trans('localization::lang_view.current_week') }}</option>
                                                        <option value="last_week">{{ trans('localization::lang_view.last_week') }}</option>
                                                        <option value="current_month">{{ trans('localization::lang_view.current_month') }}</option>
                                                        <option value="previous_month">{{ trans('localization::lang_view.previous_month') }}</option>
                                                        <option value="current_year">{{ trans('localization::lang_view.current_year') }}</option>
                                                        <option value="last_year">{{ trans('localization::lang_view.last_year') }}</option>
                                                    </select>
                                                    <label for="start-date">{{ trans('localization::lang_view.start_date')}}</label>
                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="start-date datepicker"
                                                           id="start-date-business" name="start_date"
                                                           placeholder="{{ trans('localization::lang_view.start').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('start_date') }}--}}">

                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="end-date datepicker"
                                                           id="end-date-business" name="end_date"
                                                           placeholder="{{ trans('localization::lang_view.end').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('end_date') }}--}}" />
                                                </div>

                                            </div>



                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">
                                                    <select name="company" id="company" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <option value="0">{{ trans('localization::lang_view.individual')}}</option>
                                                        <?php foreach($company as $key=>$value){?>

                                                        <option value="<?=$value->id?>"  ><?=$value->company_name?></option>

                                                        <?php }?>
                                                    </select>
                                                    <label for="company">{{ trans('localization::lang_view.company')}}</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <select name="vehicle" id="vehicle" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <?php foreach($types as $key=>$value){?>

                                                        <option value="<?=$value->id?>"  ><?=$value->name?></option>

                                                        <?php }?>
                                                    </select>
                                                    <label for="vehicle">{{ trans('localization::lang_view.vehicle_type')}}</label>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="trip_status" id="status" class="">
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.completed') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.cancelled') }}</option>
                                                    </select>
                                                    <label for="status">{{ trans('localization::lang_view.status')}}</label>
                                                </div>

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="payment" id="payment" class="">
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="0">{{ trans('localization::lang_view.card') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.cash') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.wallet') }}</option>
                                                    </select>
                                                    <label for="payment">{{ trans('localization::lang_view.payment_method')}}</label>
                                                </div>


                                            </div>

                                            <button type="submit" name="submit" value="business_report" class="btn save-btn btn-primary right" >{{ trans('localization::lang_view.download')}}</button>
                                            <div class="clearfix"></div>

                                        </form>


                                    </div>

                                </div>
                            </li>

                           {{-- //Travel Reports--}}

                            <li id="travel_report" class="">

                                <div class="collapsible-header ">

                                    <h6><b>{{ trans('localization::lang_view.travel_reports')}}</b></h6>
                                </div>

                                <div class="collapsible-body" style="overflow: auto;display: none;">

                                    <div class="table-bordered">

                                        <form onsubmit="return FormValidate('date_option-travel','start-date-travel','end-date-travel');" action="{{ URL::Route('adminReportDownload')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">

                                                <div class="col s12 m4 l4">
                                                    <select name="date_option" id="date_option-travel" class="input-field date_option" required>
                                                        <option value=""> {{trans('localization::lang_view.select')}}</option>
                                                        <option value="date_select">{{ trans('localization::lang_view.date') }}</option>
                                                        <option value="today">{{ trans('localization::lang_view.today') }}</option>
                                                        <option value="yesterday">{{ trans('localization::lang_view.yesterday') }}</option>
                                                        <option value="current_week">{{ trans('localization::lang_view.current_week') }}</option>
                                                        <option value="last_week">{{ trans('localization::lang_view.last_week') }}</option>
                                                        <option value="current_month">{{ trans('localization::lang_view.current_month') }}</option>
                                                        <option value="previous_month">{{ trans('localization::lang_view.previous_month') }}</option>
                                                        <option value="current_year">{{ trans('localization::lang_view.current_year') }}</option>
                                                        <option value="last_year">{{ trans('localization::lang_view.last_year') }}</option>
                                                    </select>
                                                    <label for="start-date">{{ trans('localization::lang_view.start_date')}}</label>
                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="start-date datepicker"
                                                           id="start-date-travel" name="start_date"
                                                           placeholder="{{ trans('localization::lang_view.start').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('start_date') }}--}}">

                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="end-date datepicker"
                                                           id="end-date-travel" name="end_date"
                                                           placeholder="{{ trans('localization::lang_view.end').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('end_date') }}--}}" />
                                                </div>

                                            </div>



                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">
                                                    <select name="vehicle" id="vehicle" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <?php foreach($types as $key=>$value){?>

                                                        <option value="<?=$value->id?>"  ><?=$value->name?></option>

                                                        <?php }?>
                                                    </select>
                                                    <label for="vehicle">{{ trans('localization::lang_view.vehicle_type')}}</label>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <select name="rating" id="rating" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <?php for($i=1;$i<=5;$i++){?>

                                                        <option value="<?=$i;?>"  ><?=$i;?></option>

                                                        <?php }?>
                                                    </select>
                                                    <label for="rating">{{ trans('localization::lang_view.rating')}}</label>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="trip_status" id="status" class="">
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.completed') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.cancelled') }}</option>
                                                    </select>
                                                    <label for="status">{{ trans('localization::lang_view.status')}}</label>
                                                </div>

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="payment" id="payment" class="">
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="0">{{ trans('localization::lang_view.card') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.cash') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.wallet') }}</option>
                                                    </select>
                                                    <label for="payment">{{ trans('localization::lang_view.payment_method')}}</label>
                                                </div>


                                            </div>

                                            <button type="submit" name="submit" value="travel_report" class="btn save-btn btn-primary right" >{{ trans('localization::lang_view.download')}}</button>
                                            <div class="clearfix"></div>

                                        </form>


                                    </div>

                                </div>
                            </li>


                           {{-- //provider_payment_report--}}

                            <li id="provider_payment_report" class="">

                                <div class="collapsible-header ">

                                    <h6><b>{{ trans('localization::lang_view.provider_payment_reports')}}</b></h6>
                                </div>

                                <div class="collapsible-body" style="overflow: auto;display: none;">

                                    <div class="table-bordered">

                                        <form onsubmit="return FormValidate('date_option-provider_payment','start-date-provider_payment','end-date-provider_payment');" action="{{ URL::Route('adminReportDownload')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">

                                                <div class="col s12 m4 l4">
                                                    <select name="date_option" id="date_option-provider_payment" class="input-field date_option" required>
                                                        <option value=""> {{trans('localization::lang_view.select')}}</option>
                                                        <option value="date_select">{{ trans('localization::lang_view.date') }}</option>
                                                        <option value="today">{{ trans('localization::lang_view.today') }}</option>
                                                        <option value="yesterday">{{ trans('localization::lang_view.yesterday') }}</option>
                                                        <option value="current_week">{{ trans('localization::lang_view.current_week') }}</option>
                                                        <option value="last_week">{{ trans('localization::lang_view.last_week') }}</option>
                                                        <option value="current_month">{{ trans('localization::lang_view.current_month') }}</option>
                                                        <option value="previous_month">{{ trans('localization::lang_view.previous_month') }}</option>
                                                        <option value="current_year">{{ trans('localization::lang_view.current_year') }}</option>
                                                        <option value="last_year">{{ trans('localization::lang_view.last_year') }}</option>
                                                    </select>
                                                    <label for="start-date">{{ trans('localization::lang_view.start_date')}}</label>
                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="start-date datepicker"
                                                           id="start-date-provider_payment" name="start_date"
                                                           placeholder="{{ trans('localization::lang_view.start').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('start_date') }}--}}">

                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="end-date datepicker"
                                                           id="end-date-provider_payment" name="end_date"
                                                           placeholder="{{ trans('localization::lang_view.end').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('end_date') }}--}}" />
                                                </div>

                                            </div>



                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">
                                                    <select name="company_paid" id="company_paid" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <option value="1">{{ trans('localization::lang_view.settle')}}</option>
                                                        <option value="2">{{ trans('localization::lang_view.un_settle')}}</option>
                                                    </select>
                                                    <label for="company_paid">{{ trans('localization::lang_view.payment_status')}}</label>
                                                </div>

                                            </div>
                                            

                                            <button type="submit" name="submit" value="provider_payment_report" class="btn save-btn btn-primary right" >{{ trans('localization::lang_view.download')}}</button>
                                            <div class="clearfix"></div>

                                        </form>


                                    </div>

                                </div>
                            </li>



                            <li class="">

                                <div class="collapsible-header ">

                                    <h6><b>{{ trans('localization::lang_view.rating_reports')}}</b></h6>
                                </div>

                                <div class="collapsible-body" style="overflow: auto;display: none;">

                                    <div class="table-bordered">

                                        <form onsubmit="return FormValidate('date_option-rating','start-date-rating','end-date-rating');" action="{{ URL::Route('driverRatingReportDownload')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">

                                                <div class="col s12 m4 l4">
                                                    <select name="date_option" id="date_option-rating" class="input-field date_option" required>
                                                        <option value=""> {{trans('localization::lang_view.select')}}</option>
                                                        <option value="date_select">{{ trans('localization::lang_view.date') }}</option>
                                                        <option value="today">{{ trans('localization::lang_view.today') }}</option>
                                                        <option value="yesterday">{{ trans('localization::lang_view.yesterday') }}</option>
                                                        <option value="current_week">{{ trans('localization::lang_view.current_week') }}</option>
                                                        <option value="last_week">{{ trans('localization::lang_view.last_week') }}</option>
                                                        <option value="current_month">{{ trans('localization::lang_view.current_month') }}</option>
                                                        <option value="previous_month">{{ trans('localization::lang_view.previous_month') }}</option>
                                                        <option value="current_year">{{ trans('localization::lang_view.current_year') }}</option>
                                                        <option value="last_year">{{ trans('localization::lang_view.last_year') }}</option>
                                                    </select>
                                                    <label for="start-date">{{ trans('localization::lang_view.start_date')}}</label>
                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="datepicker"
                                                           id="start-date-rating" name="start_date"
                                                           placeholder="{{ trans('localization::lang_view.start').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('start_date') }}--}}">

                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="datepicker"
                                                           id="end-date-rating" name="end_date"
                                                           placeholder="{{ trans('localization::lang_view.end').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('end_date') }}--}}" />
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="who" id="status" class="" required>
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.user') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.driver') }}</option>
                                                    </select>
                                                    <label for="status">{{ trans('localization::lang_view.who')}}</label>
                                                </div>

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="company" id="company" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <option value="0">{{ trans('localization::lang_view.individual')}}</option>
                                                        <?php foreach($company as $key=>$value){?>

                                                        <option value="<?=$value->id?>"  ><?=$value->company_name?></option>

                                                        <?php }?>
                                                    </select>
                                                    <label for="company">{{ trans('localization::lang_view.company')}}</label>
                                                </div>


                                            </div>

                                            <button type="submit" name="submit" value="rating_report" class="btn save-btn btn-primary right" >{{ trans('localization::lang_view.download')}}</button>
                                            <div class="clearfix"></div>

                                        </form>


                                    </div>

                                </div>
                            </li>

                            <li class="">

                                <div class="collapsible-header">

                                    <h6><b>{{ trans('localization::lang_view.ledger_reports')}}</b></h6>
                                </div>

                                <div class="collapsible-body" style="overflow: auto;display: none;">

                                    <div class="table-bordered">

                                        <form onsubmit="return FormValidate('date_option-ledger','start-date-ledger','end-date-ledger');" action="{{ URL::Route('ledgerReportDownload')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">

                                                <div class="col s12 m4 l4">
                                                    <select name="date_option" id="date_option-ledger" class="input-field date_option" required>
                                                        <option value=""> {{trans('localization::lang_view.select')}}</option>
                                                        <option value="date_select">{{ trans('localization::lang_view.date') }}</option>
                                                        <option value="today">{{ trans('localization::lang_view.today') }}</option>
                                                        <option value="yesterday">{{ trans('localization::lang_view.yesterday') }}</option>
                                                        <option value="current_week">{{ trans('localization::lang_view.current_week') }}</option>
                                                        <option value="last_week">{{ trans('localization::lang_view.last_week') }}</option>
                                                        <option value="current_month">{{ trans('localization::lang_view.current_month') }}</option>
                                                        <option value="previous_month">{{ trans('localization::lang_view.previous_month') }}</option>
                                                        <option value="current_year">{{ trans('localization::lang_view.current_year') }}</option>
                                                        <option value="last_year">{{ trans('localization::lang_view.last_year') }}</option>
                                                    </select>
                                                    <label for="start-date">{{ trans('localization::lang_view.start_date')}}</label>
                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="datepicker"
                                                           id="start-date-ledger" name="start_date"
                                                           placeholder="{{ trans('localization::lang_view.start').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('start_date') }}--}}">

                                                </div>

                                                <div class="col s12 m4 l4 input-field">
                                                    <input type="text" class="datepicker"
                                                           id="end-date-ledger" name="end_date"
                                                           placeholder="{{ trans('localization::lang_view.end').' '.trans('localization::lang_view.date') }}"
                                                           value="{{--{{ Input::get('end_date') }}--}}" />
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="input-field col s12 m12 l12">

                                                    <select name="company" id="company" >
                                                        <option value="">{{ trans('localization::lang_view.select')}}</option>
                                                        <option value="0">{{ trans('localization::lang_view.individual')}}</option>
                                                        <?php foreach($company as $key=>$value){?>

                                                        <option value="<?=$value->id?>"  ><?=$value->company_name?></option>

                                                        <?php }?>
                                                    </select>
                                                    <label for="company">{{ trans('localization::lang_view.company')}}</label>
                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="trip_status" id="status" class="">
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.completed') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.cancelled') }}</option>
                                                    </select>
                                                    <label for="status">{{ trans('localization::lang_view.status')}}</label>
                                                </div>

                                                <div class="input-field col s12 m6 l6">

                                                    <select name="payment" id="payment" class="">
                                                        <option value="">{{ trans('localization::lang_view.select') }}</option>
                                                        <option value="0">{{ trans('localization::lang_view.card') }}</option>
                                                        <option value="1">{{ trans('localization::lang_view.cash') }}</option>
                                                        <option value="2">{{ trans('localization::lang_view.wallet') }}</option>
                                                    </select>
                                                    <label for="payment">{{ trans('localization::lang_view.payment_method')}}</label>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12 m6 l6">
                                                    <div class="frmSearch">
                                                        <input type="text" id="search-box" name="user_name" placeholder="{{ trans('localization::lang_view.user_name')}}" />
                                                        <div id="suggesstion-box" ></div>
                                                        <label for="company">{{ trans('localization::lang_view.user')}}</label>

                                                    </div>
                                                </div>
                                                <div class="input-field col s12 m6 l6">
                                                    <div class="frmSearch-driver-name">
                                                        <input type="text" id="search-box-driver-name" name="driver_name" placeholder="{{ trans('localization::lang_view.driver_name')}}" />
                                                        <div id="suggesstion-box-driver-name" ></div>
                                                        <label for="company">{{ trans('localization::lang_view.driver')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" value="ledger_report" class="btn save-btn btn-primary right" >{{ trans('localization::lang_view.download')}}</button>
                                            <div class="clearfix"></div>

                                        </form>


                                    </div>

                                </div>
                            </li>



                        </ul>

                        <input type="hidden" name="admin_type" value="">
                        <br><br><br><br>

                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>

    <script>
        function FormValidate(option,start,end){

            var option_value =  $('#'+option).val();
            var startDate =  $('#'+start).val();
            var startDate =  $('#'+start).val();
            var endDate =  $('#'+end).val();

            if(option_value == 'date_select'){
                if(startDate == ''){
                    Materialize.toast("{{trans('localization::errors.start_date_required')}}", 4000);
                    return false;
                }else if(endDate == ''){
                    Materialize.toast("{{trans('localization::errors.end_date_required')}}", 4000);
                    return false;
                }else{
                    return true;
                }
            }


        }
    </script>
    <script>
        $(document).ready(function () {
            $('#start-date').prop('disabled', true);
            $('#end-date').prop('disabled', true);

            var selected_option = $('#date_option option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date').prop('disabled', false);
                $('#end-date').prop('disabled', false);
                $('#start-date').prop('required', true);
                $('#end-date').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date').pickadate("option", "max", selectedDate);
                }
            });


            $('#start-date').change(function() {


                var endDate =  $('#end-date').val();
                var startDate =  $('#start-date').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date').val('');
                }


            });

            $('#date_option').change(function() {

               // alert("changed");

                var selected_option = $('#date_option option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date').prop('disabled', false);
                    $('#end-date').prop('disabled', false);
                    $('#start-date').prop('required', true);
                    $('#end-date').prop('required', true);

                } else {
                    $('#start-date').val('');
                    $('#end-date').val('');


                    $('#start-date').prop('disabled', true);
                    $('#end-date').prop('disabled', true);

                }

            });

            $('#end-date').change(function() {

                   var endDate =  $('#end-date').val();
                   var startDate =  $('#start-date').val();
                if(startDate > endDate ){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date').val('');
                }


            });

        });




        // provider payment

        $(document).ready(function () {
            $('#start-date-provider_payment').prop('disabled', true);
            $('#end-date-provider_payment').prop('disabled', true);

            var selected_option = $('#date_option-provider_payment option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date-provider_payment').prop('disabled', false);
                $('#end-date-provider_payment').prop('disabled', false);
                $('#start-date-provider_payment').prop('required', true);
                $('#end-date-provider_payment').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date-provider_payment').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date-provider_payment').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date-provider_payment').pickadate("option", "max", selectedDate);
                }
            });

            $('#date_option-provider_payment').change(function() {

                // alert("changed");

                var selected_option = $('#date_option-provider_payment option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date-provider_payment').prop('disabled', false);
                    $('#end-date-provider_payment').prop('disabled', false);
                    $('#start-date-provider_payment').prop('required', true);
                    $('#end-date-provider_payment').prop('required', true);

                } else {
                    $('#start-date-provider_payment').val('');
                    $('#end-date-provider_payment').val('');


                    $('#start-date-provider_payment').prop('disabled', true);
                    $('#end-date-provider_payment').prop('disabled', true);

                }

            });

            $('#end-date-provider_payment').change(function() {


                var endDate =  $('#end-date-provider_payment').val();
                var startDate =  $('#start-date-provider_payment').val();
                if(startDate > endDate ){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date-provider_payment').val('');
                }


            });


            $('#start-date-provider_payment').change(function() {


                var endDate =  $('#end-date-provider_payment').val();
                var startDate =  $('#start-date-provider_payment').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date-provider_payment').val('');
                }


            });

        });


        // provider payment





        // rating

        $(document).ready(function () {
            $('#start-date-rating').prop('disabled', true);
            $('#end-date-rating').prop('disabled', true);

            var selected_option = $('#date_option-rating option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date-rating').prop('disabled', false);
                $('#end-date-rating').prop('disabled', false);
                $('#start-date-rating').prop('required', true);
                $('#end-date-rating').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date-rating').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date-rating').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date-rating').pickadate("option", "max", selectedDate);
                }
            });

            $('#date_option-rating').change(function() {

                // alert("changed");

                var selected_option = $('#date_option-rating option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date-rating').prop('disabled', false);
                    $('#end-date-rating').prop('disabled', false);
                    $('#start-date-rating').prop('required', true);
                    $('#end-date-rating').prop('required', true);

                } else {
                    $('#start-date-rating').val('');
                    $('#end-date-rating').val('');


                    $('#start-date-rating').prop('disabled', true);
                    $('#end-date-rating').prop('disabled', true);

                }

            });

            $('#end-date-rating').change(function() {


                var endDate =  $('#end-date-rating').val();
                var startDate =  $('#start-date-rating').val();
                if(startDate > endDate  ){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date-rating').val('');
                }


            });


            $('#start-date-rating').change(function() {


                var endDate =  $('#end-date-rating').val();
                var startDate =  $('#start-date-rating').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date-rating').val('');
                }


            });

        });


        // rating




        // bussiness

        $(document).ready(function () {
            $('#start-date-business').prop('disabled', true);
            $('#end-date-business').prop('disabled', true);

            var selected_option = $('#date_option-business option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date-business').prop('disabled', false);
                $('#end-date-business').prop('disabled', false);
                $('#start-date-business').prop('required', true);
                $('#end-date-business').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date-business').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date-business').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date-business').pickadate("option", "max", selectedDate);
                }
            });

            $('#start-date-business').change(function() {


                var endDate =  $('#end-date-business').val();
                var startDate =  $('#start-date-business').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date-business').val('');
                }


            });
            $('#date_option-business').change(function() {

                // alert("changed");

                var selected_option = $('#date_option-business option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date-business').prop('disabled', false);
                    $('#end-date-business').prop('disabled', false);
                    $('#start-date-business').prop('required', true);
                    $('#end-date-business').prop('required', true);

                } else {
                    $('#start-date-business').val('');
                    $('#end-date-business').val('');


                    $('#start-date-business').prop('disabled', true);
                    $('#end-date-business').prop('disabled', true);

                }

            });

            $('#end-date-business').change(function() {

                var endDate =  $('#end-date-business').val();
                var startDate =  $('#start-date-business').val();
                if(startDate > endDate ){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date-business').val('');
                }


            });

        });


        // bussiness
        // travel

        $(document).ready(function () {
            $('#start-date-travel').prop('disabled', true);
            $('#end-date-travel').prop('disabled', true);

            var selected_option = $('#date_option-travel option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date-travel').prop('disabled', false);
                $('#end-date-travel').prop('disabled', false);
                $('#start-date-travel').prop('required', true);
                $('#end-date-travel').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date-travel').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date-travel').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date-travel').pickadate("option", "max", selectedDate);
                }
            });

            $('#start-date-travel').change(function() {


                var endDate =  $('#end-date-travel').val();
                var startDate =  $('#start-date-travel').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date-travel').val('');
                }


            });
            $('#date_option-travel').change(function() {

                // alert("changed");

                var selected_option = $('#date_option-travel option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date-travel').prop('disabled', false);
                    $('#end-date-travel').prop('disabled', false);
                    $('#start-date-travel').prop('required', true);
                    $('#end-date-travel').prop('required', true);

                } else {
                    $('#start-date-travel').val('');
                    $('#end-date-travel').val('');


                    $('#start-date-travel').prop('disabled', true);
                    $('#end-date-travel').prop('disabled', true);

                }

            });

            $('#end-date-travel').change(function() {

                var endDate =  $('#end-date-travel').val();
                var startDate =  $('#start-date-travel').val();
                if(startDate > endDate){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date-travel').val('');
                }


            });

        });


        // travel



        // financial

        $(document).ready(function () {
            $('#start-date-financial').prop('disabled', true);
            $('#end-date-financial').prop('disabled', true);

            var selected_option = $('#date_option-financial option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date-financial').prop('disabled', false);
                $('#end-date-financial').prop('disabled', false);
                $('#start-date-financial').prop('required', true);
                $('#end-date-financial').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date-financial').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date-financial').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date-financial').pickadate("option", "max", selectedDate);
                }
            });

            $('#start-date-financial').change(function() {


                var endDate =  $('#end-date-financial').val();
                var startDate =  $('#start-date-financial').val();
                if(startDate > endDate && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date-financial').val('');
                }


            });
            $('#date_option-financial').change(function() {

                // alert("changed");

                var selected_option = $('#date_option-financial option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date-financial').prop('disabled', false);
                    $('#end-date-financial').prop('disabled', false);
                    $('#start-date-financial').prop('required', true);
                    $('#end-date-financial').prop('required', true);

                } else {
                    $('#start-date-financial').val('');
                    $('#end-date-financial').val('');


                    $('#start-date-financial').prop('disabled', true);
                    $('#end-date-financial').prop('disabled', true);

                }

            });

            $('#end-date-financial').change(function() {

                var endDate =  $('#end-date-financial').val();
                var startDate =  $('#start-date-financial').val();
                if(startDate > endDate){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date-financial').val('');
                }


            });

        });


        //  financial






        // ledger

        $(document).ready(function () {
            $('#start-date-ledger').prop('disabled', true);
            $('#end-date-ledger').prop('disabled', true);

            var selected_option = $('#date_option-ledger option:selected').val();

            if (selected_option == 'date_select') {

                $('#start-date-ledger').prop('disabled', false);
                $('#end-date-ledger').prop('disabled', false);
                $('#start-date-ledger').prop('required', true);
                $('#end-date-ledger').prop('required', true);

            }

            $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    //alert("start");
                    $('#end-date-ledger').pickadate("option", "min", selectedDate);
                }
            });
            $('#end-date-ledger').pickadate({
                format: 'yyyy-mm-dd',
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $('#start-date-ledger').pickadate("option", "max", selectedDate);
                }
            });

            $('#start-date-ledger').change(function() {


                var endDate =  $('#end-date-ledger').val();
                var startDate =  $('#start-date-ledger').val();

;
                if(startDate > endDate  && endDate != ''){

                    Materialize.toast("{{trans('localization::errors.start_date_not_greater_than_end_date')}}", 4000);
                    $('#start-date-ledger').val('');
                }


            });
            $('#date_option-ledger').change(function() {

                // alert("changed");

                var selected_option = $('#date_option-ledger option:selected').val();

                if (selected_option == 'date_select') {
                    $('#start-date-ledger').prop('disabled', false);
                    $('#end-date-ledger').prop('disabled', false);
                    $('#start-date-ledger').prop('required', true);
                    $('#end-date-ledger').prop('required', true);

                } else {
                    $('#start-date-ledger').val('');
                    $('#end-date-ledger').val('');


                    $('#start-date-ledger').prop('disabled', true);
                    $('#end-date-ledger').prop('disabled', true);

                }

            });

            $('#end-date-ledger').change(function() {

                var endDate =  $('#end-date-ledger').val();
                var startDate =  $('#start-date-ledger').val();
                if(startDate > endDate ){

                    Materialize.toast("{{trans('localization::errors.end_date_not_less_than_start_date')}}", 4000);
                    $('#end-date-ledger').val('');
                }


            });

        });


        // ledger
      

        var userNamesAjaxPath = "<?php echo public_path('admin/user/names/ajax')?>";

        $(document).ready(function(){
            $("#search-box").keyup(function(){


                if($(this).val() != '')
                {


                    $.ajax({
                        type: "POST",
                        url: "{{ url('/admin/user/names/ajax') }}",
//                    data:'keyword='+$(this).val(),

                        data: {
                            "_token": "{{ csrf_token() }}",
                            "keyword": $(this).val(),
                        },
                        beforeSend: function(){
                            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function(data){

                            // alert(data);
                            //  console.log(data);
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html(data);
                            $("#search-box").css("background","#FFF");
                        }
                    });

                }
                else
                {
                    $("#suggesstion-box").hide();

                }


            });
        });
        //To select country name
        function selectCountry(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
        }



        $(document).ready(function(){
            $("#search-box-driver-name").keyup(function(){

                if($(this).val() != '')
                {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/admin/driver/names/ajax') }}",
//                    data:'keyword='+$(this).val(),

                        data: {
                            "_token": "{{ csrf_token() }}",
                            "driverKeyword": $(this).val(),
                        },
                        beforeSend: function(){
                            $("#search-box-driver-name").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                        },
                        success: function(data){

                            //  alert(data);
                            //  console.log(data);
                            $("#suggesstion-box-driver-name").show();
                            $("#suggesstion-box-driver-name").html(data);
                            $("#search-box-driver-name").css("background","#FFF");
                        }
                    });
                }
                else
                {
                    $("#suggesstion-box-driver-name").hide();

                }

            });
        });
        //To select country name
        function selectCountryDriverName(val) {
            $("#search-box-driver-name").val(val);
            $("#suggesstion-box-driver-name").hide();
        }

    </script>

@endsection