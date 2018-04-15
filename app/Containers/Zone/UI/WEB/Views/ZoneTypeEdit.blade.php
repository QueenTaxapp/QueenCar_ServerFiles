@extends('layout::Layout')
@section('content')

        <section id="content">

            <div class="container">


                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{ trans('localization::lang_view.edit_type')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('zoneTypeView',$zoneTypes->zone_id) }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_zone_type_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('zoneTypeUpdate',$zoneTypes->id)}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <select name="typeName" id="type" disabled >
                                                            <option value="">{{ trans('localization::lang_view.select_type')}}</option>
                                                            <?php foreach($types as $key=>$value){?>

                                                            <option class="left" value="<?=$value->id?>" data-icon="<?=$value->icon;?>" <?php if($zoneTypes->type_id==$value->id){echo "selected";} ?> ><?=$value->name?></option>

                                                            <?php }?>
                                                        </select>
                                                        <label for="type">{{ trans('localization::lang_view.type_name')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="col s12 m6 l6">

                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m4 l4">

                                                        <input name="base_price" id="base_price" type="text" value="<?=$zoneTypes->base_price?>" class="validate" required >
                                                        <label for="base_price" class="active">{{ trans('localization::lang_view.base_price')}} <sup>*</sup> ( {{ $unit}} )</label>

                                                    </div>
                                                    <div class="input-field col s12 m4 l4">

                                                        <input name="price_per_distance" id="distance_price" type="text" value="<?=$zoneTypes->price_per_distance?>" class="validate" required >
                                                        <label for="distance_price" class="active">{{ trans('localization::lang_view.price_per_distance')}} <sup>*</sup> ( {{ $unit}} )</label>

                                                    </div>
                                                    <div class="input-field col s12 m4 l4">

                                                        <input name="waiting_charge" id="wait" type="text" value="<?=$zoneTypes->waiting_charge?>" class="validate" required >
                                                        <label for="wait" class="active">{{ trans('localization::lang_view.waiting_charge')}} <sup>*</sup></label>

                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field  col s12 m6 l6">
                                                        <select name="base_distance" id="base_distance" required >
                                                            <option value="">{{ trans('localization::lang_view.select_base_distance')}}</option>
                                                            <?php for($i=1;$i<=15;$i++){?>

                                                                <option value="<?=$i?>" <?php if($zoneTypes->base_distance==$i){echo "selected";} ?> ><?=$i?></option>

                                                            <?php }?>
                                                        </select>
                                                        <label for="base_distance">{{ trans('localization::lang_view.base_distance')}} <sup>*</sup> ( {{ $unit}} )</label>

                                                    </div>
                                                    <div class="input-field col s12 m6 l6">

                                                        <input name="price_per_time" id="time_price" type="text" value="<?=$zoneTypes->price_per_time?>" class="validate" required >
                                                        <label for="time_price" class="active">{{ trans('localization::lang_view.price_per_time')}} <sup>*</sup></label>

                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">

                                                        <select name="payment_type[]" id="payment" multiple='multiple' required  >

                                                            <?php
                                                                    if($zoneTypes->payment_type=="all"){
                                                                        $checkPayment="selected";

                                                                    }else{
                                                                        $checkPayment="";
                                                                    }
                                                                    ?>

                                                            <option value="cash" <?=$checkPayment?> <?php if(strpos($zoneTypes->payment_type,'cash') !==false){echo "selected";}?> >{{ trans('localization::lang_view.cash')}}</option>
                                                            <option value="card" <?=$checkPayment?> <?php if(strpos($zoneTypes->payment_type,'card') !==false){echo "selected";}?> >{{ trans('localization::lang_view.card')}}</option>
                                                            <option value="wallet" <?=$checkPayment?> <?php if(strpos($zoneTypes->payment_type,'wallet') !==false){echo "selected";}?> >{{ trans('localization::lang_view.wallet')}}</option>

                                                        </select>
                                                        <label for="payment">{{ trans('localization::lang_view.payment_type')}} <sup>*</sup></label>

                                                    </div>
                                                    <div class="input-field col s12 m6 l6">

                                                        <select name="show_bill" id="bill" required >
                                                            <option value="">{{ trans('localization::lang_view.show_bill')}}</option>
                                                            <option value="1" <?php if($zoneTypes->show_bill==1){echo "selected";}?> >{{ trans('localization::lang_view.yes')}}</option>
                                                            <option value="0" <?php if($zoneTypes->show_bill==0){echo "selected";}?> >{{ trans('localization::lang_view.no')}}</option>

                                                        </select>
                                                        <label for="bill">{{ trans('localization::lang_view.show_bill')}} <sup>*</sup></label>

                                                    </div>
                                                </div>


                                                <div class="input-field col s12 m12 l12">
                                                    <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action">{{ trans('localization::lang_view.update_type')}}
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