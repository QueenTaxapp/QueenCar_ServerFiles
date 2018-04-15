<?php

$id = Session::get('company_id');
$role = Session::get('role');
$userIcon = Session::get('company_profile_pic')?:asset('assets/material_icon/avatar/avatar-7.png');//die();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{session::get('applicationName')}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{asset('assets/material_css/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/custom.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/jquery-jvectormap.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/flag-icon.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/dropify.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/sweetalert.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/demo.css')}}" type="text/css" rel="stylesheet">


  <!--<link rel="stylesheet" type="text/css" href="<?php //echo asset('drag/css/multi-select.css'); ?>">-->


    <style>
        section{
            margin-top: 10px;
        }
        .status-red
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #d81b60;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-green
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #5cb860;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-card
        {

            font-size: 16px;
            color: white;
            width :25px;

            background-color: #27b7eb;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-cash
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color: #ff9d00;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-wallet-cash
        {

            font-size: 16px;
            color: white;
            width :25px;
            background-color:#f63093;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .status-wallet
        {

            font-size: 16px;
            color: white;
            width :25px;

            background-color: #972ed0;
            padding-top: 8px;
            padding-right: 10px;
            padding-bottom: 8px;
            padding-left: 10px;
            -moz-border-radius: 0px 0px 0px 0px;
            border-radius: 6px 6px 6px 6px; /* standards-compliant: (IE) */
        }
        .edit-button {
            /*float: left;*/
            /*padding-left: 90%;*/
            /*padding-top: 15px;*/
            position: fixed;
            top: 20px;
            z-index: 99999;
            right:50px;

        }

        .back-button
        {
            font-size:15px;
        }
        sup{
            color:red;
            font-size: 12px;
            left: 2px;
        }
        .no-result{
            color:red;
        }
    </style>
</head>

<body class="layout-semi-dark loaded">
<!-- Start Page Loading -->

<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color">
            <div class="nav-wrapper">

                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="<?=$userIcon;?>" alt="avatar">
                    <i></i>
                  </span>
                        </a><ul id="profile-dropdown" class="dropdown-content">
                            <li>
                                <a href="{{ URL::Route('editCompanyProfile',$id)}}" class="grey-text text-darken-1">
                                    <i class="material-icons">face</i> {{trans('localization::title.profile')}}</a>
                            </li>

                            <li>
                                <a href="{{ URL::Route('companyLockScreen',$id)}}" class="grey-text text-darken-1">
                                    <i class="material-icons">lock_outline</i> {{trans('localization::title.lock')}}</a>
                            </li>
                            <li>
                                <a href="{{ URL::Route('companyLogout',$id)}}" class="sweet-logout">
                                    <i class="material-icons">keyboard_tab</i> {{trans('localization::title.logout')}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- translation-button -->

                <!-- notifications-dropdown -->

                <!-- profile-dropdown -->

            </div>
        </nav>
    </div>
</header>
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside style="width:0px;" id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
            <div class="brand-sidebar">
                <h1 class="logo-wrapper">
                    <a href="" class="brand-logo darken-1">
                        <img src="<?php echo App\Containers\Common\GetConfigs::getConfigs('logo');?>" alt="">
                        <span class="logo-text hide-on-med-and-down"><?php echo App\Containers\Common\GetConfigs::getConfigs('application_name');?></span>
                    </a>
                    <a href="#" class="navbar-toggler">
                        <i class="material-icons">radio_button_checked</i>
                    </a>
                </h1>
            </div>
            <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="transform: translateX(0%);">
                <li class="no-padding">
                    <ul class="collapsible" data-collapsible="accordion">

                        <li class="bold <?php if($page=="dashboard_module"){echo "active";}else{echo "";}?>" >
                            <a href="{{URL::Route('companyDashboard')}}" class="waves-effect waves-cyan">
                                <i class="material-icons">dashboard</i>
                                <span class="nav-text">{{trans('localization::title.dashboard_module')}}</span>
                            </a>
                        </li>

                        <li class="bold <?php if($page=="driver_module"){echo "active";}else{echo "";}?>" >
                            <a href="{{URL::Route('companyDriverView')}}" class="waves-effect waves-cyan">
                                <i class="material-icons">local_taxi</i>
                                <span class="nav-text">{{trans('localization::title.driver_module')}}</span>
                            </a>
                        </li>

                        <li class="bold <?php if($page=="payment_module"){echo "active";}else{echo "";}?>" >
                            <a href="{{URL::Route('companyPaymentView')}}" class="waves-effect waves-cyan">
                                <i class="material-icons">payment</i>
                                <span class="nav-text">{{trans('localization::title.payment_module')}}</span>
                            </a>
                        </li>

                        <li class="bold <?php if($page=="map_module"){echo "active";}else{echo "";}?>" >
                            <a href="{{URL::Route('companyMapView')}}" class="waves-effect waves-cyan">
                                <i class="material-icons">place</i>
                                <span class="nav-text">{{trans('localization::title.map_module')}}</span>
                            </a>
                        </li>





                    </ul>
                </li>
            </ul>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps-scrollbar-y-rail" style="top: 0px; height: 588px; right: 3px;">
                    <div class="ps-scrollbar-y" style="top: 0px; height: 293px;"></div>
                </div>

            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">menu</i>
            </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
    @yield('content')
        <!-- Floating Action Button -->

        <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a id="menu" class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow helper ">
                <i class="material-icons">help_outline</i>
            </a>
        </div>

    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


<save-my-eyes-dialog-popup class="save_my_eyes_dialog_popup"></save-my-eyes-dialog-popup><div class="hiddendiv common"></div><div class="drag-target" data-sidenav="slide-out" style="left: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div><div class="drag-target" data-sidenav="chat-out" style="right: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

</div>
</body>

<!-- Compiled and minified JavaScript -->
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{asset('assets/material_js/materialize.min.js')}}"></script>
<!--prism-->
<script type="text/javascript" src="{{asset('assets/material_js/prism.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('assets/material_js/perfect-scrollbar.min.js')}}"></script>
<!-- chartjs -->
<script type="text/javascript" src="{{asset('assets/material_js/chart.min.js')}}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('assets/material_js/plugins.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/form-file-uploads.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{asset('assets/material_js/custom-script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/dashboard-ecommerce.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/material_js/extra-components-sweetalert.js')}}"></script>

{{--   Form Password Validation   --}}

<script>
    var img=document.getElementById('myimg');
    var func=function(){
       alert('error');
    };
    if(img.complete){
        func.call(img);
    }
    else{
        img.onload=func;
    }
</script>
<script>
    function Validate() {

        var password = document.getElementById("password").value;

        var confirmPassword = document.getElementById("confirm_password").value;

        if (password != confirmPassword) 
        {

            Materialize.toast("{{trans('localization::errors.password_did_not_matched')}}", 4000);
            //demo.showNotification('top','center','danger','warning', 'Passwords did not match');

            /* alert("Passwords do not match.");*/
            return false;
        }
        return true;
    }

</script>

{{--   Image Displaying in form  --}}
<script>

    $(document).ready(function(){
        // Basic

        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });
        var drEventimg = $('.dropify').dropify();

        drEventimg.on('dropify.error.imageFormat', function(event, element){
            alert('Image format error message!');
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });
    });

</script>

{{--   Sweet Alerts   --}}
<script>
    var button;
    $('.sweet-logout').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.logout')}}",
                    cancelButtonText: "{{ trans('localization::errors.stay_in')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });
    $('.sweet-active').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_active_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-inactive').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_inactive_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-approve').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_approve_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });
    });

    $('.sweet-decline').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_decline_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });

    });

    $('.sweet-delete').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_delete_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });

    });

    $('.sweet-revert').click(function(e){
        button=$(this);
        e.preventDefault();

        swal({    title: "{{ trans('localization::errors.are_you_sure')}}",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('localization::errors.yes_revert_it')}}",
                    cancelButtonText: "{{ trans('localization::errors.no_keep_it')}}",
                    closeOnConfirm: false,
                    closeOnCancel: true},
                function(){
                    button.unbind();
                    button[0].click();
                });

    });

</script>

{{--   Helper Displaying   --}}
<script>
    function help($data,tap){
        $('.helper').attr('id',$data);
        $('#'+tap).tapTarget('open');

    }
      
      $( function() {
    $( "#draggable" ).draggable();
  } );
</script>



<?php 
if(isset($request))
{



if($request->session()->has('errors'))
{

?>
<script>

    Materialize.toast('<?php echo $request->session()->get("errors")->all()[0];?>', 4000);
    console.log('1');
</script>
<?php
}

if($request->session()->has('success'))
{
  
?>
<?php $error = $request->session()->get('success')["message"]; ?>
<script>
    Materialize.toast('<?php echo $request->session()->get("success")["message"]?>', 4000);
    console.log('3');
</script>
<?php
}


if($request->session()->has('prompt_alert'))
{

?>
<?php $error = $request->session()->get('prompt_alert')["message"];

?>
<script>

    var errorMessage = "<?php  echo $error ?>";
    swal({
                title: errorMessage,
                text: "<?php echo trans('localization::lang_view.please_pay_through_cash')?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "{{ trans('localization::lang_view.pay_through_cash')}}",
                cancelButtonText: "{{ trans('localization::lang_view.cancel')}}",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(){

                        <?php
                        $requestId = $request->session()->get('prompt_alert')['requestId'];

                        $promptPath = public_path("company/driver/income/paid/money/cash/$requestId");

                        $promptPath = explode("/opt/lampp/htdocs",$promptPath);
                        $promptPath = $promptPath[1];
                        ?>

                var link = "<?php  echo $promptPath ?>";


                window.location.href = link;


            });

</script>
<?php
}




}?>



</html>