const io = require('socket.io')(3001);
const redis = require('socket.io-redis');
const database = require('./custom_mysql');
const query = require('./custom_query');
var http = require('https');
var node_settings = {};
const settings = require('./settings_file');
var user_socket=[];
var driver_socket=[];
var trip_distance=[];






settings.kickStartSettings();





io.adapter(redis({ host: 'localhost', port: 6379 }));

var userNode = io.of('/php/user');

userNode.on('connection',function(socket){

    socket.on('transfer_msg', function (message) {

        var jsonIobj=message;
        if(jsonIobj.type == "user")
        {
            if(user_socket["user"+jsonIobj.id])
            {
                user_socket["user"+jsonIobj.id].emit(jsonIobj.event,jsonIobj.message);
            }
        }
        if(jsonIobj.type == "driver")
        {
            if(driver_socket["driver"+jsonIobj.id])
            {
                driver_socket["driver"+jsonIobj.id].emit(jsonIobj.event,jsonIobj.message);
            }
        }
    });

});






var nsp = io.of('/home');

nsp.on('connection', function(socket){

    socket.on('disconnect', function (message) {


        user_socket["user"+socket.serverId]='';

        nsp.adapter.clientRooms(socket.id, function(err, rooms)  {
            if(rooms != null)
            {
                nsp.adapter.remoteLeave(socket.id, roomName, function(err) {
                    if (err) { /* unknown id */ }


                });
            }
        });

    });

    socket.on('start_connect', function(message)
        {
            var JsonInObj = JSON.parse(message);
            socket.serverId = JsonInObj.id;

            user_socket["user"+JsonInObj.id]=socket;
            //console.log('***************************************done***************************'+user_socket["user"+JsonInObj.id]);
           // user_socket["user"+JsonInObj.id].emit("trip_status",{'test':'test'});

        }
    );



    socket.on('types',function(message){



        var jsonIobj = JSON.parse(message);

        database.select(query.select_zone_query(jsonIobj),function(result){
            if(result.length != 0)
            {


                var roomName = "room"+result[0].id;

                nsp.adapter.clientRooms(socket.id, function(err, rooms)  {


                    if(rooms != null)
                    {
                        rooms.forEach(function(element) {
                            nsp.adapter.remoteLeave(socket.id, roomName, function(err) {
                                if (err) { /* unknown id */ }


                            });
                        });
                    }

                    nsp.adapter.remoteJoin(socket.id, roomName, function(err)  {
                        if (err) { /* unknown id */ }

                    });




                });


                database.select(query.get_zone_types(result[0].id,jsonIobj),function(result)
                {

                    var des="";
                    result.forEach(function (item) {
                        if(item.coordinate != null)
                        {

                            des +=item.coordinate;
                            des +="|";
                        }

                    })

                    var dur_status=true;

                    if(des == '')
                    {
                         dur_status=false;
                    }



                 /*   var response={};
                    response.types=[];
                    var i=0;
                    result.forEach(function (item) {
                        var payment;
                        if(item.payment_type == 'all')
                        {
                            payment=["all"];
                        }
                        else
                        {
                            payment=item.payment_type.replace(/'/g,"").split(',');

                        }
                        response['types'][i]={};
                        response['types'][i]["id"]=item.id;
                        response['types'][i]["name"]=item.name;
                        response['types'][i]["icon"]=item.icon;
                        response['types'][i]["review"]=item.review;
                        response['types'][i]["payment_type"]=payment;
                        if(item.coordinate == null)
                        {
                            response['types'][i]["duration"]="--";
                        }
                        else {
                            response['types'][i]["duration"]="1 mins";
                        }

                        i++;
                    });

                    response['success']=true;

                    socket.emit('types',response);*/



                    var options = {
                        host: 'maps.googleapis.com',
                        path: '/maps/api/distancematrix/json?units=imperial&origins='+jsonIobj.lat+','+jsonIobj.lng+'&destinations='+des+'&key='+settings.config['google_browser_key'],
                        port : '443'
                    };

                    callback = function(response) {
                        var str = '';

                        //another chunk of data has been recieved, so append it to `str`
                        response.on('data', function (chunk) {
                            str += chunk;
                        });


                        //check the value of duration
                        function check_duration(i,data)
                        {
                            if(dur_status == true) {

                                if (data.status == "OK" && data.rows[0].elements.length > i) {

                                    return data.rows[0].elements[i].duration.text;
                                }
                                else
                                {
                                    return "--";
                                }

                            }
                            else
                            {
                                return "--";
                            }
                        }


                        //the whole response has been recieved, so we just print it out here
                        response.on('end', function () {
                            var data = JSON.parse(str);
                            var dur_status=true;
                            if(data.rows.length == 0)
                            {

                                dur_status=false;
                            }

                            var response={};
                            response.types=[];
                            var i=0;
                            result.forEach(function (item) {
                                var payment;
                                if(item.payment_type == 'all')
                                {
                                    payment=["all"];
                                }
                                else
                                {
                                    payment=item.payment_type.replace(/'/g,"").split(',');

                                }
                                response['types'][i]={};
                                response['types'][i]["id"]=item.id;
                                response['types'][i]["name"]=item.name
                                response['types'][i]["icon"]=item.icon;
                                response['types'][i]["payment_type"]=payment;
                                response['types'][i]["duration"]=check_duration(i,data);
                               // response['types'][i]["duration"]=dur_status==true?data.rows[0].elements[i].duration.text:"1 mins";
                                i++;
                            });

                            response['success']=true;
console.log(response);

                            socket.emit('types',response);
                        });
                    }

                    http.request(options, callback).end();
                })


            }

            else {
                var keys = Object.keys(socket.adapter.rooms);
                keys.forEach(function(item)
                {
                    if(item != socket.id)
                    {
                        socket.leave(item);
                    }
                });
                var response={};
                response.success=false;
                response.error_code="800";
                response.error_message="No Service For This location";
                socket.emit('types',response);
            }
        });

    });







    setInterval(function(){

        database.select(query.getDriverByZone(),function(result)
        {
            var response=[];
            var i=1;
            result.forEach(function(value){
                data={};
                data.id=value.driver_id;
                data.latitude=value.latitude;
                data.longitude=value.longitude;
                data.type=value.type;
                data.bearing=value.bearing;
                if(response[value.cur_zone] == null)
                {
                    response[value.cur_zone]=[];
                }
                response[value.cur_zone].push(data);


                i++;
            })

            nsp.adapter.allRooms(function(err,rooms){




                if(rooms.length != 0)
                {
                    rooms.forEach(function(item, index){
                        response["res"]={};
                        if(item.search("room") != -1)
                        {
                            zone=item.replace("room","");
                            response["res"]["success"]=true;
                            if(!response[zone])
                            {
                                response["res"]["cars"]=[];
                            }else {
                                response["res"]["cars"]=response[zone];
                            }
                            nsp.to(item).emit('get_cars',response["res"]);
                        }
                    })
                }
            });
        });
    },15000);


});










var driverNode = io.of('/driver/home');





driverNode.on('connection', function(socket)
{




    socket.on('trip_location',function(message)
    {

        var JsonInObj = JSON.parse(message);


        if(JsonInObj.trip_start == 0) //not start trip
        {
            database.update(query.update_driver_location_trip(JsonInObj),function(){});
            if(user_socket["user"+JsonInObj.user_id])
            {
                var response = {success:true,lat:JsonInObj.lat,lng:JsonInObj.lng,bearing:JsonInObj.bearing,trip_start:JsonInObj.trip_start,distancee:0};

                user_socket["user"+JsonInObj.user_id].emit('trip_status',response);
            }
        }

        if(JsonInObj.trip_start == 1)
        {


            var distance,last_lat,last_lng;


            if(!trip_distance[JsonInObj.request_id])
            {
                distance=0;
                last_lat=0;
                last_lng=0;

            }
            else {
                distance=trip_distance[JsonInObj.request_id]['distance'];
                last_lat=trip_distance[JsonInObj.request_id]['last_lat'];
                last_lng=trip_distance[JsonInObj.request_id]['last_lng'];
            }

            if(last_lat != 0)
            {
                var unit = "K";
                var radlat1 = Math.PI * last_lat/180
                var radlat2 = Math.PI * JsonInObj.lat/180
                var theta = last_lng-JsonInObj.lng
                var radtheta = Math.PI * theta/180
                var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                dist = Math.acos(dist)
                dist = dist * 180/Math.PI
                dist = dist * 60 * 1.1515
                if (unit=="K") { dist = dist * 1.609344 }
                if (unit=="N") { dist = dist * 0.8684 }
                var new_distance = dist;


                distance = distance + new_distance;
                last_lat = JsonInObj.lat;
                last_lng = JsonInObj.lng;
                JsonInObj.distance=distance;

            }
            else {
                JsonInObj.distance=0;

            }
            database.update(query.trip_location_update(JsonInObj),function(){});
            database.update(query.trip_location_path_insert(JsonInObj),function(){});
            database.update(query.update_trip_distance(JsonInObj),function(){});

            if(last_lat != 0)
            {
                trip_distance[JsonInObj.request_id]['distance']=distance;
                trip_distance[JsonInObj.request_id]['last_lat']=last_lat;
                trip_distance[JsonInObj.request_id]['last_lng']=last_lng;
            }
            else {
                trip_distance[JsonInObj.request_id]=[];
                trip_distance[JsonInObj.request_id]['distance'] =0;
                trip_distance[JsonInObj.request_id]['last_lat'] = JsonInObj.lat;
                trip_distance[JsonInObj.request_id]['last_lng']=JsonInObj.lng;
            }



            socket.emit("trip_status_driver",{success:true,distance:distance});

            if(user_socket["user"+JsonInObj.user_id])
            {


                var response = { success:true,lat:JsonInObj.lat,lng:JsonInObj.lng,bearing:JsonInObj.bearing,distancee:distance,trip_start:JsonInObj.trip_start};
                user_socket["user"+JsonInObj.user_id].emit('trip_status',response);
            }



        }




    });

    socket.on('disconnect', function (message) {
       //    var JsonIObj = JSON.parse(message);
        driver_socket["driver"+socket.serverId]='';

    });

    socket.on('start_connect', function(message)
        {
           // console.log("error_msg :"+message);
            var JsonInObj = JSON.parse(message);
            socket.serverId = JsonInObj.id;

            driver_socket["driver"+JsonInObj.id]=socket;

        }
    );


    socket.on("set_location",function(message)
    {



        var JsonIObj = JSON.parse(message);

        JsonIObj.settings=settings.config;
        database.select(query.getrequests(JsonIObj),function(result){
            if(result.length != 0)
            {
                var response = {};
                response.success = true;
                response.request={};
                /*response.request.id=result.request_id;
                response.request.id=result.request_id;*/
                response['request']['id']=result[0].request_id;
                response['request']['request_id']=result[0].user_request_id;
                response['request']['pick_latitude']=result[0].pick_latitude;
                response['request']['pick_longitude']=result[0].pick_longitude;
                response['request']['drop_latitude']=result[0].drop_latitude;
                response['request']['drop_longitude']=result[0].drop_longitude;
                response['request']['pick_location']=result[0].pick_location;
                response['request']['drop_location']=result[0].drop_location;
                response['request']['time_left']=settings.config['driver_time_out'];

                response['request']['user']={};
                response['request']['user']['id']=result[0].id;
                response['request']['user']['firstname']=result[0].firstname;
                response['request']['user']['lastname']=result[0].lastname;
                response['request']['user']['email']=result[0].email;
                response['request']['user']['phone_number']=result[0].phone_number;
                response['request']['user']['profile_pic']=result[0].profile_pic;
                response['request']['user']['review']=result[0].review;
                socket.emit('driver_request',response);
            }
            else {
                database.select(query.addZoneToDriver(JsonIObj),function(result){
                    if(result.affectedRows ==1)
                    {
                    }
                });
            }

        });



    });

});






