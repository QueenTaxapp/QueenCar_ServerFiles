
@extends('layout::Layout')
@section('content')
    <?php

    $applicationName = Session::get('applicationName');
    // $a = serialize(
    //  array(
    // '%requestId%'=>array('name'=>'request_id','required'=>'true'),
    // '%appname%'=>array('name'=>'app_name','required'=>'false'),
    // )
    // );
    // print_r($a);
    // die();
    //$y = a:4:{s:8:"%requestId%";a:2:{s:4:"name";s:3:"request_id";s:8:"required";s:4:"true";}s:12:"%first_name%";a:2:{s:4:"name";s:10:"first_name";s:8:"required";s:4:"true";}s:11:"%last_name%";a:2:{s:4:"name";s:9:"last_name";s:8:"required";s:5:"false";}s:11:"%user_name%";a:2:{s:4:"name";s:9:"user_name";s:8:"required";s:4:"true";}}
    //$a = unserialize();
    // $s = serialize(
    // array(
    // '{{time()}}'=>array('name'=>'otp','required'=>'true'),
    // '{{$app_name}}'=>array('name'=>'appname','required'=>'true'),
    // '{{$userName}}'=>array('name'=>'combination of firstname and lastname','required'=>'false'),
    // )
    // );
    //     print_r($s);

    //     die();

    if(isset($_GET['click']))
    {

        $revert =DB::table('Email')->select('revert')->where('id','=',$_GET['click'])->get();

        $revert = $revert[0]->revert;

        DB::table('Email')->where('id','=',$_GET['click'])->update(array('message' => $revert));

        $id = $_GET['click'];
    }
    else
    {
        $id = $value['id'];


    }


    ?>
    <?php

    $string = asset('');

    $url = explode("/public/",$string);

    $url = $url[0];
    // $s=file_get_contents("$url/app/Containers/Email/UI/WEB/Views/UserNewRegister.blade.php");
    // DB::table('911_Email')->update(array('message' => $s));

    // die();


    $value =DB::table('Email')->select('*')->where('id','=',$id)->get();

    //$value =DB::table('911_Email')->select('*')->paginate(1);

    ?>


    <?php


    $s = $value[0]->message;

    // DB::table('911_Email')->update(array('revert' => $s));

    $value = $value[0];
    $value =  (array) $value;



    $string = asset('');

    $url = explode("/public/",$string);

    $url = $url[0];
    ?>
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->


            <div class="row">
                <div class="col s12 m8 l8">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">{{ trans('localization::lang_view.'.$value['title'])}}</span>

                            <span style="position: absolute;float: right;right: 32px;top: 16px;"><a href="{{ URL::Route('email')}}"data-toggle="tooltip" title="{{ trans('localization::lang_view.back_to_view_users_details')}}">{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i> </a></span>
                            <form action="{{ URL::Route('updateemail',$value['id'])}}" method="post"  >
                                <!--onsubmit="return smsHintValidate()"-->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">

                                            <textarea  name="editor" id="ckview" cols="30" rows="10"><?php print_r($s)?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <button id="submit" type="submit" class="btn  waves-effect waves-light right" >{{ trans('localization::lang_view.apply_changes')}}<i class="material-icons right">send</i></button>

                                <span class="btn btn-primary left"> <a class="sweet-revert" style="color:white;"  href="{{  URL::Route('revertemail',$value['id']) }}"><i class="material-icons right">reply</i>{{ trans('localization::lang_view.revert')}}</a> </span>



                                <div class="clearfix"></div>

                            </form>
                        </div>
                    </div>
                </div>




                <div class="col s12 m4 l4">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">
                                 <div id="tab" class="tap-target" data-activates="menu">
                                    <div class="tap-target-content">
                                        <h5>{{ trans('localization::lang_view.hint')}}</h5>
                                        <p>This is used to Listing the values to be added in your content </p>
                                    </div>
                                 </div>

                                 <a class="tooltipped" data-position="top" data-tooltip="{{ trans('localization::errors.click_me_help')}}" onclick="help('menu','tab')">{{ trans('localization::lang_view.hint')}}</a>
                            </span><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <?/*= serialize(
                                                    array(
                                                        '%number%'=>array('name'=>'otp','required'=>'true'),
                                                        '%first_name%'=>array('name'=>'first_name','required'=>'true'),
                                                        '%last_name%'=>array('name'=>'last_name','required'=>'false'),
                                                        '%user_name%'=>array('name'=>'user_name','required'=>'true')
                                                        )
                                            )*/
                                        ?>


                                        <?php

                                        // $s=    serialize(
                                        //             array(
                                        //                 '{{$applicationName}}'=>array('name'=>'name of the app','required'=>'false'),
                                        //                 '{{$value->date}}'=>array('name'=>'current_date','required'=>'true'),
                                        //                 '{{$value->name}}'=>array('name'=>'combination of firstname and lastname','required'=>'true'),

                                        //                 )
                                        //     );
                                        //     print_r($s);

                                        //     die();

                                        //    print_r($value['hint']);


                                        $array=unserialize($value['hint']);


                                        $count=1;

                                        foreach($array as $key => $note){

                                        ?>

                                        <p><?=$key;?>  -  {{ trans('localization::lang_view.'.$note['name'])}}</p>
                                        <input data_key="<?=$key;?>" id="<?=$count;?>" class="req_check" type="hidden" value="<?=$note['required'];?>" >
                                        <?php $count++; }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

        function smsHintValidate(){

            var data=$('#msg').val();

            //console.log(data);

            for(var i=1;i<=$('.req_check').length;i++){

                var req_value=$('#'+i).val();

                var key=$('#'+i).attr('data_key');

                if(req_value=="true"){

                    if(data.search(key)== -1 ){

                        Materialize.toast(key + ' {{ trans('localization::errors.required')}}', 4000);

                        return false;
                    }
                }
            }

        }
        $(document).ready(function () {


        });

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script src="{{url('ckeditor/ckeditor.js')}}"></script>-->
    <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

    <script>


        $(document).ready(function(){
            var ckview = document.getElementById("ckview");
            CKEDITOR.replace(ckview,{
                language:'en-gb'
            });
        });

    </script>
@endsection