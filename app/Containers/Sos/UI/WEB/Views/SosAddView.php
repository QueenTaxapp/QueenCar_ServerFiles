@extends('layout::Layout')
@section('content')

<style>
    .highlight{
        border-color: red;
    }
</style>
<?php

$name ="";
$number = '';



if(session()->has('_old_input'))
{
    $name = session()->get('_old_input')["name"];

    $number= session()->get('_old_input')["number"];

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

                    <h4 class="header">{{ trans('localization::lang_view.add_sos')}}
                        <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminSosView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_sos_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                    </h4>

                    <div class="row">

                        <div class="col s12">
                            <form action="{{URL::Route('adminDriverSave')}}" onsubmit="return Validate()" method="post" enctype="multipart/form-data" >

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <div class="card-panel">
                                            <div class="row">
                                                <form class="col s12">
                                                    <h4 class="header2">Inline form</h4>
                                                    <div class="row">
                                                        <div class="input-field col s4">
                                                            <i class="material-icons prefix">account_circle</i>
                                                            <input id="icon_prefix" type="text" class="validate">
                                                            <label for="icon_prefix">{{trans('localization::lang_view.name')}}</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <i class="material-icons prefix"> local_phone </i>
                                                            <input id="phone_number" type="text" class="validate">
                                                            <label for="phone_number">{{trans('localization::lang_view.phone_number')}}</label>
                                                        </div>
                                                        <div class="input-field col s4">
                                                            <div class="input-field col s12">
                                                                <button class="btn cyan waves-effect waves-light" type="submit" name="action">
                                                                    <i class="material-icons">lock_open</i> {{trans('localization::lang_view.submit')}}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

    $(document).ready(function(){
        $('.datepicker').pickadate({
            min: new Date()
        })
    });


    function DocumentValidate(){

        var doc_one = $('#doc_name1').val();
        var doc_two = $('#doc_name2').val();
        var doc_three = $('#doc_name3').val();

        if(doc_one != "" && ($('#expiry_date1').val())==""){

            Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

            return false;
        }
        else if((doc_one != "" || ($('#expiry_date1').val()) != "") &&($('#avatarone').val())=="" ){
            Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

            return false;

        }
        else if((doc_one == "")&& (($('#expiry_date1').val()) != "" ||($('#avatarone').val())!="" )){
            Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
            return false;

        }
        if(doc_two != "" && ($('#expiry_date2').val())==""){

            Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

            return false;
        }
        else if((doc_two != "" || ($('#expiry_date2').val()) != "") &&($('#avatartwo').val())=="" ){
            Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

            return false;

        }
        else if((doc_two == "")&& (($('#expiry_date2').val()) != "" ||($('#avatartwo').val())!="" )){
            Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
            return false;

        }
        if(doc_three != "" && ($('#expiry_date3').val())==""){

            Materialize.toast("{{trans('localization::errors.expiry_date_required')}}", 4000);

            return false;
        }
        else if((doc_three != "" || ($('#expiry_date3').val()) != "") &&($('#avatarthree').val())=="" ){
            Materialize.toast("{{trans('localization::errors.document_picture_required')}}", 4000);

            return false;

        }
        else if((doc_three == "")&& (($('#expiry_date3').val()) != "" ||($('#avatarthree').val())!="" )){
            Materialize.toast("{{trans('localization::errors.document_name_required')}}", 4000);
            return false;

        }



        return true;

    }


</script>

@endsection