
@extends('layout::Layout')
@section('content')



    <?php
    /* If the time is less than 1200 hours, show good morning */


    $billArray = array('base_price','distance_price','time_price','waiting_price','service_tax','referral_amount','promo_amount','total');



    $billDescription = array('distance_price'=>'price_per_distance','time_price'=>'price_per_time');
    $billHighLight = array('referral_amount','promo_amount','total');
    $head = array('total');
    $timestamp = explode(" ",$value['trip_start_time']);


    //     echo "<pre>";
    // print_r($timestamp);
    // die();
    $timestamp = strtotime($timestamp[0]);
    $day = date('D', $timestamp);


    $date = explode("-",$value['trip_start_time']);


    $year = $date[0];


    $month = date('F', mktime(0, 0, 0, $date[1], 10)); // March

    $dayInNumber = explode(" ",$date[2]);
    $time = $dayInNumber[1];
    $dayInNumber = $dayInNumber[0];

    $time = substr($time,0,5);

    $hour = explode(":",$time)[0];




    if ($hour < "12")
    {
        // "Good morning";
        $a =  url('images/3.png');
        $b =  url('images/3.png');
    }
    else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($hour >= "12" && $hour < "17")
        {
            //  $a =  "Good afternoon";
            $a =  url('images/afternoon2.jpg');
            $b =  url('images/afternoon2.jpg');
        }
        else
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($hour >= "17" && $hour < "19")
            {
                // $a =  "Good evening";
                $a =  url('images/eve.jpg');
                $b =  url('images/eve.jpg');
            }
            else
                /* Finally, show good night if the time is greater than or equal to 1900 hours */
                if ($hour >= "19")
                {
                    //  $a =  "Good night";
                    $a =  url('images/nig1.jpg');
                    $b =  url('images/nig1.jpg');

                }

    ?>


    <style>


        .header_new2{
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }
        #request_name
        {
            text-align: left;
            padding-top: 15px;
            padding-right: 5px;
            padding-bottom: 15px;
            padding-left: 15%;
        }
        .bill_name
        {
            text-align: left;
            padding-top: 15px;
            padding-right: 5px;
            padding-bottom: 15px;
            padding-left: 15%;

        }
        th
        {
            text-align: center;
        }

        td
        {
            text-align: center;
        }

        .pagination li.active
        {
            width: 30px;
        }
        .reveal
        {
            text-align: left;
            margin-left: 451px;
            /*margin-top: -30px;*/
        }

        .card-reveal
        {
            text-align: left;
            /*margin-left: 391px;*/
        }
        .title-heading
        {
            margin-left: -920px;
            margin-top: -333px;

        }

        .title-heading-driver
        {
            margin-left: -399px;
            margin-top: -333px;
        }
        #center
        {

            text-align: center;
        }

        #map-card-reveal
        {
            margin-left: 0cm;
            padding-left: 40%;
            text-align: left;

        }
        .total
        {
            font-weight: 400;
            font-size: 25px;
        }
        .indicators li { visibility: hidden; }

        @-moz-document url-prefix()
        {
            .title-heading
            {

                margin-left: -920px;
                margin-top: -323px;



            }

            .title-heading-driver
            {
                margin-left: -439px;
                margin-top: -333px;
            }
            .reveal
            {
                text-align: left;
                margin-left: 431px;
                /*margin-top: -40px;*/
            }
            .card-reveal
            {
                text-align: left;

                /*margin-left: 391px;*/
            }

        }

        h6 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 34px; font-weight: bold; letter-spacing: -1px; line-height: 1; margin: 10px 30px 16px;}

        h6 { color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 34px; font-weight: bold; letter-spacing: -1px; line-height: 1; margin: 10px 30px 16px;}
        .blue
        {

            background: linear-gradient(to right, #DE6262, #FFB88C);
            background: linear-gradient(to right, #d53369,#333333);
            background: linear-gradient(to right, #f857a6,#ff5858);
            background: linear-gradient(to right, #1098f7,#2878ec);


        }

    </style>





    <section id="content">
        <div class="container">

            <div id="map"></div>
            <div class="card-image waves-effect waves-block waves-light">
                <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142">
                </div>
            </div>


            <div class="col s12 m12 l12">
                <div class="card">

                    <div class="card blue">
                        <h6> {{trans('localization::lang_view.location') }}</h6>
                        <!-- <h4 class="header_new2" data-background-color="red">Location</h4> -->

                    </div>

                    <div class="card-content">
                        <table id="table" class="bordered ">
                            <thead>
                            <tr>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.pickup_location')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.drop_location')}}</th>
                            </tr>
                            <tr>
                                <td class="" colspan="11">{{$value['pick_location']}}</td>
                                <td class="" colspan="11">{{$value['drop_location']}}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div class="col s12 m12 l12">
                <div class="card">

                    <div class="card blue">
                        <h6> {{trans('localization::lang_view.request') }}</h6>

                        <!-- <h4 class="header_new2" data-background-color="red">Location</h4> -->

                    </div>

                    <div class="card-content">
                        <table id="table" class="bordered ">
                            <thead>
                            <tr>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.type')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.zone')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.start_time')}}</th>
                            </tr>
                            <tr>
                                <td class="" colspan="11">{{$value['type']}}</td>
                                <td class="" colspan="11">{{$value['zone_name']}}</td>
                                <td class="" colspan="11">{{$value['trip_start_time']}}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div class="col s12 m12 l12">
                <div class="card">

                    <div class="card blue">

                        <h6> {{trans('localization::lang_view.client_details') }}</h6>

                        <!-- <h4 class="header_new2" data-background-color="red">Location</h4> -->

                    </div>

                    <div class="card-content">
                        <table id="table" class="bordered ">
                            <thead>
                            <tr>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.name')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.email')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.phone_number')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.address')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.rating')}}</th>

                            </tr>
                            <tr>
                                <td class="" colspan="11">{{$value['user_name']}}</td>
                                <td class="" colspan="11">{{$value['user_email']}}</td>
                                <td class="" colspan="11">{{$value['user_phone_number']}}</td>
                                <td class="" colspan="11">{{$value['user_address']}}</td>
                                <td class="" colspan="11">
                                    <p>
                                        {{ round( $value['user_rating'] )  }}<i class="material-icons" style="font-size: 15px;">star_border</i>
                                    </p>
                                </td>
                            </tr>
                            </thead>
                        </table>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 4 -->
            <div class="col s12 m12 l12">
                <div class="card">

                    <div class="card blue">

                        <h6> {{trans('localization::lang_view.driver_details') }}</h6>

                        <!-- <h4 class="header_new2" data-background-color="red">Location</h4> -->

                    </div>

                    <div class="card-content">
                        <table id="table" class="bordered ">
                            <thead>
                            <tr>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.name')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.email')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.phone_number')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.address')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.rating')}}</th>

                            </tr>
                            <tr>
                                <td class="" colspan="11">{{$value['driver_name']}}</td>
                                <td class="" colspan="11">{{$value['driver_email']}}</td>
                                <td class="" colspan="11">{{$value['driver_phone_number']}}</td>
                                <td class=" " colspan="11">{{$value['driver_address']}}</td>
                                <td class="" colspan="11">
                                    <p>
                                        {{ round( $value['driver_rating'] )  }}<i class="material-icons" style="font-size: 15px;">star_border</i>
                                    </p>
                                </td>
                            </tr>
                            </thead>
                        </table>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 4 -->

        <?php
        if($bill != null)
        {
        ?>
        <!-- 5 -->


            <div class="col s12 m12 l12">
                <div class="card">

                    <div class="card blue">

                        <h6> {{trans('localization::lang_view.bill_details') }}</h6>

                        <!-- <h4 class="header_new2" data-background-color="red">Location</h4> -->

                    </div>

                    <div class="card-content">
                        <table id="table" class="bordered ">
                            <thead>
                            <tr>
                                <th data-field="id center" id = 'request_name' colspan="11">{{ trans('localization::lang_view.name')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.description')}}</th>
                                <th data-field="id center" colspan="11">{{ trans('localization::lang_view.amount')}}</th>
                            </tr>
                            <?php
                            foreach($billArray as $billKey)
                            {
                            if(in_array($billKey,$billHighLight))
                            {
                            ?>
                            <tr class = "no-result <?php if($billKey == 'total'){echo 'total Highlight';}?>">
                            <?php
                            }
                            else
                            {
                            ?>
                            <tr class = "<?php if($billKey == 'total'){     echo 'Highlight total ';}?>">
                                <?php
                                }
                                ?>


                                <td class="bill_name" colspan="11">{{ trans('localization::lang_view.'.$billKey)}}</td>
                                <td class="" colspan="11">

                                    <?php
                                    if(array_key_exists($billKey,$billDescription))
                                    {
                                        echo $value['zone_currency'] .' '. $bill[$billDescription[$billKey]].' / '.$unit;
                                    }

                                    ?>

                                </td>
                                <td class="" colspan="11">
                                    <?php


                                    if($bill[$billKey] == '')
                                    {

                                        echo $value['zone_currency'].' '."00.00";
                                    }
                                    else
                                    {


                                        echo $value['zone_currency'].' '.$bill[$billKey];
                                    }
                                    ?>

                                </td>

                            </tr>
                            <?php
                            }
                            ?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 5 -->
            <?php
            }
            ?>
</div>

    </section>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>

                $(document).ready(function()
                {
                    $('.carousel').carousel();

                    $('.carousel.carousel-slider').carousel({fullWidth: true}).on('slid.bs.carousel', function (e) {
                        console.log('slide event!');
                    });

                });


                $(window).on('resize', function (){
                    $wHeight = $(window).height();
                    $item.height($wHeight);
                });

            </script>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk"></script>
            <script type="text/javascript" src="{{url('map/vectormap-script.js')}}"></script>
            <!--google map-->
            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <!--card-advanced.js - Page specific JS-->
            <script type="text/javascript" src="../../js/scripts/dashboard-analytics.js"></script>
            <!--custom-script.js - Add your own theme custom JS-->
            <script type="text/javascript" src="../../js/custom-script.js"></script>




            <script type="text/javascript">

                var area1,area2,icon1,icon2;
                var path1 = 'http://localhost/tapgo/public/map/end_pin_flag.png';
                var path2 = 'http://localhost/tapgo/public/map/start_pin_flag.png';

                area1 = "<?php echo $value['pick_location'] ;?>";

                area2 = "<?php echo $value['drop_location'] ;?>";

                icon1 = "<?php echo url('map/start_pin_flag.png') ;?>";

                icon2 = "<?php echo url('map/end_pin_flag.png') ;?>";

                var locations = [
                    [area1, <?php echo $value['pick_latitude']?>, <?php echo $value['pick_longitude']?>,icon1 ],
                    [area2, <?php echo $value['drop_latitude']?>, <?php echo $value['drop_longitude']?>, icon2],
                ];

                var map = new google.maps.Map(document.getElementById('map-canvas'), {
                    zoom: 10,
                    center: new google.maps.LatLng(locations[1][1], locations[1][2]),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                var markers = new Array();
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        icon: locations[i][3],
                        map: map
                    });
                    markers.push(marker);
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
                function AutoCenter() {
                    //  Create a new viewpoint bound
                    var bounds = new google.maps.LatLngBounds();
                    //  Go through each...
                    $.each(markers, function (index, marker) {
                        bounds.extend(marker.position);
                    });
                    //  Fit these bounds to the map
                    map.fitBounds(bounds);
                }
                AutoCenter();




            </script>
@endsection
