<?php
        if(!Session::has('applicationName')  || !Session::has('logo'))
        {
            $path = asset('config.json');
            $specificAdmin = @get_headers($path);

            if($specificAdmin[0] == 'HTTP/1.1 200 OK')
            {
                $file = file_get_contents($path);

                $fileValue = json_decode($file);

        

                foreach($fileValue as $key => $value)
                {
                    foreach($value as $ke=> $val)
                    {

                        if($val->title == 'application_name')
                        {
                            $applicationName = $val->value;
                            Session::put('applicationName',$applicationName); 
                        }
                        if($val->title == 'logo')
                        {
                            $logo = $val->value;
                            Session::put('logo',$logo);
                        }

                    }
                }
            
             }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title> {{Session::get('applicationName')}}</title>
    <!-- Favicons-->
    <link rel="icon" href="../../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->

    <link href="{{asset('assets/material_css/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets/material_css/style.css')}}" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="{{asset('assets/material_css/custom.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/material_css/page-center.css')}}" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('assets/material_css/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet">
    <link href="https://pixinvent.com/materialize-material-design-admin-template/css/themes/semi-dark-menu/materialize.css" type="text/css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.css" type="text/css" rel="stylesheet">
</head>

<body class="cyan loaded">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        
            <form class="login-form" action="{{ URL::Route('companyLoginValidation')}}" method="POST">
            <div class="row">

                <div class="input-field col s12 center">
                    <img src="{{Session::get('logo')}}" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">{{Session::get('applicationName')}}</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <i class="material-icons prefix pt-5">person_outline</i>
                    <!--<input id="email" type="text">-->

                    <input  id="email" type="email" name="emailAddress"  >

                    <label for="email" class="center-align">Email Address</label>
                 
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="material-icons prefix pt-5">lock_outline</i>
                    
                    <input  id="password" type="password" name="password" > </input>
                    <label for="password">Password</label>
                   
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-3">
                    <!--<input id="remember-me" type="checkbox">-->
                    <input id="remember-me" type="checkbox"  name="rememberMe" value="remember-me">
                    <label for="remember-me">Remember me</label>
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
<!-- ================================================
Scripts
================================================ -->

<div class="hiddendiv common"></div>

</body>
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->

<script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/material_js/materialize.min.js')}}"></script>

<!--scrollbar-->
<script type="text/javascript" src="{{asset('assets/material_js/perfect-scrollbar.min.js')}}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{asset('assets/material_js/plugins.js')}}"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="{{asset('assets/material_js/custom-script.js')}}"></script>
<?php

    if($request->session()->has('errors'))
    {

        $alertMessage = $request->session()->get('errors')->all()[0];
?>
<script>
var alertMessage = "<?php echo $alertMessage ?>";

  Materialize.toast(alertMessage, 4000);
</script>
<?php
    }

    if($request->session()->has('success'))
    {
        $successMessage = $request->session()->get('success')["message"];
?>
<script>
        var successMessage = "<?php echo $successMessage ?>";

        Materialize.toast(successMessage, 4000);       
</script>
<?php
    }
    
    if(Session::has('logout'))
    {
        ?>
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
<?php
    }
?>


</html>

