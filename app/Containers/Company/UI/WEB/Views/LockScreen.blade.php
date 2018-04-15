<?php
    $id = Session::get('id');
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{Session::get('applicationName')}} </title>
    <!-- Favicons-->
    <link rel="icon" href="../../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{asset('assets/material_css/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/style.css')}}" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="{{asset('assets/material_css/custom.css')}}"  type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/page-center.css')}}" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('assets/material_css/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
    <style>
    #abcd
    {
        color:#06090b;;
    }
    </style>

</head>

<body style="background-color: #00bcd4;">
<div style="position: absolute;right: 3cm;color: yellow;top: 64px;background-color:#00bcd4 ;">
    <a class="btn #4dd0e1 cyan lighten-2 col s6" id = "abcd" href="{{ URL::Route('logouta',$id)}}"  >
    <i  class="material-icons">keyboard_tab</i> Logout</a>
</div>

 <div class="cyan loaded">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<!-- End Page Loading -->



<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
 



        <form class="login-form" action="{{ URL::Route('companyLockScreenValidation')}}" method="POST">

            <div class="row">
                <div class="input-field col s12 center">
                <?php
                    if( $result->profilePicture == null)
                    {
                ?>
                    <img src="{{asset('assets/material_icon/avatar/avatar-7.png')}}" alt="" class="circle responsive-img valign profile-image-login cyan">
                <?php
                    }
                    else
                    {
                ?>
                <img src="{{ $result->profilePicture }}" alt="" class="circle responsive-img valign profile-image-login cyan">
                <?php        
                    }
                ?>
                    
                    <h4 class="header">{{$result->name}}</h4>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="emailAddress" value="{{$result->emailAddress}}">

                    <i class="material-icons prefix pt-5">lock_outline</i>
                    <input  id="password" type="password" name="password" > </input>
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button id="form" type="submit" class="btn waves-effect waves-light col s12">{{ trans('localization::login.letsgo') }}</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                
                   

                </div>
            </div>

        </form>
        </div>

    </div>
</div>


<div class="hiddendiv common"></div>

</body>
<!-- ================================================
Scripts
================================================ -->

<script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/materialize.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/perfect-scrollbar.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/plugins.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/custom-script.js')}}"></script>

<script src="{{asset('assets/js/demo.js')}}"></script>

<script>

  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};


</script>

<script>
/* break back button */                                                                        
window.onload=function(){                                                                      
  var i=0; var previous_hash = window.location.hash;                                           
  var x = setInterval(function(){   
                                                                 
    i++; window.location.hash = "/noop/" + i;                                                  
    if (i==48){clearInterval(x);                                                               
      window.location.hash = previous_hash;}                                                   
  },1);
 
}
</script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

</script>

</html>


