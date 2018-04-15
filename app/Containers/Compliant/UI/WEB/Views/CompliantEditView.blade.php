@extends('layout::Layout')
@section('content')

    <?php
//     echo "<pre>";
//     print_r($value);
//     die();
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

                                <div class="col s12">
                                    <form action="{{URL::Route('modifyCompliants')}}"   method="post" enctype="multipart/form-data" >



                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <div class="input-field col s12 m6 l6">
                                                    <input name="title" id="title" type="text"  class="validate" value="{{ $value->title }}" required >
                                                    <label for = "title" class="active">{{ trans('localization::lang_view.compliants_title')}} <sup>*</sup></label>

                                                </div>
                                                <div class="input-field col s12 m6 l6">

                                                    <select class="select" name="type">

                                                        <option value="1" <?php if($value->type == 1 ){?> selected="selected" <?php } ?> >   {{trans('localization::lang_view.user')}}</option>

                                                        <option value="2" <?php if($value->type == 2){?> selected="selected" <?php } ?> >   {{trans('localization::lang_view.driver') }}</option>

                                                    </select>
                                                </div>


                                                <input type="hidden" name="id" value="{{ $value->id }}">


                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            </div>

                                            <div class="input-field col s12 m12 l12">
                                                <button id='button' class="btn save-btn cyan waves-effect waves-light right" type="submit" onclick="return DocumentValidate()" name="action" value="modify" >{{ trans('localization::lang_view.update')}}
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