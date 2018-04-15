@extends('layout::Layout')
@section('content')


    <style type="text/css">
        #map {
            height: 400px;
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
                <h4 class="header"><?=$zoneName->name;?>
                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('zoneView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_zone_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                </h4>
            </div>

            <div class="col s12 m12 l12">
                <div id="map" class="col s12 m12 l12 left"></div>
            </div>

      </div>
    </div>
</section>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk&sensor=false&libraries=places"></script>

    <script type="text/javascript">
        var drawingManager;
        var all_overlays = {};
        all_overlays= <?php echo (object)$zonemap; ?>;


console.log(all_overlays);



        function initialize() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 9,
                center: new google.maps.LatLng(all_overlays[0].north, all_overlays[0].east),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });

            for (var item in all_overlays){

                var bounds = {
                    north: all_overlays[item].north,
                    south: all_overlays[item].south,
                    east: all_overlays[item].east,
                    west: all_overlays[item].west
                };

                drawingManager  = new google.maps.Rectangle({
                    bounds: bounds,
                    editable: false,
                    draggable: false
                });


                drawingManager.setMap(map);
            }

        }
        google.maps.event.addDomListener(window, 'load', initialize);


    </script>







@endsection