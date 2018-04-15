<?php

/**
 * @apiGroup           Driver
 * @apiName            DriverLogin
 * @api                {post} /driver/login Driver Login
 * @apiDescription     Driver Login
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     [username]   Email or phone both of them valid username is required when login_method=manual
 * @apiParam           {String}     [password]   password is required when login_method=manual
 * @apiParam           {String}     device_token  Device Id
 * @apiParam           {String}     login_by="android|ios"
 * @apiParam           {String}     login_method="manual|facebook|google"
 * @apiParam           {String}     [social_unique_id]     social_unique_id is required when login_method=facebook|google
 *
 *
 * @apiSuccessExample  {json}       Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *          "success": true,
 *          "success_message" : "Driver_Logged",
 *          "driver": {
 *                   "id": 1,
 *                   "firstname": "user",
 *                   "lastname": "test",
 *                   "email": "test@gmail.com",
 *                   "phone": "+917200704057",
 *                   "login_by": "android",
 *                   "login_method": "manual",
 *                   "token" => "$2y$10$TMWF.x82d2.B8TUFsIqVk.LfYGpJ85EV2P8Ks3vjo6r3F8d047Sni"
 *                   "profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151265277675307.jpg",
 *                   "is_active": 1,
 *                   "is_approve": 1,
 *                   "is_available": 1,
 *                   "car_model":"ew23",
 *                   "car_number":"1233",
 *                   "type_name":"BMW",
 *                   "type_icon":"http:\/\/192.168.1.20\/tabgo\/public\/assets\/img\/uploads\/66185.png"
 *          },
 *          "sos": [
 *          {
 *              "id": 2,
 *              "name": "customer care",
 *              "number": "72007040574"
 *          },
 *          {
 *              "id": 3,
 *              "name": "customer care 3",
 *              "number": "919999999999"
 *          },
 *          {
 *              "id": 7,
 *              "name": "test",
 *              "number": "740145698725"
 *          }
 *         ]
 * }
 *
 */

$router->post('/driver/login', [
    'as'   => 'Driver@driver_login',
    'uses'  => 'Controller@run'
]);
