@extends('layout::Layout')
@section('content')
    <?php

    $zoneId ="";
    $couponCode ="";
    $value ="";
    $uses ="";
    $type ="";
    $startDate ="";
    $expiryDate ="";

    if(session()->has('_old_input'))    {
        $zoneId = session()->get('_old_input')["zone"];
        $couponCode = session()->get('_old_input')["couponCode"];
        $value  = session()->get('_old_input')["value"];
        $uses  = session()->get('_old_input')["uses"];
        $type =session()->get('_old_input')["type"];
        $startDate =session()->get('_old_input')["startDate"];
        $expiryDate =session()->get('_old_input')["expiryDate"];
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

                                <h4 class="header">{{ trans('localization::lang_view.add_promo_code')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminPromoView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_promo_code_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('adminPromoAddSave')}}" method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m12 l12">

                                                    <input name="promoAdmin" type="hidden" value="<?=$promo_admin_key;?>" >

                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="couponCode" id="coupon" type="text" value="{{ $couponCode}}" class="validate" required >
                                                        <label for="coupon" class="active">{{ trans('localization::lang_view.coupon_code')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <input name="value" id="value" type="number" min="1" value="{{ $value}}" required >
                                                        <label for="value">{{ trans('localization::lang_view.value')}}  <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m4 l4">
                                                        <select name="zone" id="zone" required >
                                                            <option value="0">{{ trans('localization::lang_view.all')}}</option>
                                                            <?php foreach($zone as $value){ ?>
                                                            <option value="<?=$value->id?>" <?php if($zoneId==$value->id){echo "selected";} ?> ><?=$value->name;?></option>
                                                            <?php }?>
                                                        </select>
                                                        <label for="zone">{{ trans('localization::lang_view.select_zone')}}  <sup>*</sup></label>
                                                    </div>
                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <select name="type" id="type" required >
                                                            <option value="">{{ trans('localization::lang_view.select_type')}}</option>
                                                            <option value="0" <?php if($type==0){echo "selected";} ?> >{{ trans('localization::lang_view.fixed')}}</option>
                                                            <option value="1" <?php if($type==1){echo "selected";} ?> >{{ trans('localization::lang_view.percentage')}}</option>
                                                        </select>
                                                        <label for="type" class="">{{ trans('localization::lang_view.type')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="uses" id="uses" type="number" min="1" value="{{ $uses}}" required>
                                                        <label for="uses">{{ trans('localization::lang_view.uses')}}<sup>*</sup></label>
                                                    </div>

                                                </div>
                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="startDate" id="startDate" type="text" class="datepicker" value="{{$startDate}}" required>
                                                        <label for="startDate">{{ trans('localization::lang_view.start_date')}} <sup>*</sup></label>
                                                    </div>
                                                    <div class="input-field col s12 m6 l6">
                                                        <input name="expiryDate" id="endDate" type="text" class="datepicker" value="{{$expiryDate}}" required>
                                                        <label for="endDate">{{ trans('localization::lang_view.expiry_date')}} <sup>*</sup></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="col s12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return ValidateAll()" name="action">{{ trans('localization::lang_view.add_promo')}}

                                                    <i class="material-icons right">send</i>
                                                </button>
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

        <script>
        function ValidateAll() {
            var percent = document.getElementById('type').value;

            if(percent==1){
                var value_percent = document.getElementById('value').value;

                if(value_percent >100){
                    Materialize.toast("{{trans('localization::errors.value_cannot_be_greater_than_100')}}", 4000);
                    return false;
                }
            }

            var startDates = document.getElementById('startDate').value;
            var endDates = document.getElementById('endDate').value;

            var startDates = new Date(jQuery('#startDate').val().replace(/-/g, '/')).getTime();
            var endDates = new Date(jQuery('#endDate').val().replace(/-/g, '/')).getTime(); 
            

            if(startDates == ""){
                Materialize.toast("{{trans('localization::errors.start_date_required')}}", 4000);
                return false;
            }

            if(endDates == ""){
                Materialize.toast("{{trans('localization::errors.end_date_required')}}", 4000);
                return false;
            }

            if(startDates >= endDates && endDates != ""){

                Materialize.toast("{{trans('localization::errors.start_date_cannot_be_greater_than_end_date')}}", 4000);
                return false;
            }

        }

    </script>

@endsection