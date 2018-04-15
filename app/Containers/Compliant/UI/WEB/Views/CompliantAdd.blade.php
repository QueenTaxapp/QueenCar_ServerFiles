@extends('layout::Layout')
@section('content')


    <?php

    $compliantTitle = '';
    $adminReference = '';
    $type = '';

    if(session()->has('input'))
    {

        $compliantTitle = session()->get('input')["title"];
        $adminReference = session()->get('input')["admin_reference"];
        $type = session()->get('input')["type"];
    }
    ?>


    <style>
        .highlight{
            border-color: red;
        }
    </style>

    <!-- START CONTENT -->
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->

            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card-panel">
                        <div id="bordered-table">

                            <h4 class="header">{{ $title  }}
                                <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('compliantView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_view_complaints')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>

                            </h4>

                            <div class="row">

                                <div class="col s12 m12 l12">
                                    <form action="{{URL::Route('registerCompliants')}}"   method="post" enctype="multipart/form-data" >

                                        <div class="row">

                                            <?php if($complaint_admin_key == 0){ ?>
                                            <div class="col s12 m12 l12">
                                                <div class="input-field col s12 m6 l6">
                                                    <select name="complaintAdmin" id="complaint_admin"  required >
                                                        <option value="">{{trans('localization::lang_view.select')}}</option>
                                                        <?php
                                                        foreach($complaint_admins as $value){ ?>
                                                        <option value="<?=$value->admin_key;?>" <?php if($value->admin_key == $adminReference ){?> selected="selected" <?php } ?> > <?php echo $value->area_name;?></option>
                                                        <?php }; ?>

                                                    </select>
                                                    <label for="complaint_admin" class="">{{ trans('localization::lang_view.select_area_for_this_driver')}} <sup>*</sup></label>
                                                </div>
                                            </div>
                                            <?php }else{ ?>
                                            <input name="complaintAdmin" type="hidden" value="<?=$complaint_admin_key;?>" >
                                            <?php } ?>


                                            <div class="col s12 m12 l12">
                                                <div class="input-field col s12 m6 l6">
                                                    <input name="title" id="title" type="text" value = "{{$compliantTitle}}" class="validate"required >
                                                    <label for = "title" class="active">{{ trans('localization::lang_view.compliants_title')}} <sup>*</sup></label>

                                                </div>
                                                <div class="input-field col s12 m6 l6">

                                                    <select class="select" name="type">

                                                        <option value="1"  <?php if($type == 1 ){?> selected="selected" <?php } ?> >   {{trans('localization::lang_view.user')}}</option>

                                                        <option value="2"  <?php if($type == 2 ){?> selected="selected" <?php } ?> >   {{trans('localization::lang_view.driver') }}</option>

                                                    </select>
                                                </div>

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            </div>

                                            <div class="input-field col s12 m12 l12">
                                                <button id='button' class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action" value="modify" >{{ trans('localization::lang_view.register')}}
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

@endsection
