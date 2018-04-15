@extends('layout::Layout')
@section('content')
    <?php


    //        echo "<pre>";
    //        print_r($titles);
    //        echo "<pre>";
    //        print_r();
    //        die();
    $id = $value->id;

    $selected = $value->title;
    $message = $value->description;

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

                            <h4 class="header">{{ trans('localization::lang_view.edit_driver_compliant')}}
                                <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('userCompliantView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_view_user_complaints')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                            </h4>

                            <div class="row">

                                <div class="col s12 m12 l12">
                                    <form action="{{URL::Route('driverCompliantModify')}}"   method="post" enctype="multipart/form-data" >



                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <div class="input-field col s12 m5 l4">
                                                    <select class="select" name="title">
                                                        <?php
                                                        foreach ($titles as $key=>$value)
                                                        {
                                                        ?>

                                                        <option value="{{$value->id}}" <?php if($value->id == $selected ){?> selected="selected" <?php } ?> >  {{ $value->title }} </option>
                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="input-field col s12 m7 l8">
                                                    <input name="description" id="description" type="text" value="{{ $message }}" class="validate"required >
                                                    <label for = "description" class="active">{{ trans('localization::lang_view.description')}} <sup>*</sup></label>

                                                </div>
                                                <input type="hidden" name="id" value="{{ $id  }}">
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