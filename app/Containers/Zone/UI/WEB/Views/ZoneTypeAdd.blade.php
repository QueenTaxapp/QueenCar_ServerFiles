@extends('layout::Layout')
@section('content')
    <?php

    $typeCheck ="";
    $base_price ="";
    $base_distance ="";
    $waiting_charge ="";
    $price_per_distance ="";
    $price_per_time ="";
    $currency_select="";




    if(session()->has('_old_input'))    {
        $typeCheck = session()->get('_old_input')["typeName"];
        $base_price = session()->get('_old_input')["base_price"];
        $base_distance = session()->get('_old_input')["base_distance"];
        $waiting_charge = session()->get('_old_input')["waiting_charge"];
        $price_per_distance = session()->get('_old_input')["price_per_distance"];
        $price_per_time = session()->get('_old_input')["price_per_time"];
        $currency_select= session()->get('_old_input')["currency"];

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

                                <h4 class="header">{{ trans('localization::lang_view.add_type')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('zoneTypeView',$request->id) }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_zone_type_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('zoneTypeSave',$request->id)}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <select name="typeName" id="type" required >
                                                            <option value="">{{ trans('localization::lang_view.select_type')}}</option>
                                                            <?php foreach($types as $key=>$value){?>

                                                            <option class="left" value="<?=$value->id?>" data-icon="<?=$value->icon;?>" <?php if($typeCheck==$value->id){echo "selected";} ?> ><?=$value->name?></option>

                                                            <?php }?>
                                                        </select>
                                                        <label for="type">{{ trans('localization::lang_view.type_name')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="col s12 m6 l6">

                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m4 l4">

                                                        <input name="base_price" id="base_price" type="text" value="{{ $base_price}}" class="validate" required >
                                                        <label for="base_price" class="active">{{ trans('localization::lang_view.base_price')}} <sup>*</sup> ( {{ $unit}} )</label>

                                                    </div>
                                                    <div class="input-field col s12 m4 l4">

                                                        <input name="price_per_distance" id="distance_price" type="text" value="{{ $price_per_distance}}" class="validate" required >
                                                        <label for="distance_price" class="active">{{ trans('localization::lang_view.price_per_distance')}} <sup>*</sup> ( {{ $unit}} )</label>

                                                    </div>
                                                    <div class="input-field col s12 m4 l4">

                                                        <input name="waiting_charge" id="wait" type="text" value="{{ $waiting_charge}}" class="validate" required >
                                                        <label for="wait" class="active">{{ trans('localization::lang_view.waiting_charge')}} <sup>*</sup> </label>

                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field  col s12 m6 l6">
                                                        <select name="base_distance" id="base_distance" required >
                                                            <option value="">{{ trans('localization::lang_view.select_base_distance') }}</option>
                                                            <?php for($i=1;$i<=15;$i++){?>

                                                                <option value="<?=$i?>" ><?=$i?></option>

                                                            <?php }?>
                                                        </select>
                                                        <label for="base_distance">{{ trans('localization::lang_view.base_distance')}} <sup>*</sup> ( {{ $unit}} )</label>

                                                    </div>
                                                    <div class="input-field col s12 m6 l6">

                                                        <input name="price_per_time" id="time_price" type="text" value="{{ $price_per_time}}" class="validate" required >
                                                        <label for="time_price" class="active">{{ trans('localization::lang_view.price_per_time')}} <sup>*</sup></label>

                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">

                                                        <select name="payment_type[]" id="payment" multiple='multiple' required  >

                                                            <option value="cash">{{ trans('localization::lang_view.cash')}}</option>
                                                            <option value="card">{{ trans('localization::lang_view.card')}}</option>
                                                            <option value="wallet">{{ trans('localization::lang_view.wallet')}}</option>

                                                        </select>
                                                        <label for="payment">{{ trans('localization::lang_view.payment_type')}} <sup>*</sup></label>

                                                    </div>
                                                    <div class="input-field col s12 m6 l6">

                                                        <select name="show_bill" id="base_distance" required >
                                                            <option value="">{{ trans('localization::lang_view.show_bill')}}</option>
                                                            <option value="1">{{ trans('localization::lang_view.yes')}}</option>
                                                            <option value="0">{{ trans('localization::lang_view.no')}}</option>

                                                        </select>
                                                        <label for="bill">{{ trans('localization::lang_view.show_bill')}} <sup>*</sup></label>

                                                    </div>
                                                </div>


                                                <div class="input-field col s12 m12 l12">

                                                    <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.add_type')}}
                                                        <i class="material-icons right">send</i>
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                        <br><br><br><br><br><br><br><br>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                <!--end container-->
            </div>
        </section>

@endsection