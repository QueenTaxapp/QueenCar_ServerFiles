module.exports = {
    "prefix":"tab_",
    "select_zone_query" : function(message)
    {
        return "SELECT a.id FROM "+this.prefix+"zone a,"+this.prefix+"zone_bound b WHERE a.id = b.zone_id AND b.north >= '"+message.lat+"' AND b.south <= '"+message.lat+"' AND b.east >= '"+message.lng+ "' AND b.west <= '"+message.lng+"' AND a.is_active=1 AND a.deleted_at IS NULL LIMIT 1";
    },
    "get_zone_types": function(id,message)
    {
//console.log("query - "+ "SELECT zone_type.id,type.name,type.icon,zone_type.payment_type, (SELECT CONCAT_WS(',',latitude,longitude) FROM "+this.prefix+"Driver_Details detail,"+this.prefix+"Drivers driver WHERE detail.driver_id IN (SELECT id FROM "+this.prefix+"Drivers d WHERE d.type=zone_type.type_id) AND driver.is_active=1 AND driver.is_available=1 AND driver.is_approve =1  AND driver.id=detail.driver_id AND  ROUND(1 * 3956 * acos( cos( radians('"+message.lat+"') ) * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - radians('"+message.lng+"') ) + sin( radians('"+message.lat+"') ) * sin( radians(detail.latitude) ) ) ,8) < 8 ORDER BY  ROUND(1 * 3956 * acos( cos( radians('"+message.lat+"') ) * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - radians('"+message.lng+"') ) + sin( radians('"+message.lat+"') ) * sin( radians(detail.latitude) ) ) ,8) desc LIMIT 1) as coordinate  FROM "+this.prefix+"zone_type zone_type LEFT JOIN "+this.prefix+"Types type ON type.id=zone_type.type_id WHERE zone_type.zone_id="+id+" AND zone_type.is_active=1 LIMIT 20");
        return "SELECT zone_type.id,type.name,type.icon,zone_type.payment_type, (SELECT CONCAT_WS(',',latitude,longitude) FROM "+this.prefix+"Driver_Details detail,"+this.prefix+"Drivers driver WHERE detail.driver_id IN (SELECT id FROM "+this.prefix+"Drivers d WHERE d.type=zone_type.type_id) AND driver.is_active=1 AND driver.is_available=1 AND driver.is_approve =1  AND driver.id=detail.driver_id AND  ROUND(1 * 3956 * acos( cos( radians('"+message.lat+"') ) * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - radians('"+message.lng+"') ) + sin( radians('"+message.lat+"') ) * sin( radians(detail.latitude) ) ) ,8) < 8 ORDER BY  ROUND(1 * 3956 * acos( cos( radians('"+message.lat+"') ) * cos( radians(detail.latitude) ) * cos( radians(detail.longitude) - radians('"+message.lng+"') ) + sin( radians('"+message.lat+"') ) * sin( radians(detail.latitude) ) ) ,8) desc LIMIT 1) as coordinate  FROM "+this.prefix+"zone_type zone_type LEFT JOIN "+this.prefix+"Types type ON type.id=zone_type.type_id WHERE zone_type.zone_id="+id+" AND zone_type.is_active=1 LIMIT 20";
    },
    "addZoneToDriver": function(message)
    {
        return "UPDATE "+this.prefix+"Driver_Details SET bearing='"+message.bearing+"',latitude='"+message.lat+"',longitude='"+message.lng+"',cur_zone=(SELECT b.id FROM "+this.prefix+"zone_bound a,"+this.prefix+"zone b,"+this.prefix+"Drivers c WHERE a.north >= '"+message.lat+"' AND a.south <= '"+message.lat+"' AND a.east >= '"+message.lng+ "' AND a.west <= '"+message.lng+"' AND b.deleted_at IS NULL AND b.is_active=1 AND a.zone_id=b.id AND c.id="+message.id+" AND c.admin_reference = b.admin_reference  LIMIT 1) WHERE driver_id="+message.id;
    },
    "getDriverByZone":function()
    {

        return "SELECT details.bearing,details.driver_id,details.latitude,details.longitude,details.cur_zone,drivers.type FROM "+this.prefix+"Drivers drivers LEFT JOIN "+this.prefix+"Driver_Details details ON drivers.id=details.driver_id WHERE drivers.is_active=1 AND drivers.is_approve=1 AND drivers.is_available=1 AND drivers.deleted_at IS NULL AND details.cur_zone IN (SELECT `id` FROM "+this.prefix+"zone WHERE is_active=1 AND deleted_at IS NULL) ORDER BY details.cur_zone DESC";
    },
    "getTypePrice":function(message)
    {
        return "SELECT * FROM "+this.prefix+"zone_type WHERE id="+message.type;
    },
    "getrequests":function(message)
    {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
       // console.log("SELECT detail.review as review,user.id,user.firstname,user.lastname,user.email,user.phone_number,user.profile_pic,detail.review,detail.latitude,detail.longitude,place.pick_latitude,place.pick_longitude,place.drop_latitude,place.drop_longitude,place.pick_location,place.drop_location,request.id as request_id,request.request_id as user_request_id FROM "+this.prefix+"request_meta meta,"+this.prefix+"request request LEFT JOIN "+this.prefix+"request_place place ON request.id=place.request_id,"+this.prefix+"User user LEFT JOIN "+this.prefix+"User_detail detail ON user.id=detail.user_id WHERE request.id = meta.request_id AND user.id=meta.user_id AND meta.driver_id="+message.id+" AND meta.is_active=1 AND meta.user_id = request.user_id AND TIME_TO_SEC(TIMEDIFF('"+dateTime+"', meta.updated_at)) <= "+message.settings['driver_time_out']);
        return "SELECT detail.review as review,user.id,user.firstname,user.lastname,user.email,user.phone_number,user.profile_pic,detail.review,detail.latitude,detail.longitude,place.pick_latitude,place.pick_longitude,place.drop_latitude,place.drop_longitude,place.pick_location,place.drop_location,request.id as request_id,request.request_id as user_request_id FROM "+this.prefix+"request_meta meta,"+this.prefix+"request request LEFT JOIN "+this.prefix+"request_place place ON request.id=place.request_id,"+this.prefix+"User user LEFT JOIN "+this.prefix+"User_detail detail ON user.id=detail.user_id WHERE request.id = meta.request_id AND user.id=meta.user_id AND meta.driver_id="+message.id+" AND meta.is_active=1 AND meta.user_id = request.user_id AND TIME_TO_SEC(TIMEDIFF('"+dateTime+"', meta.updated_at)) <= "+message.settings['driver_time_out'];


    },
    "request_status":function(message)
    {

            var today = new Date();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var dateTime = date+' '+time;
            $timeout = message.settings.driver_time_out+message.settings.driver_time_out+60;
            return "SELECT * FROM "+this.prefix+"request_meta meta WHERE request_id="+message.request_id+" AND user_id="+message.id;


    },
    "update_driver_location_trip":function(message)
    {

        return "update "+this.prefix+"Driver_Details set latitude = '"+message.lat+"',longitude = '"+message.lng+"' where driver_id = "+message.id;
    },
    "trip_location_update":function(message)
    {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        var sql ="update "+this.prefix+"Driver_Details set latitude = '"+message.lat+"',longitude = '"+message.lng+"' where driver_id = "+message.id+";";

   return sql;
    },

    "trip_location_path_insert":function(message)
    {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
       var  sql = "insert into "+this.prefix+"trip_location (request_id,latitude,longitude,distance,created_at,updated_at) values ("+message.request_id+",'"+message.lat+"','"+message.lng+"','"+message.distance+"','"+dateTime+"','"+dateTime+"');"
        return sql;
    },
    "update_trip_distance": function(message)
    {
        var sql = "update "+this.prefix+"request"+" SET distance="+message.distance+" where id="+message.request_id;
        return sql;
    }

}

