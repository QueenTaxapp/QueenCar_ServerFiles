@extends('layout::Layout')
@section('content')

<?php
        //echo"<pre>";print_r($request_zone);die();
?>
    <style type="text/css">
        #map {
            height: 500px;
            width: 98%;
            left: 10px;
        }
        html, body {
            padding: 0;
            margin: 0;
            height: 100%;
        }

    </style>


<section id="">

  <div class="container">

        <div class="row">
            <div class="col s12 m12 l12">
                <h4 class="header">{{ trans('localization::lang_view.heat_map')}}</h4>
            </div>

            <div class="col s12 m12 l12">
                <div id="map" class="col l12 left"></div>
            </div>

      </div>
    </div>
</section>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk&sensor=false&libraries=visualization"></script>

    <script type="text/javascript">

        var result=[];
        var all_overlays ={};

        all_overlays = <?php echo (object)$request_zone; ?>;

        var myLatlng = new google.maps.LatLng(all_overlays[0].pick_latitude, all_overlays[0].pick_longitude);
        // map options,
        var myOptions = {
            zoom: 11,
            center: myLatlng
        };




        // standard map
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        // heatmap layer

        var heatmap = new google.maps.visualization.HeatmapLayer({
            data: getPoints(),
            map: map
        });

        function getPoints() {


            for (var item in all_overlays) {

                result.push(new google.maps.LatLng(all_overlays[item].pick_latitude, all_overlays[item].pick_longitude));

            }
           // console.log(result);
            return result;
        }


    </script>



@endsection