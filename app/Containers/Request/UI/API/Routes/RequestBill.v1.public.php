<?php

/**
 * @apiGroup           Request
 * @apiName            Request Bill
 * @api                {post} /driver/requestBill Request Bill
 * @apiDescription     Request Bill Generate
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token    driver token
 * @apiParam           {Integer}     request_id
 * @apiParam           {String}      distance
 * @apiParam           {String}      before_waiting_time
 * @apiParam           {String}      after_waiting_time
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "bill_generated",
 *      "request": {
 *                  "id": "223",
 *                  "request_id": "RES_45451",
 *                  "distance": "5",
 *                  "time": 1471,
 *                  "bill": {
 *                          "show_bill": 1,
 *                          "base_price": 12,
 *                          "base_distance": 1,
 *                          "price_per_distance": 12,
 *                          "price_per_time": 12,
 *                          "distance_price": 48,
 *                          "time_price": 17412,
 *                          "waiting_price": 360,
 *                          "service_tax": 1783.20,
 *                          "service_tax_percentage": "10",
 *                          "promo_amount": 6241.1999999999998181010596454143524169921875,
 *                          "referral_amount": 100,
 *                          "wallet_amount":0,
 *                          "service_fee": 980.7600000000001045918907038867473602294921875,
 *                          "driver_amount": 18634.4400000000023283064365386962890625,
 *                          "total": 13274,
 *                          "currency":"fr",
 *                          "conversion":"-"
 *                  }
 *                  "user": {
 *                          "id": 40,
 *                          "firstname": "user",
 *                          "lastname": "test",
 *                          "email": "usertest1@gmail.com",
 *                          "phone_number": "+914321567890",
 *                          "profile_pic": "",
 *                          "review": "2"
 *                  }
 *      }
 *  }
 *
 */

$router->post('/driver/requestBill', [
    'as' => 'Request@request_bill',
    'uses' => 'Controller@run',
    'middleware' => [
        'DriverTokenCheck.api',
    ]
]);



