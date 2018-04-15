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

        #delete-button, #add-button, #delete-all-button, #save-button {
            margin-top: 5px;
        }
    </style>



    <section>
        <div id="panel">
            <div style="float: right;">
                <ul>
                    <li>
                        <a id="add-button" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_zone')}}" >
                            <i class="material-icons">add</i>
                        </a>
                    </li>

                    <li>
                        <a id="delete-button" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.delete_selected_zone')}}" >
                            <i class="material-icons">clear</i>
                        </a>
                    </li>
                    <li>
                        <a id="delete-all-button" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.delete_all_zone')}}" >
                            <i class="material-icons">select_all</i>
                        </a>
                    </li>
                    <li>
                        <a id="save-button" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.save_zone')}}" >
                            <i class="material-icons">save</i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div id="map"></div>
    </section>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk&sensor=false"></script>

    <script type="text/javascript">
        var drawingManager;
        var all_overlays = {};
        var selectedShape;


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

        }

        function deleteSelectedShape() {
            if (selectedShape) {

                delete all_overlays[selectedShape.array_id];

                selectedShape.setMap(null);
            }
            console.log(all_overlays);
        }

        function deleteAllShape() {

            for (var item in all_overlays){
                 all_overlays[item].setMap(null);
            }
            all_overlays = {};
            console.log(all_overlays);
        }



        function initialize() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(44.599, -78.443),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });

            var bounds = {
                north: 44.599,
                south: 44.490,
                east: -78.443,
                west: -78.649
            };

            // Creates a drawing manager attached to the map that allows the user to draw
            // markers, lines, and shapes.


                drawingManager  = new google.maps.Rectangle({
                bounds: bounds,
                editable: true,
                draggable: true
            });



            google.maps.event.addDomListener(document.getElementById('add-button'), 'click', function(e) {

                drawingManager  = new google.maps.Rectangle({
                    bounds: bounds,
                    editable: true,
                    draggable: true
                });

                var len = Math.floor(Math.random() * 1000) + 1;

                drawingManager.setMap(map);
                drawingManager.array_id =len;

                console.log(len);

                all_overlays[len]=drawingManager;
                console.log(all_overlays);

                var newShape = drawingManager;

                google.maps.event.addListener(newShape, 'click', function() {
                    setSelection(newShape);
                });
                setSelection(newShape);

            });


            google.maps.event.addDomListener(document.getElementById('save-button'), 'click', function(e) {

                console.log(all_overlays);
                var res=[];var resul=[];

                for (var item in all_overlays){

                    res = [
                        all_overlays[item].getBounds().getNorthEast().lat(),
                        all_overlays[item].getBounds().getNorthEast().lng(),
                        all_overlays[item].getBounds().getSouthWest().lat(),
                        all_overlays[item].getBounds().getSouthWest().lng()
                    ];

                    resul.push(res);
                    console.log(resul);

                }

                ajax_return(resul);
                res=[]; resul=[];
            });



            // Clear the current selection when the drawing mode is changed, or when the
            // map is clicked.
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
            google.maps.event.addDomListener(document.getElementById('delete-all-button'), 'click', deleteAllShape);

        }
        google.maps.event.addDomListener(window, 'load', initialize);




        function ajax_return(data) {

            $.ajax({
                    url: "{{asset('admin/zone/save')}}",
                    data:{datas:data},
                    success: function(result){
                        console.log(result);
                }
            });

        }



    </script>







@endsection