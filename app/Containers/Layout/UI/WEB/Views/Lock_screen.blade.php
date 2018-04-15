<?php
        //print_r($request->all());die();
    $id = Session::get('id');
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title> <?php echo App\Containers\Common\GetConfigs::getConfigs('application_name');?></title>

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
    <link href="{{asset('assets/material_css/sweetalert.css')}}" type="text/css" rel="stylesheet">


    <style>
    #abcd
    {
        color: #00bcd4;
        background: white !important;
    }
    #abcd i{
        padding: 0em 0.5em;
    }
    #abcd span
    {
        position: relative;
        top: -4px;
    }
    html {
        /*//background: url() no-repeat center center fixed ;*/

        {{--background: linear-gradient(0deg,hsla(0, 80%, 49%, 0.62),hsla(0, 82%, 16%, 0.43)),url("{{asset('http://tapngo.online/tapgo/public/assets/img/uploads/77040.jpg')}}")no-repeat center center fixed;--}}
        background: linear-gradient(0deg,hsla(0, 0%, 92.9%, 0.6),hsla(0, 0%, 90.2%, 0.4)),url("http://tapngo.online/tapgo/public/assets/img/uploads/77040.jpg")no-repeat center center fixed;

        background-size: cover;
        background-position: center;
        /*background-repeat: no-repeat;*/

        /*-webkit-background-size: cover;*/
        /*-moz-background-size: cover;*/
        /*-o-background-size: cover;*/
        /*background-size: cover;*/
        /*-webkit-filter: blur(1px);*/
        /*-moz-filter: blur(1px);*/
        /*-o-filter: blur(1px);*/
        /*-ms-filter: blur(1px);*/
        /*filter: blur(1px);*/
    }
    </style>

</head>

{{--<body style="background-color: #00bcd4;">--}}
<body style="background-color: inherit;">

<div style="position: absolute;right: 3cm;color: yellow;top: 64px;background-color: inherit;">
    <a class="btn #4dd0e1 cyan lighten-2 col s6" id = "abcd" href="{{ URL::Route('logouta',$id)}}"  >
    <i  class="material-icons">keyboard_tab</i> <span>Logout</span></a>
</div>

 <div class="loaded">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<!-- End Page Loading -->



<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">




        <form class="login-form" action="{{ URL::Route('lockscreenValidationa')}}" method="POST">

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


        </div>
        </form>
    </div>
</div>


<div class="hiddendiv common"></div>
 </div>
</body>
<!-- ================================================
Scripts
================================================ -->

<!-- Compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

{{--<!-- jQuery Library -->--}}
<!--scrollbar-->
<script type="text/javascript" src="{{asset('assets/material_js/perfect-scrollbar.min.js')}}"></script>
<!-- chartjs -->
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('assets/material_js/plugins.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{asset('assets/material_js/custom-script.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/sweetalert.min.js')}}"></script>


<!-- Material Dashboard DEMO methods, don't include it in your project! -->
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
}
?>

</html>


