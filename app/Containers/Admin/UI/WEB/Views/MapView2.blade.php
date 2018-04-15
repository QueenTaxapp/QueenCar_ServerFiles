@extends('layout::Layout')
@section('content')

<?php
    $path =  asset('/admin/map/view');

    //print_r($path);

    $lat = 'App\Containers\Common\GetConfigs'::getconfigs('latitude');
    $longt = 'App\Containers\Common\GetConfigs'::getconfigs('longitude');
    $apk = 'App\Containers\Common\GetConfigs'::getconfigs('google_browser_key');
     //echo "<pre>";print_r($value[0]->firstname);die();
   // print_r('AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk');echo "<pre>";
    //print_r($apk);echo "<pre>";die();
?>
  
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #0e0503;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #ffffff;
        color: #0e0503;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        /*text-overflow: ellipsis;*/
        width: 95%;
      }


      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: ;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
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

           
<div class="col s12 m8 l12">
	<h4 class="header">{{ $title}}</h4>
                                              <!--<input id="pac-input"  type="text" >-->

                    <input id="pac-input" class="controls" type="text" placeholder="{{trans('localization::lang_view.search')}}">
                    <label for="pac-input"></label>
                  

		<div id="profile-card" >
      <div class="card-image waves-effect waves-block waves-light">
          <div id="map" style="position: relative;width: 100%;height:100%;"></div>
      </div> 
    </div>
</div>                    
                            </div>
                        </div>
                    </div>


                <!--end container-->
            </div>
        </section>
     <script>

      var i = 0;

   
      function initAutocomplete() 
      {
        if(i == 0)
        {
          var map = new google.maps.Map(document.getElementById('map'), 
          {
          center: {lat: {{ $lat }}, lng: {{ $longt }} },
          zoom: 3,
          mapTypeId: 'roadmap'
          });
        }
        else
        {
          alert('working');
          var map = window.map2;
        }

  

          
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
       // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
     
        });
        
         var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var driverIcon = 'http://localhost/map/driver-70.png';
        
        var driverOnTrip = 'http://localhost/map/driver_on_trip.png';
        var icons = {
          1: {
            icon: driverIcon 
          },
          library: {
            icon: iconBase + 'library_maps.png'
          },
          0: {
            icon: driverOnTrip
          }
        };


        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];
          


          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              // console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
             // map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

        if(i == 0)
        {
          var features = [];
          <?php

            foreach($value as $val)
            {
              
          ?>                                                                                                                                          
              var person = {lat:<?php echo $val->latitude?> , longt:<?php echo $val->longitude?>, type:<?php echo $val->is_available?> };
              //var person = {lat:<?php echo $val->latitude?> , longt:<?php echo $val->longitude?>, type:'info'};
              
              features.push(person);
          <?php   
            }
          ?>
        }
        else
        {
          var features = [];
           window.fea.forEach(function(fea) 
           {
            
            var person = {lat: fea.latitude, longt:fea.longitude, type:fea.is_available };
            features.push(person);
           });
        }

        console.log(features);

        features.forEach(function(feature) {
            
            // alert(feature.name);
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(feature.lat, feature.longt),
            icon: icons[feature.type].icon,
            map: map
            
          });

        });
        
      i = i+1;
      window.map2 =  map;

      
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $apk }}&libraries=places&callback=initAutocomplete"
         async defer>
    </script> 
    <script>
  


    setInterval(function() 
    {
    // 10 sec
      var ajaxPath = 'http://localhost/tapgo/public/admin/map/ajax';
      //alert (ajaxPath);
    $.ajax({
    method: 'Get', // Type of response and matches what we said in the route
    url:ajaxPath , // This is the url we gave in the route
    // a JSON object to send back
    success: function(response)
    { // What to do if we succeed

    //console.log('response');
    //console.log(response);
      window.fea = response;
      document.cookie = "myJavascriptVar = " + response ;
     // console.log('cookie');
     // console.log(document.cookie);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      //alert('error'); // What to do if we fail
        //console.log(JSON.stringify(jqXHR));
        //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
});

     <?php
     $value = $_COOKIE['myJavascriptVar'];

     
     ?>
     initAutocomplete();
    }, 10000); 
   
    </script>       
    
@endsection


