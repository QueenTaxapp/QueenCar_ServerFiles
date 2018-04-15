<?php


/**
 * @apiGroup           Driver
 * @apiName            Response Request
 * @api                {post} /driver/response Response Request
 * @apiDescription     Response Request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {String}      is_response
 * @apiParam           {String}      request_id
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *  {
 *      "success": true,
 *      "success_message": "Accepted",
 *      "request": {
 *                  "id": 119,
 *                  "trip_start_time": "2017-12-22 12:29:18",
 *                  "is_driver_started": 1,
 *                  "is_driver_arrived": 0,
 *                  "is_trip_start": 0,
 *                  "is_completed": 0,
 *                  "payment_opt": 1,
 *                  "type": 3,
 *                  "pick_latitude": 11.00192799999999948568074614740908145904541015625,
 *                  "pick_longitude": 76.980241000000006579284672625362873077392578125,
 *                  "drop_latitude": 11.00192799999999948568074614740908145904541015625,
 *                  "drop_longitude": 76.980241000000006579284672625362873077392578125,
 *                  "pick_location": "Raheja Enclave, Shuttle Court",
 *                  "drop_location": "Caf\u00e9 Coffee Day",
 *                  "user": {
 *                      "id": 12,
 *                      "firstname": "user",
 *                      "lastname": "test",
 *                      "email": "usertest1@gmail.com",
 *                      "phone_number": "+914321567890",
 *                      "profile_pic": "",
 *                      "review": "2"
 *                  }
 *      }
 *  }
 *
 */

$router->post('/driver/response', [
'as'   => 'Driver@response_for_request',
'uses'  => 'Controller@run',
    'middleware' => [
        'DriverTokenCheck.api',
    ]
]);
