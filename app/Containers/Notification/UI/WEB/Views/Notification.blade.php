@extends('layout::Layout')
@section('content')
    <?php

    $typeName ="";

    if(session()->has('_old_input'))    {
        $typeName = session()->get('_old_input')["typeName"];

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

                                <h4 class="header">{{ trans('localization::lang_view.notification')}}

                                </h4>

                                <div class="row">

                                    <div class="col s12 m12 l12">
                                        <form action="{{URL::Route('adminNotificationSend')}}"  method="post" enctype="multipart/form-data" >

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="row">
                                                <div class="col s12 m6 l6">
                                                    <div id="user_hide" class="input-field col s6 m6 l6">
                                                        <select name="users[]" id="users" multiple='multiple'  >

                                                            <option value="" disabled>{{ trans('localization::lang_view.select')}}</option>

                                                            <?php foreach($users as $key=>$value){?>

                                                            <option class="users" value="<?=$value->id?>" ><?=$value->firstname.' '.$value->lastname?></option>

                                                            <?php }?>
                                                        </select>
                                                        <label for="users">{{ trans('localization::lang_view.users')}} <sup>*</sup></label>
                                                    </div>

                                                    <div class="input-field col s6 m6 l6">
                                                        <span>
                                                            <input class="" disabled type="checkbox" id="user_box" style="opacity:1;margin-top: 10px;z-index: 1;pointer-events:auto ;width: 17px;height: 17px;" >
                                                        </span>
                                                        <span>
                                                            <button class=" btn waves-effect waves-light" style="margin-left:50px;margin-top: 10px" name="user_all" id="user_all" type="button">{{ trans('localization::lang_view.select_all')}}</button>
                                                        </span>
                                                    </div>
                                                </div>
                                                  {{--  <div class="input-field col s2">
                                                        <span>
                                                            <button class="btn waves-effect waves-light" style="margin-top: 10px" name="user_all" id="user_all" type="button">{{ trans('localization::lang_view.select_all')}}</button>
                                                        </span>
                                                    </div>--}}

                                                <div class="col s12 m6 l6">
                                                    <div id="driver_hide" class="input-field col s12 m6 l6">
                                                        <select name="drivers[]" id="drivers" multiple='multiple'  >

                                                            <option value="" disabled>{{ trans('localization::lang_view.select')}}</option>

                                                            <?php foreach($drivers as $key=>$value){?>

                                                            <option value="<?=$value->id?>" ><?=$value->firstname.' '.$value->lastname?></option>

                                                            <?php }?>
                                                        </select>
                                                        <label for="drivers">{{ trans('localization::lang_view.drivers')}} <sup>*</sup></label>
                                                    </div>

                                                    <div class="input-field col s12 m6 l6">
                                                        <span>
                                                            <input class="" disabled type="checkbox" id="driver_box" style="opacity:1;margin-top: 10px;z-index: 1;pointer-events:auto ;width: 17px;height: 17px;" >
                                                        </span>
                                                        <span>
                                                            <button class=" btn waves-effect waves-light" style="margin-left:50px;margin-top: 10px" name="driver_all" id="driver_all" type="button">{{ trans('localization::lang_view.select_all')}}</button>
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="col s12 m12 l12">
                                                    <div class="input-field col s12 m12 l12">

                                                        <textarea style="resize:none;width: 100%;height: 100px" name="message" id="msg" placeholder="{{ trans('localization::lang_view.enter_your_message')}}" required ></textarea>

                                                    </div>
                                                </div>
                                               {{-- <div class="col s12 m12 l12">
                                                    <div class="input-field col s6">

                                                        <input name="users[]" id="night_value" type="text" value="" class="autocomplete" required >

                                                        <label for="night_value">{{ trans('localization::lang_view.type_name')}} <sup>*</sup></label>
                                                    </div>

                                                    <div class="input-field col s6">

                                                        <input name="night_value" id="night_value" type="text" value="" class="validate" required >

                                                        <label for="type">{{ trans('localization::lang_view.type_name')}} <sup>*</sup></label>
                                                    </div>
                                                </div>--}}

                                            </div>
                                            <br>
                                            <div class="col s12 m12 l12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return personCheck()" name="action">{{ trans('localization::lang_view.send_notification')}}
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
    {{--<script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/material_js/form-elements.js')}}"></script>--}}

    <script>


        function personCheck(){
            if ( !$('#users option').is(':selected') && !$('#drivers option').is(':selected') ){
                Materialize.toast("{{trans('localization::errors.select_any_one')}}", 4000);
               // alert("select one person");
                return false;
            }
        }

        document.addEventListener("DOMContentLoaded", function(event) {

           var ur=function(){

               if($('#user_box').is(":checked")){
                   $('#users option').prop('selected', true);
                   $('#user_hide').hide(1000);
                  // alert("checked");
               }else{
                   $('#users option').prop('selected', false);
                   $('#user_hide').show(1000);
                   //alert("un checked");
               }
           };

           var dr=function(){

               if($('#driver_box').is(":checked")){
                   $('#drivers option').prop('selected', true);
                   $('#driver_hide').hide(1000);
                   //alert("checked");
               }else{
                   $('#drivers option').prop('selected', false);
                   $('#driver_hide').show(1000);
                   //alert("un checked");
               }
           };

            $('#user_all').click(function() {
                $('#user_box').prop("checked", !$('#user_box').prop("checked"));
                ur();
            });


            $('#driver_all').click(function() {
                $('#driver_box').prop("checked", !$('#driver_box').prop("checked"));
                dr();
            });


            $('input.autocomplete').autocomplete({
                data: {
                    "Apple": null,
                    "Microsoft": null,
                    "Google": 'https://placehold.it/250x250'
                },
                limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                    // Callback function when value is autcompleted.
                },
                minLength: 1 // The minimum length of the input for the autocomplete to start. Default: 1.
            });

        });
    </script>

@endsection