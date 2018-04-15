@extends('layout::Layout')
@section('content')

    <style>
        .highlight{
            border-color: red;
        }
    </style>



    <?php

    $name = '';
    $number = '';

    if(session()->has('_old_input'))
    {
        $name = session()->get('_old_input')["name"];
        $number  = session()->get('_old_input')["number"];

    }

    ?>

    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-panel">
                        <div id="bordered-table">

                            <h4 class="header">{{ trans('localization::lang_view.add_sos')}}
                                <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('adminSosView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_sos_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                            </h4>

                            <div class="row">

                                <div class="col s12 m12 l12">
                                    <form action="{{URL::Route('registerAdminSos')}}"   method="post" enctype="multipart/form-data" >

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="row">

                                        <?php if($sos_admin_key == 0){ ?>
                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <select name="sosAdmin" id="sos_admin"  required >
                                                    <option value="">{{trans('localization::lang_view.select')}}</option>
                                                    <?php
                                                    foreach($sos_admins as $value){ ?>
                                                    <option value="<?=$value->admin_key;?>" > <?php echo $value->area_name;?></option>
                                                    <?php }; ?>

                                                </select>
                                                <label for="sos_admin" class="">{{ trans('localization::lang_view.select_area_for_this_sos')}} <sup>*</sup></label>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <input name="sosAdmin" type="hidden" value="<?=$sos_admin_key;?>" >
                                        <?php } ?>

                                        <div class="col s12 m12 l12">
                                            <div class="input-field col s12 m6 l6">
                                                <input name="name" id="name" type="text" value="{{ $name }}" class="validate"required >
                                                <label for = "name" class="active">{{ trans('localization::lang_view.name')}} <sup>*</sup></label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input name="number" id="number" type="text" value="{{ $number}}" class="validate" required >
                                                <label for="number">{{ trans('localization::lang_view.phone_number')}}  <sup>*</sup></label>
                                            </div>

                                        </div>


                                            <div class="input-field col s12 m12 l12">
                                                <button class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action">{{ trans('localization::lang_view.register')}}
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>

                                        </div>
                                    </form>

                                </div>

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
    <?php
    if(\Illuminate\Support\Facades\Session::get('role') != 0)
    {
    ?>
    <script>
        $('#area').hide();
        $('#area_name').attr('disabled', 'disabled');

        //$('#area_name_label').hide();
    </script>
    <?php
    }
    else
    {
    ?>
    <script>
        // $('#area_name').attr('disabled', 'disabled');
    </script>
    <?php
    }

    ?>
@endsection