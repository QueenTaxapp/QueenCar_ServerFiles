@extends('layout::Layout')
@section('content')


    <style type="text/css">
      #map {
        height: 400px;
        width: 80%;
        left: 10px;
      }
      html, body {
        padding: 0;
        margin: 0;
        height: 100%;
      }

      #panel {
        width: 200px;
        font-family: Arial, sans-serif;
        font-size: 13px;
        float: right;
        margin: 10px;
      }

      #color-palette {
        clear: both;
      }

      .color-button {
        width: 14px;
        height: 14px;
        font-size: 0;
        margin: 2px;
        float: left;
        cursor: pointer;
      }

      #delete-button {
        margin-top: 5px;
      }
    </style>



<section>
    <div id="panel">
      <div id="color-palette"></div>
      <div>
        <button id="add-button">Add Shape</button>
        <button id="delete-button">Delete Selected Shape</button>
        <button id="delete-all-button">Delete All Shapes</button>
        <button id="save-button">Save Shape</button>

      </div>
    </div>
    <div id="map"></div>
</section>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk&sensor=false"></script>
{{--//&libraries=drawing--}}
    <script type="text/javascript">
      var drawingManager;
      var all_overlays = [];
      var selectedShape;
      var rectangle_array = [];
      var bounds = {
        north: 44.599,
        south: 44.490,
        east: -78.443,
        west: -78.649
      };

      function setSelection(shape) {
          clearSelection();
          selectedShape = shape;
          shape.setEditable(true);

      }

      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
          selectedShape = null;
        }
      }





      function deleteSelectedShape() {
          if (selectedShape) {
              selectedShape.setMap(null);
          }
      }

      function deleteAllShape() {
        for (var i=0; i < rectangle_array.length; i++)
        {
            rectangle_array[i].setMap(null);
        }
          rectangle_array = [];
      }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.


      /*  var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);*/




      function initialize() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: new google.maps.LatLng(44.599, -78.443),
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          disableDefaultUI: true,
          zoomControl: true
        });


        console.log(rectangle_array);
        // Define the rectangle and set its editable property to true.
        if(rectangle_array.length==0) {

          alert("array of 0");

          rectangle = new google.maps.Rectangle({
            bounds: bounds,
            editable: true,
            draggable: true
          });

          rectangle_array.push(rectangle);
          rectangle_array[0].setMap(map);

            var newShape = rectangle;

            google.maps.event.addListener(newShape, 'click', function() {
                setSelection(newShape);
            });
            setSelection(newShape);

        }
          var j=0;

          google.maps.event.addDomListener(document.getElementById('add-button'), 'click', function(e) {
             j++;

              rectangle =new google.maps.Rectangle({
                  bounds: bounds,
                  editable: true,
                  draggable: true
              });

              var newShape = rectangle;

              google.maps.event.addListener(newShape, 'click', function() {
                  setSelection(newShape);
              });
              setSelection(newShape);

              rectangle_array.push(selectedShape);
              console.log(rectangle_array);

              if(rectangle_array.length==1)
              {
                  j=0;
                  rectangle_array[j].setMap(map);

              }
              else
              {
                  rectangle_array[j].setMap(map);
              }




          });


        google.maps.event.addDomListener(document.getElementById('save-button'), 'click', function(e) {
          alert("saving...");
          //console.log(e.overlay.getBounds().getNorthEast().lat());
          all_overlays=rectangle_array;
          //showNewRect(e.overlay);

         console.log(all_overlays);

        });


        // Clear the current selection when the drawing mode is changed, or when the
        // map is clicked.
        google.maps.event.addListener(map, 'click', clearSelection);

       /* google.maps.event.addDomListener(document.getElementById('add-button'), 'click', addShape);*/

        google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

        google.maps.event.addDomListener(document.getElementById('delete-all-button'), 'click', deleteAllShape);

       /* google.maps.event.addDomListener(document.getElementById('save-button'), 'click', saveShape);*/


      }


      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>

    <script type="text/javascript"> _uacct = "UA-162157-1";urchinTracker();</script>





@endsection