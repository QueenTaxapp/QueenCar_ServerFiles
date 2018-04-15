

    <style type="text/css">
        #map {
            height: 400px;
            width: 80%;
            left: 10px;
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

        <h3>My Google Maps Demo</h3>
        <div id="panel">
            <div id="color-palette"></div>
            <div>
                <button id="delete-button">Delete Selected Shape</button>
                <button id="delete-all-button">Delete All Shapes</button>
            </div>
        </div>
        <div id="map"></div>

    </section>


    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=drawing"></script>

    <script type="text/javascript">
        var drawingManager;
        var all_overlays = [];
        var selectedShape;
        var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
        var selectedColor;
        var colorButtons = {};

        function clearSelection() {
            if (selectedShape) {
                selectedShape.setEditable(false);
                selectedShape = null;
            }
        }

        function setSelection(shape) {
            clearSelection();
            selectedShape = shape;
            shape.setEditable(true);
            selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        }

        function deleteSelectedShape() {
            if (selectedShape) {
                selectedShape.setMap(null);
            }
        }

        function deleteAllShape() {
            for (var i=0; i < all_overlays.length; i++)
            {
                all_overlays[i].overlay.setMap(null);
            }
            all_overlays = [];
        }

        function selectColor(color) {
            selectedColor = color;
            for (var i = 0; i < colors.length; ++i) {
                var currColor = colors[i];
                colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
            }

            // Retrieves the current options from the drawing manager and replaces the
            // stroke or fill color as appropriate.
            var polylineOptions = drawingManager.get('polylineOptions');
            polylineOptions.strokeColor = color;
            drawingManager.set('polylineOptions', polylineOptions);

            var rectangleOptions = drawingManager.get('rectangleOptions');
            rectangleOptions.fillColor = color;
            drawingManager.set('rectangleOptions', rectangleOptions);

            var circleOptions = drawingManager.get('circleOptions');
            circleOptions.fillColor = color;
            drawingManager.set('circleOptions', circleOptions);

            var polygonOptions = drawingManager.get('polygonOptions');
            polygonOptions.fillColor = color;
            drawingManager.set('polygonOptions', polygonOptions);
        }

        function setSelectedShapeColor(color) {
            if (selectedShape) {
                if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
                    selectedShape.set('strokeColor', color);
                } else {
                    selectedShape.set('fillColor', color);
                }
            }
        }

        function makeColorButton(color) {
            var button = document.createElement('span');
            button.className = 'color-button';
            button.style.backgroundColor = color;
            google.maps.event.addDomListener(button, 'click', function() {
                selectColor(color);
                setSelectedShapeColor(color);
            });

            return button;
        }

        function buildColorPalette() {
            var colorPalette = document.getElementById('color-palette');
            for (var i = 0; i < colors.length; ++i) {
                var currColor = colors[i];
                var colorButton = makeColorButton(currColor);
                colorPalette.appendChild(colorButton);
                colorButtons[currColor] = colorButton;
            }
            selectColor(colors[0]);
        }

        function initialize() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(22.344, 114.048),
                mapTypeId:  google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });

            var polyOptions = {
                strokeWeight: 0,
                fillOpacity: 0.45,
                editable: true
            };
            // Creates a drawing manager attached to the map that allows the user to draw
            // markers, lines, and shapes.
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                markerOptions: {
                    draggable: true
                },
                polylineOptions: {
                    editable: true
                },
                rectangleOptions: polyOptions,
                circleOptions: polyOptions,
                polygonOptions: polyOptions,
                map: map
            });

            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
                all_overlays.push(e);
                if (e.type != google.maps.drawing.OverlayType.MARKER) {
                    // Switch back to non-drawing mode after drawing a shape.
                    drawingManager.setDrawingMode(null);

                    // Add an event listener that selects the newly-drawn shape when the user
                    // mouses down on it.
                    var newShape = e.overlay;
                    newShape.type = e.type;
                    google.maps.event.addListener(newShape, 'click', function() {
                        setSelection(newShape);
                    });
                    setSelection(newShape);
                }
            });

            // Clear the current selection when the drawing mode is changed, or when the
            // map is clicked.
            google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
            google.maps.event.addDomListener(document.getElementById('delete-all-button'), 'click', deleteAllShape);

            buildColorPalette();
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>

    <script type="text/javascript">
        _uacct = "UA-162157-1";
        urchinTracker();
    </script>






    {{--  <script>
          function initMap() {
              var uluru = {lat: 30.000, lng: -50.000};

              var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 4,
                  center: uluru
              });

              var blueCoords = [
                  {lat: 20.000, lng: -60.000},
                  {lat: 20.000, lng: -40.000},
                  {lat: 40.000, lng: -40.000},
                  {lat: 40.000, lng: -60.000}
              ];

              new google.maps.Polygon({
                  map: map,
                  paths: blueCoords,
                  strokeColor: '#0000FF',
                  strokeOpacity: 0.8,
                  strokeWeight: 2,
                  fillColor: '#0000FF',
                  fillOpacity: 0.35,
                  draggable: true,
                  geodesic: false
              });
          }
      </script>--}}
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk">
    </script>

@endsection

