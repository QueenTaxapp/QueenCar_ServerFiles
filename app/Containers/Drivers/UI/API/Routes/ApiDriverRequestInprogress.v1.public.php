<?php


/**
 * @apiGroup           Driver
 * @apiName            Driver Request InProgress
 * @api                {post} /driver/requestInprogress  Driver Request InProgress
 * @apiDescription     Driver Request InProgress
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id     driver id
 * @apiParam           {String}      token    driver token
 *
 * @apiSuccessExample  {json}    Success-Response: when trip in progress
 *   HTTP/1.1 200 OK
 *{
 *  "success": true,
 *  "success_message": "driver request inprogress",
 *  "request": {
 *      "inprogress": true,
 *      "trip": true,
 *      "id": 199,
 *      "request_id": "RES_32917",
 *      "pick_latitude": 11.014628200000000646241460344754159450531005859375,
 *      "pick_longitude": 76.98148489999999810606823302805423736572265625,
 *      "drop_latitude": 11.014487100000000197042027139104902744293212890625,
 *      "drop_longitude": 76.9811641000000008716597221791744232177734375,
 *      "pick_location": "44, LMS Street, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
 *      "drop_location": "44, LMS Street, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
 *      "time_left": "100",
 *      "user": {
 *          "id": 37,
 *          "firstname": "Mani",
 *          "lastname": "kandan",
 *          "email": "manikandan.s@gmail.com",
 *          "phone_number": "+917200640335",
 *          "profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151324767935725.png",
 *          "review": "4"
 *      }
 *  },
 *  "driver_status":
 *  {
 *      "is_active": 1,
 *      "is_approve": 1,
 *      "is_available": 1
 *  },
 *  "sos": [
 *      {
 *      "id": 2,
 *      "name": "customer care",
 *      "number": "72007040574"
 *      },
 *      {
 *      "id": 4,
 *      "name": "police",
 *      "number": "100456987"
 *      }
 *  ]
 *}
 *
 *
 *@apiSuccessExample  {json}    Success-Response: when trip is started
 *   HTTP/1.1 200 OK
 *{
 *  "success": true,
 *  "success_message": "driver request inprogress",
 *  "request":
 *  {
 *      "inprogress": false,
 *      "trip": true,
 *      "id": 199,
 *      "request_id": "RES_32917",
 *      "trip_start_time": "2017-12-25 05:47:47",
 *      "is_driver_started": 1,
 *      "is_driver_arrived": 0,
 *      "is_trip_start": 0,
 *      "is_completed": 0,
 *      "is_cancelled": 0,
 *      "payment_opt": 1,
 *      "is_paid": 0,
 *      "driver_rated": 0,
 *      "pick_latitude": 11.014628200000000646241460344754159450531005859375,
 *      "pick_longitude": 76.98148489999999810606823302805423736572265625,
 *      "drop_latitude": 11.014487100000000197042027139104902744293212890625,
 *      "drop_longitude": 76.9811641000000008716597221791744232177734375,
 *      "pick_location": "44, LMS Street, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
 *      "drop_location": "44, LMS Street, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
 *      "user": {
 *          "id": 37,
 *          "firstname": "Mani",
 *          "lastname": "kandan",
 *          "email": "manikandan.s@gmail.com",
 *          "phone_number": "+917200640335",
 *          "profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151324767935725.png",
 *          "review": "4"
 *      }
 *  },
 *  "driver_status":
 *  {
 *      "is_active": 1,
 *      "is_approve": 1,
 *      "is_available": 0
 *  },
 *  "sos": [
 *      {
 *      "id": 2,
 *      "name": "customer care",
 *      "number": "72007040574"
 *      },
 *      {
 *      "id": 4,
 *      "name": "police",
 *      "number": "100456987"
 *      }
 *  ]
 *}
 *
 *
 *@apiSuccessExample  {json}    Success-Response: when no trip
 *   HTTP/1.1 200 OK
 *{
 *  "success": true,
 *  "success_message": "driver request inprogress",
 *  "request":
 *  {
 *      "trip": false,
 *  },
 *  "driver_status":
 *  {
 *      "is_active": 1,
 *      "is_approve": 1,
 *      "is_available": 0
 *  },
 *  "sos": [
 *      {
 *      "id": 2,
 *      "name": "customer care",
 *      "number": "72007040574"
 *      },
 *      {
 *      "id": 4,
 *      "name": "police",
 *      "number": "100456987"
 *      }
 *  ]
 *}
 */

$router->post('/driver/requestInprogress', [
    'as'   => 'Driver@driver_request_inProgress',
    'uses'  => 'Controller@run',
    'middleware' => [
         'DriverTokenCheck.api',
    ]
]);
