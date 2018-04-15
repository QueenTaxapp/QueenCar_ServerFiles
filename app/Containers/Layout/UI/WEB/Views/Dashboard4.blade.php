@extends('layout::Layout')
@section('content')

    <?php

//    echo "<pre>";
//            print_r($values);die();
            $colorArray = array('card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text','card gradient-45deg-red-pink gradient-shadow min-height-100 white-text','card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text','card gradient-45deg-green-teal gradient-shadow min-height-100 white-text');
    $id = Session::get('id');
    $ajaxPath = asset('drag/ajax/AdminPrivilageAjax.php');

    $name = 'admin'.$id;

    $filePath = asset('privileges/admins/'.$name.'.json');


    $fullPath = asset('privileges/admins/'.$name.'.json');

    $filePath = './../../privileges/admins/'.$name.'.json';

    //$selected = $selected['dashboard'];

    $unselected = $unselected;

    //echo "<pre>";print_r($value);die();

    ?>
    <div class="edit-button" style="right: 90px;top: 3px;">
        <a  id = "draggable" data-activates="chat-out"  class="btn-floating btn-large red waves-effect waves-block waves-light chat-collapse"  ><i class="large material-icons" >mode_edit</i></a>




    </div>
    <section id="content">
        <!--start container-->
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
                <div class="row">

                    <?php

                   // echo "<pre>";print_r($values);die();
             $i = 0;$j=1;


             foreach($values as $key => $value)
             {
                    if(!array_key_exists('chart',$value)){
                      ?>

                        <div class="col s12 m6 l3">
                            <div style="min-height: 150px !important;" class="<?php echo "$colorArray[$i]" ;$i++?>">
                                <div class="padding-4">
                                    <div class="col s7 m7">
                                        <i class="material-icons background-round mt-5">{{$value['icon']}}</i>
                                        <p>{{ trans('localization::new_lang_view.'.$key)}}</p>
                                    </div>
                                    <div class="col s5 m5 right-align">
                                        <h5 class="mb-0">{{$value['value']}}</h5>
                                        <p class="no-margin">{{ trans('localization::new_lang_view.'.$value['subvalue'])}}</p>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($i == 4)
                        {
                            $i = 0;
                        }
                    }
                    else
                   {

                        if($j == 1){?>
                        </div>
                            <div class="row">
                       <?php }

//
//                       if(count($values) > 3)
//                       {


                     ?>


                        <div class="col s12 m12 l6">
                            <div class="col s12 m12 l12">
                                <p><?=trans('localization::lang_view.'.$key);?></p>
                            </div>
                            <div class="col s12  m12 l12">
                                <div id="<?=$value['chart'];?>" style="height: 250px;"></div>
                            </div>
                        </div>
<?php
                               //} // count if
?>

           <?php  $j++; }
             }

                           ?>
                    </div>
            </div>




            </div>
    </section>

    <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation right-aligned ps-container ps-active-y" style="transform: translateX(100%);">
            <span style="color:#fff;font-weight:bold;position:absolute;margin: 10px">{{ trans('localization::lang_view.select_dashboard')}}</span>
            <li class="li-hover">
                <div class="card" style="overflow: visible;margin:40px 20px 0;">
                <div class="col s6 m6 l6">

                    <div class="input-field">
                        <select id='multi-value' class='' multiple='multiple' >
                            <?php

                            if(!empty($unselected))
                            {
                            foreach($unselected as $key =>$value)
                            {

                            ?>
                            <option value = "{{$value}}" >{{ trans('localization::lang_view.'.$value)}}</option>

                            {{$value}}
                            <?php
                            }
                            }

                            if(!empty($selected))
                            {


                            foreach($selected as $key =>$value)
                            {
                            ?>
                            <option value = "{{$key}}" selected>{{ trans('localization::lang_view.'.$key)}}</option>
                           {{-- <option value = "{{$key}}" selected>{{ trans('localization::lang_view.'.$key)}}</option>--}}
                            <?php
                            }
                            }

                            ?>
                        </select>
                        <label for="multi-value"></label>
                    </div>
                </div>
                    </div>
                <div id="button"  data-role="button" class="btn cyan waves-effect waves-light right">{{ trans('localization::lang_view.save_dashboard')}} </div>
                   <!--<a href="{{URL::Route('dashboard',$id)}}">  <i class="material-icons right">send</i></a>-->
                </div>
            </li>
            <div class="ps-scrollbar-x-rail in-scrolling" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 292px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 88px;"></div></div></ul>
    </aside>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">

       // document.addEventListener("DOMContentLoaded", function(event) {

       $(document).ready(function(){

            new Morris.Area({
                // ID of the element in which to draw the chart.
                element: 'areachart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: [
                    <?php


                            foreach ($values['no_of_drivers_registered'] as $key=>$js)
                            {

                                if($key != 'chart' )
                                {
                                    echo "{date:'" . $js['date'] . "',count:" . $js['count'] . "},";
                                }

                            }



                    ?>
                ],
                // The name of the data record attribute that contains x-values.
                xkey: 'date',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['count'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Count']
            });
        });

        document.addEventListener("DOMContentLoaded", function(event) {



            new Morris.Line({
                element: 'linechart',
                data: [<?php


                    foreach($values['no_of_users_registered'] as $key=> $js)
                    {
                        if($key != 'chart' )
                        {
                            echo "{date:'".$js['date']."',count:".$js['count']."},";
                        }


                    }


                    ?> ],


                xkey: 'date',
                ykeys: ['count'],
                labels: ['Count']
            });

           // new Morris.Bar({
          //     element: 'barchart',
        //        data: [<?php //foreach($json as $js){ echo "{date:'".$js['date']."',count:".$js['count']."},"; }?> ],
      //          xkey: 'date',
    //            ykeys: ['count'],
  //              labels: ['Count']
//            });

      //      new Morris.Donut({
    //            element: 'donutchart',
  //              data: [<?php //foreach($json as $js){ echo "{label:'".$js['date']."',value:".$js['count']."},"; }?> ]
//            });

        });

    </script>
    <script type="text/javascript" src="{{asset('assets/material_js/jquery-3.2.1.min.js')}}"></script>
    <script>
        $("#button").click( function()
        {

            var foo = $('#multi-value').val();

            var myJsonString = JSON.stringify(foo);

            var ajaxPath = "<?php echo $ajaxPath?>";

            var filePath = "<?php echo $filePath?>";

            var fullPath = "<?php echo $fullPath?>";

            var data =
            {
                filePath : filePath,

                fullPath : fullPath,

                value    : foo
            };

            $.ajax(
                    {
                        url: ajaxPath,
                        data:data,
                        method: "POST",
                        success : function(result)
                        {
                            location.reload();
                            Materialize.toast("{{trans('localization::errors.dashboard_saved_successfully')}}", 4000);

                        }
                    });
        });


    </script>


@endsection
