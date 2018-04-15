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
            margin-top: 100px;
        }

        #delete-button, #add-button, #delete-all-button, #save-button {
            margin-top: 5px;
        }
        #pac-input {
            background-color: #f7f7f7;
            font-size: 15px;
            font-weight: 300;
            margin-top: 10px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            height: 25px;
            width: 70%;
            border: 1px solid #c7c7c7;
        }

    </style>


    <section id="">

        <div class="container">

        <div class="row">
            <div class="col s12 m12 l12">
                <h4 class="header">{{ trans('localization::lang_view.add_zone')}}
                    <span class="back-button" style="float: right;"><a class="tooltipped" href="{{  URL::Route('zoneView') }}" data-position="left" data-delay="50" data-tooltip="{{ trans('localization::lang_view.click_here_to_go_zone_view_page')}}" >{{ trans('localization::lang_view.back')}}<i class="material-icons">reply</i></a></span>
                </h4>
            </div>

            <?php if($zone_admin_key == 0){ ?>
            <div class="col s12 m12 l12">
                <div class="input-field col s12 m6 l6">
                    <select name="zoneAdmin" id="zone_admin" required >
                        <option value="" >{{ trans('localization::lang_view.select')}}</option>
                        <?php
                        foreach($zone_admins as $value){ ?>
                        <option value="<?=$value->admin_key;?>" > <?php echo $value->area_name;?></option>
                        <?php }; ?>

                    </select>
                    <label for="zone_admin" class="">{{ trans('localization::lang_view.select_area_for_this_zone')}} <sup>*</sup></label>
                </div>
            </div>
            <?php }else{ ?>
            <input id="zone_admin" name="zoneAdmin" type="hidden" value="<?=$zone_admin_key;?>" >
            <?php } ?>

            <div class="col s12 m12 l12">
                <div class="input-field col s12 m6 l6">
                    <select name="currency" id="currency" required >
                        <option value="">{{ trans('localization::lang_view.select')  }}</option>
                        <?php
                        foreach ($currency as $value)
                        {
                        ?>
                        <option value="{{$value->id}} {{$value->symbol}}" >{{$value->name}}  {{$value->symbol}}</option>
                        <?php
                        }
                        ?>
                    </select>

                    <label for="currency">{{ trans('localization::lang_view.select_currency')}} <sup>*</sup></label>

                </div>

                <div class="input-field col s12 m6 l6">
                    <select name="unit" id="unit" required >

                        <option value="1" > {{trans('localization::lang_view.kilometer')}}</option>
                        <option value="0" > {{trans('localization::lang_view.miles')}}</option>

                    </select>

                    <label for="unit">{{ trans('localization::lang_view.select_unit')}} <sup>*</sup></label>

                </div>
            </div>


            <div class="col s12 m12 l12">
                <div class="input-field offset-l col s10 m10 l9">
                    <input name="zoneName" id="zone_name" type="text" value="" class="validate" required >
                    <label for="zone_name">{{ trans('localization::lang_view.zone_name')}} <sup>*</sup></label>
                </div>

            </div>

                <div class="col s12 m12 l12">

                    <div id="map" class="col s9 m9 l9 left"></div>

                    <div id="" class="col s2 m2 l2 right">
                        <div style="float: right;">
                            <ul>
                                <li>
                                    <a id="add-button" class="btn-floating zone-add-btn btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.add_zone')}}" >
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>

                                <li>
                                    <a id="delete-button" class="btn-floating zone-delete-btn btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.delete_selected_zone')}}" >
                                        <i class="material-icons">clear</i>
                                    </a>
                                </li>
                                <li>
                                    <a id="delete-all-button" class="btn-floating zone-delete-all-btn btn-large waves-effect waves-light tooltipped" data-position="left" data-delay="50" data-tooltip="{{trans('localization::lang_view.delete_all_zone')}}" >
                                        <i class="material-icons">select_all</i>
                                    </a>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <input id="pac-input" class="controls" type="text" placeholder="{{trans('localization::lang_view.search_box')}}" />
                    <div class="col s12 l10"> <br>
                        <button id="save-button" class="btn save-btn cyan waves-effect waves-light right" type="submit" name="save">{{ trans('localization::lang_view.save_zone')}}
                            <i class="material-icons right">send</i>
                        </button>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAgkO8chMIq3JSKLXwTTRuP7ByhkL3Wzxk&sensor=false&libraries=places"></script>

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

        function decvalue(map)
        {
            switch (map.getZoom())
            {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                    return 9;
                    break;
                case 5:
                    return 4.9;
                    break;
                case 6:
                    return 2.5;
                    break;
                case 7:
                    return 1.5;
                    break;
                case 8:
                    return 0.5;
                    break;
                case 9:
                    return 0.1;
                    break;
                case 10:
                case 11:
                    return 0.06;
                    break;
                case 12:
                    return 0.03;
                    break;
                case 13:
                case 14:
                    return 0.01;
                    break;
                case 15:

                    return 0.005;
                    break;
                case 16:
                case 17:
                    return 0.001;
                    break;
                case 18:
                case 19:
                case 20:
                    return 0.0001;
                    break;
                case 21:
                case 22:
                    return 0.00001;
                    break;
                default:
                    return map.getZoom()*0.0001;
            }
        }



        function initialize() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: new google.maps.LatLng(44.599, -78.443),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true
            });
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                var bounds = new google.maps.LatLngBounds();

                var ne = map.getBounds().getNorthEast();
                var sw = map.getBounds().getSouthWest();
                console.log(ne.lat,ne.lng());//

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



            google.maps.event.addDomListener(document.getElementById('add-button'), 'click', function(e) {

                var ne = map.getCenter();

                var dec = decvalue(map);
                console.log(map.getZoom());
                var north =  ne.lat();
                var south = ne.lat()-dec;
                var east = ne.lng();
                var west = ne.lng()-dec;

                var bounds = {
                    north: north,
                    south: south,
                    east: east,
                    west: west
                };
                console.log(ne.lat,ne.lng());//

                drawingManager  = new google.maps.Rectangle({
                    bounds: bounds,
                    editable: true,
                    draggable: true
                });

                var len = Math.floor(Math.random() * 1000) + 1;

                drawingManager.setMap(map);
                drawingManager.array_id =len;

                //console.log(len);

                all_overlays[len]=drawingManager;
                //console.log(all_overlays);

                var newShape = drawingManager;

                google.maps.event.addListener(newShape, 'click', function() {
                    setSelection(newShape);
                });
                setSelection(newShape);

            });


            google.maps.event.addDomListener(document.getElementById('save-button'), 'click', function(e) {

                console.log(all_overlays);
                var res=[];
                var resul=[];
                var name = document.getElementById('zone_name').value;
                var zoneAdmin = document.getElementById('zone_admin').value;
                var currency = document.getElementById('currency').value;
                var unit = document.getElementById('unit').value;


                if(name==""){

                    Materialize.toast("{{trans('localization::errors.zone_name_required')}}", 4000);

                    return false;
                }

                if(zoneAdmin==""){

                    Materialize.toast("{{trans('localization::errors.zone_admin_name_required')}}", 4000);

                    return false;
                }

                if(currency==""){

                    Materialize.toast("{{trans('localization::errors.zone_currency_required')}}", 4000);

                    return false;
                }

                if(Object.keys(all_overlays).length <= 0){
                    Materialize.toast("{{trans('localization::errors.atleast_one_zone_required')}}", 4000);

                    return false;
                }

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

                ajax_return(resul,name,zoneAdmin,currency,unit);
                res=[]; resul=[];
            });



            // Clear the current selection when the drawing mode is changed, or when the
            // map is clicked.
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
            google.maps.event.addDomListener(document.getElementById('delete-all-button'), 'click', deleteAllShape);

        }
        google.maps.event.addDomListener(window, 'load', initialize);




        function ajax_return(data,name,zoneAdmin,currency,unit) {

            $.ajax({
                    url: "{{asset('admin/zone/save')}}",
                    data:{name:name,datas:data,zoneAdmin:zoneAdmin,currency:currency,unit:unit},
                    success: function(result){
                        console.log(result);
                        console.log("zone added successfully");
                        window.location.assign("{{asset('admin/zone/view')}}");
                }
            });

        }



    </script>







@endsection