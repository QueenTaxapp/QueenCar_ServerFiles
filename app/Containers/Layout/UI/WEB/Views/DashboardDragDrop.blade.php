@extends('layout::Layout')
@section('content')

<?php


?>

<section id="content">
    <!--start container-->
    <div class="container">
        <!--card stats start-->

        <div class="row">
            <div class="col s12 m12 l12">
                <div id="bordered-table">

                    <h4 class="header">{{ trans('localization::lang_view.admin_dashboard')}}
                        <span class="back-button"  style="float: right;"><a class="tooltipped" href="" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_admin_role_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                    </h4>

                    <div class="row">

                        <div class="col s12 m12 l6">
                            <div class="input-field">
                                <select id='multi-value' class='' multiple='multiple' >
                                    <?php

                                    if(!empty($unselected))
                                    {
                                    foreach($unselected as $value)
                                    {
                                    ?>
                                    <option value = "{{$value}}" >{{$value}}</option>
                                    <?php
                                    }
                                    }

                                    if(!empty($selected))
                                    {
                                    foreach($selected as $value)
                                    {
                                    ?>
                                    <option value = "{{$value}}" selected>{{$value}}</option>
                                    <?php
                                    }
                                    }

                                    ?>
                                </select>
                                <label for="multi-value">{{ trans('localization::lang_view.select_dashboard')}}<sup>*</sup></label>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<!-- ends -->
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script src="<?php echo asset('drag/js/jquery.multi-select.js'); ?> "></script>


@endsection