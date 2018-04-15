@extends('layout::Layout')
@section('content')


    <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="bordered-table">

                                <h4 class="header">{{ trans('localization::lang_view.surge_price')}}
                                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('zoneView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_zone_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('zoneSurgeUpdate',$request->id)}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">

                                                <div class="col s12 m12 l12">
                                                    <div style="overflow: visible" class="card">
                                                        <div  class="card-content">
                                                            <span class="card-title">
                                                            <?php
                                                                if($zonepeak->peaktime==1){
                                                                    $peakCheck="checked";
                                                                }else{
                                                                    $peakCheck="";
                                                                }
                                                            ?>
                                                                <input type="checkbox" name="peakTime" id="peak" <?=$peakCheck?> style="margin-top: 10px;z-index: 1;pointer-events:auto ;width: 17px;height: 17px;"/>
                                                                <label style="pointer-events:none ;" for="peak"><b>{{ trans('localization::lang_view.peak_time')}} </b></label>
                                                            </span>

                                                            <div class="row" id="peak_row">
                                                                <div class="col s12 m12 l12">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input name="peak_start" id="peakStart" type="text" class="timepicker" value="<?=$zonepeak->peaktime_start?>" required>
                                                                        <label for="peakStart">{{ trans('localization::lang_view.start_time')}} <sup>*</sup></label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input name="peak_end" id="peakEnd" type="text" class="timepicker" value="<?=$zonepeak->peaktime_end?>" onchange="peakValidate();" required>
                                                                        <label for="peakEnd">{{ trans('localization::lang_view.end_time')}} <sup>*</sup></label>
                                                                    </div>
                                                                </div>

                                                                <div class="col s12 m12 l12">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <select name="peak_apply" id="peak_apply" required  >
                                                                            <option value="" >{{ trans('localization::lang_view.select')}}</option>
                                                                            <option value="1" <?php if($zonepeak->peak_apply_on==1){echo "selected";}?> >{{ trans('localization::lang_view.base_price')}}</option>
                                                                            <option value="2" <?php if($zonepeak->peak_apply_on==2){echo "selected";}?> >{{ trans('localization::lang_view.distance_price')}}</option>
                                                                        </select>
                                                                        <label for="peak_apply">{{ trans('localization::lang_view.peak_type')}} <sup>*</sup></label>
                                                                    </div>

                                                                    <div class="input-field col s12 m6 l6">

                                                                        <input name="peak_value" id="peak_value" type="text" value="<?=$zonepeak->peaktime_value?>" class="validate" required >
                                                                        <label for="peak_value" class="active">{{ trans('localization::lang_view.value')}} <sup>*</sup></label>

                                                                    </div>


                                                                </div>

                                                            </div><br>

                                                        </div>

                                                    </div>
                                                </div>{{--//peak end --}}

                                                <div class="col s12 m12 l12">
                                                    <div style="overflow: visible" class="card">
                                                        <div class="card-content">
                                                            <span class="card-title">
                                                                 <?php
                                                                if($zonepeak->nighttime==1){
                                                                    $nightCheck="checked";
                                                                }else{
                                                                    $nightCheck="";
                                                                }

                                                                ?>

                                                                <input type="checkbox" name="nightTime" id="night" <?=$nightCheck?> style="margin-top: 10px;z-index: 1;pointer-events:auto ;width: 17px;height: 17px;"/>
                                                                <label style="pointer-events:none ;" for="night"><b>{{ trans('localization::lang_view.night_time')}}</b></label>
                                                            </span>

                                                            <div class="row" id="night_row">
                                                                <div class="col s12 m12 l12">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input name="night_start" id="nightStart" type="text" class="timepicker" value="<?=$zonepeak->nighttime_start?>" required>
                                                                        <label for="nightStart">{{ trans('localization::lang_view.start_time')}} <sup>*</sup></label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input name="night_end" id="nightEnd" type="text" class="timepicker" value="<?=$zonepeak->nighttime_end?>" required>
                                                                        <label for="nightEnd">{{ trans('localization::lang_view.end_time')}} <sup>*</sup></label>
                                                                    </div>
                                                                </div>

                                                                <div class="col s12 m12 l12">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <select name="night_apply" id="night_apply"  required  >
                                                                            <option value="" >{{ trans('localization::lang_view.select')}}</option>
                                                                            <option value="1" <?php if($zonepeak->night_apply_on==1){echo "selected";}?> >{{ trans('localization::lang_view.base_price')}}</option>
                                                                            <option value="2" <?php if($zonepeak->night_apply_on==2){echo "selected";}?> >{{ trans('localization::lang_view.distance_price')}}</option>
                                                                        </select>
                                                                        <label for="night_apply">{{ trans('localization::lang_view.night_type')}} <sup>*</sup></label>
                                                                    </div>

                                                                    <div class="input-field col s12 m6 l6">

                                                                        <input name="night_value" id="night_value" type="text" value="<?=$zonepeak->nighttime_value?>" class="validate" required >
                                                                        <label for="night_value" class="active">{{ trans('localization::lang_view.value')}} <sup>*</sup></label>

                                                                    </div>


                                                                </div>

                                                            </div><br>

                                                        </div>

                                                    </div>
                                                </div>




                                            </div>
                                            <br>
                                            <div class="col s12 m12 l12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" name="action" onclick="return timeValidate()">{{ trans('localization::lang_view.save')}}
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

    <script type="text/javascript">


        function timeValidate() {

            var peak_start = $('#peakStart').val();
            var peak_end = $('#peakEnd').val();

            if ( peak_start != "" && peak_start >= peak_end) {
               // alert(peak_end);
                Materialize.toast("{{trans('localization::errors.peak_end_time_not_less_than_start_time')}}", 4000);
                return false;
            }

            var night_start = $('#nightStart').val();
            var night_end = $('#nightEnd').val();

            if ( night_start!="" && night_start >= night_end) {
                //alert(night_end);
                Materialize.toast("{{trans('localization::errors.night_end_time_not_less_than_start_time')}}", 4000);
                return false;
            }


        }




            document.addEventListener("DOMContentLoaded", function(event) {

            var peak = function() {
               if ($('#peak').is(":checked"))
               {
                   $('#peak_row').show(1000);
                   $('#peakStart').prop('disabled',false);
                   $('#peakEnd').prop('disabled',false);
                   $('#peak_apply').prop('disabled',false);
                   $('#peak_value').prop('disabled',false);
               }
               else{
                   $('#peak_row').hide(1000);
                   $('#peakStart').prop('disabled',true);
                   $('#peakEnd').prop('disabled',true);
                   $('#peak_apply').prop('disabled',true);
                   $('#peak_value').prop('disabled',true);
               }
           };
           $(peak);
           $("#peak").change(peak);

           var night = function() {
               if ($('#night').is(":checked"))
               {
                   $('#night_row').show(1000);
                   $('#nightStart').prop('disabled',false);
                   $('#nightEnd').prop('disabled',false);
                   $('#night_apply').prop('disabled',false);
                   $('#night_value').prop('disabled',false);
               }
               else{
                   $('#night_row').hide(1000);
                   $('#nightStart').prop('disabled',true);
                   $('#nightEnd').prop('disabled',true);
                   $('#night_apply').prop('disabled',true);
                   $('#night_value').prop('disabled',true);
               }
           };
           $(night);
           $("#night").change(night);


        });
    </script>

@endsection