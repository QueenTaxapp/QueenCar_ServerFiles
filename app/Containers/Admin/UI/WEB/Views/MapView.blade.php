@extends('layout::Layout')
@section('content')

<?php
    $path =  asset('/admin/map/view');

    //print_r($path);

    $lat = 'App\Containers\Common\GetConfigs'::getConfigs('latitude');
    $longt = 'App\Containers\Common\GetConfigs'::getConfigs('longitude');
    $apk = 'App\Containers\Common\GetConfigs'::getConfigs('google_browser_key');
     //echo "<pre>";print_r($value[0]->firstname);die();
   // print_r('AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk');echo "<pre>";
    //print_r($apk);echo "<pre>";die();
?>
  
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
          width:98%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #legend {
          font-family: Arial, sans-serif;
          background: #fff;/*transparent;*/
          padding: 5px;
          margin: 5px;
          border: 3px solid #000;
          width:80px;
          font-size: 10px;
      }
      #legend h5 {
          margin-top: 0;
          font-size: 15px;
      }
      #legend img {
          vertical-align: middle;
          width:15px;
          height:15px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
          background-color: #f7f7f7;
          font-size: 15px;
          font-weight: 300;
          margin-top: 10px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          height: 25px;
          width: 400px;
          border: 1px solid #c7c7c7;
          border-bottom: none;
          border-radius: 10px;
      }

      #pac-input:focus {
          border-color: #4d90fe;
          margin-top:50px;
          transition: 1s ease all;

      }




:-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #909;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    #909;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    #909;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    #909;
}
::-ms-input-placeholder { /* Microsoft Edge */
   color:    #909;
}
    </style>

       <section id="content">
            <!--start container-->
            <div class="container">
                <!--card stats start-->

                    <div class="row">

                        <div class="col s12 m12 l12">

                            <div id="bordered-table">
                            <!--<h4 class="header">title</h4><br>-->
                                <div class="col s12 m12 l12">

                                    <h4 class="header">{{ $title}}</h4>



                                    <div id="map"></div>
                                    <div class="input-field col s6">
                                        <input id="pac-input" class=" controls" type="text" placeholder="{{trans('localization::lang_view.search_box')}}" />
                                    </div>
                                    <div id="legend"><h5>{{trans('localization::lang_view.legend')}}</h5></div>

                                </div>

                            </div>

                        </div>

                    </div>


            </div>

       </section>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk&sensor=false&libraries=places"></script>

<script>

    var marker;
    var markers = [];

    var image="";
    var contentString="";

    var driverIcon = '{{asset('assets/icon/driver_available.png')}}';
    var driverOnTrip = '{{asset('assets/icon/driver_on_trip.png')}}';
    var ajaxPath = '{{asset('admin/map/ajax')}}';

    var driverNotInTrip = {};

    console.log(driverNotInTrip);

    var offTripIcon = {
        url: driverIcon
       /* size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)*/
    };

    var onTripIcon = {
        url: driverOnTrip
       /* size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)*/
    };

    function initialize() {

        var map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 2,
                    center: new google.maps.LatLng({{$lat}},{{$longt}}),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);

        var legend = document.getElementById('legend');
            var name_one = "{{trans('localization::lang_view.available')}}";
            var name_two = "{{trans('localization::lang_view.on_a_trip')}}";
            var icon_one = driverIcon;
            var icon_two = driverOnTrip;
            var div = document.createElement('div');
            var div_two = document.createElement('div');
            div.innerHTML = '<img src="' + icon_one + '"> ' + name_one;
            legend.appendChild(div);
            div_two.innerHTML = '<img src="' + icon_two + '"> ' + name_two;
            legend.appendChild(div_two);

        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

        map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);

        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            var bounds = new google.maps.LatLngBounds();

            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }

            });
            map.fitBounds(bounds);
        });

        function intervals() {

            $.ajax({
                method: 'Get',
                url: ajaxPath,

                success: function (response) {
                    console.log(response);
                    driverNotInTrip = response;
                    var infowindows = [];

                    for (var item in driverNotInTrip)
                    {
                        if(driverNotInTrip[item].is_available == 1){
                            image = offTripIcon;
                        }else{
                            image = onTripIcon;
                        }
                        var contentString = '<p><?php echo trans('localization::lang_view.name')." : ";?>'+driverNotInTrip[item].name+'</p>'+
                                '<p><?php echo trans('localization::lang_view.phone_number')." : ";?>'+driverNotInTrip[item].phone+'</p>'+
                                '<p><?php echo trans('localization::lang_view.type')." : ";?>'+driverNotInTrip[item].type+'</p>';

                        /* markers.push(new google.maps.Marker(
                                {//   map: map,
                                    icon: image,
                                    title: driverNotInTrip[item].name,
                                    position: new google.maps.LatLng(driverNotInTrip[item].latitude,driverNotInTrip[item].longitude)//place.geometry.location
                                }));
                       infowindows.push(new google.maps.InfoWindow({
                            content: contentString
                        }));*/

                        marker = new google.maps.Marker(
                                {//   map: map,
                                    icon: image,
                                    title: driverNotInTrip[item].name,
                                    position: new google.maps.LatLng(driverNotInTrip[item].latitude,driverNotInTrip[item].longitude)//place.geometry.location
                                });

                        markers.push(marker);

                        marker.setMap(map);

                        var infowindow = new google.maps.InfoWindow({
                            /*pixelOffset: new google.maps.Size(-20,0)*/
                        });

                        google.maps.event.addListener(marker,'click', (function(marker,contentString,infowindow) {
                            return function() {
                                infowindow.setContent(contentString);
                                infowindow.open(map,marker);

                            };
                        })(marker,contentString,infowindow));

                    }


                    console.log(infowindows); console.log(markers);


                 /*   for (var marker in markers)
                    {
                        console.log("hai|"+markers[marker]);
                        markers[marker].setMap(map);

                        /!*markers[marker].addListener('click', function(e) {

                            for(var i=0;i<infowindows.length;i++){
                                console.log(infowindows);
                                infowindows[i].open(map, markers[marker]);

                            }
                        });*!/

                    }*/

                   /* for(var i=0;i<markers.length;i++){

                        markers[i].addListener('click', function(e) {

                            console.log(infowindows);

                            infowindows[i-1].open(map,markers[i]);

                        });

                    }
*/

                    setTimeout(function () {
                        deleteAllMarkers();
                        intervals();
                    }, 10000);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //alert('error'); // What to do if we fail
                    //console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });


        }

        intervals();
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    function deleteAllMarkers() {

        for(var i=0;i<markers.length;i++){
            markers[i].setMap(null);
       }

     /* for (var item in markers){
            markers[item].setMap(null);
        }
        markers = [];
        console.log(markers);*/
    }

</script>
    
@endsection


