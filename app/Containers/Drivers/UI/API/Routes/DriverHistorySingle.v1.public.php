<?php


/**
 * @apiGroup           Driver
 * @apiName            Driver History Single
 * @api                {post} /driver/historySingle  Driver History Single
 * @apiDescription     Driver History Single
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {Integer}     request_id
 * @apiParam           {String}      token   driver token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 * {
 *      "success": true,
 *      "success_message": "driver_single_history",
 *      "request": {
 *                  "id":193,
 *                  "request_id":"RES_53018",
 *                  "pick_latitude": 11.0146178999999992953462424338795244693756103515625,
 *                  "pick_longitude": 76.98150440000000571671989746391773223876953125,
 *                  "drop_latitude": 11.014487100000000197042027139104902744293212890625,
 *                  "drop_longitude": 76.9811641000000008716597221791744232177734375,
 *                  "pick_location": "44, LMS Street, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
 *                  "drop_location": "44, LMS Street, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
 *                  "trip_start_time": "2017-12-27 16:20:00",
 *                  "is_completed": 1,
 *                  "is_cancelled": 0,
 *                  "payment_opt":1,
 *                  "driver_id": 2,
 *                  "user":{
 *                          "id":114,
 *                          "firstname":"bala",
 *                          "lastname":"usrr",
 *                          "profile_pic":"",
 *                          "review":"1",
 *                          "phone_number":"+919043950570",
 *                          "email":"ganesh.nplus@gmail.com"
 *                  },
 *                  "car_model": "bmw35",
 *                  "car_number": "746456",
 *                  "driver_type": 3,
 *                  "type_icon": "http://192.168.1.20/tabgo/public/assets/img/uploads/66185.png",
 *                  "distance": 5,
 *                  "time": 1471,
 *                  "bill": {
 *                          "base_price": 12,
 *                          "base_distance": 1,
 *                          "price_per_distance": 12,
 *                          "price_per_time": 12,
 *                          "distance_price": 48,
 *                          "time_price": 17412,
 *                          "waiting_price": 360,
 *                          "service_tax": 1783.200000000000045474735088646411895751953125,
 *                          "service_tax_percentage": 10,
 *                          "promo_amount": 6241.1999999999998181010596454143524169921875,
 *                          "referral_amount": 100,
 *                          "service_fee": 980.759999999999990905052982270717620849609375,
 *                          "driver_amount": 18634.43999999999869032762944698333740234375,
 *                          "total": 13274,
 *                          "currency":"$",
 *                          "show_bill":1
 *                  }
 *      }
 * }
 *
 */

$router->post('/driver/historySingle', [
    'as'   => 'Driver@driver_single_history',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DriverTokenCheck.api',
    ]
]);
