<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="material/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="material/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>911 User Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Twitter Card data -->

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

	


    <link href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
<style>
    .card .card-header{
        box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        margin: -20px 15px 0;
        border-radius: 3px;
        padding: 15px;
        background-color: #ec407a;
    }

    .row {
        clear: both;

    }
    .full-page:before {
        background-color: rgba(0, 0, 0, 0.5);

    }
   body {
       background-image: url({{asset('assets/img/logins.jpeg')}});
       background-size: cover;

    }
    #form{
        color: #ec407a;
    }
    .remember
    {
        
        padding-bottom: 10px;
        margin: 15px 0 0 20px;
    }

</style>
</head>

<body>
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">

    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="blue" data-image="login.jpeg">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">

                        <form action="{{ URL::Route('userLoginValidation')}}" method="POST">
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
<!--
trans('store::notifications.welcome')-->

                                    <h4 class="card-title">{{ trans('localization::login.login') }}</h4>
                                    <div class="social-line">
                                        {{--<a href="#btn" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#eugen" class="btn btn-just-icon btn-simple">
                                            <i class="fa fa-google-plus"></i>
                                        </a>--}}
                                    </div>
                                </div>
                                {{--<p class="category text-center">
                                    Or Be Classical
                                </p>--}}
                                <div class="card-content">

                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">{{ trans('localization::login.email') }}</label>
                                            <input type="email" name="emailAddress" class="form-control">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">{{ trans('localization::login.password') }}</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        
                                    </div>
                                    <!--<div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons"></i>
                                            </span>-->
                                        <!--<div class="remember">
                                        <input type="checkbox" name="remember" value="remember"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  Remember Password <br>
                                         </div>
                                    </div>-->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    
                                    <div class="checkbox">
										<label>
											<input type="checkbox" name="remember" value="remember">{{ trans('localization::login.remember password') }} <br>
										</label>
									</div>
                                <div class="footer text-center">
                                    <button id="form" type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">{{ trans('localization::login.letsgo') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
</body>

<!--   Core JS Files   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>





<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>


<!-- Material Dashboard javascript methods -->

<script src="{{asset('assets/js/material-dashboard.js')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/js/demo.js')}}"></script>








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
 demo.showNotification('top','center','danger','warning', '<?php echo $request->session()->get('errors')->all()[0]; ?>');
</script>
<?php
        }

        if($request->session()->has('success'))
        {
?>
<?php $error = $request->session()->get('success')["message"]; ?>
<script>
 demo.showNotification('top','center','danger','warning', '<?php echo $request->session()->get('success')["message"]?>');
 console.log();
</script>
<?php
        }

}
?>

</html>