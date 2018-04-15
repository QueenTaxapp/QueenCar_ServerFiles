<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Request Accepted manually by dispatch admin
 * @api                {post} /dispatch/manual/request/accept  Request Accepted manually by dispatch admin
 * @apiDescription      Request Accepted manually by dispatch admin
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {String}     id
 *@apiParam           {String}     token
 *@apiParam           {Double}     platitude
 *@apiParam           {Double}     plongitude
 *@apiParam           {Double}     dlatitude
 *@apiParam           {Double}     dlongitude
 *@apiParam           {Integer}    payment_opt
 *@apiParam           {Integer}    type
 *@apiParam           {Integer}    user_id
 *@apiParam           {String}     pick_location
 *@apiParam           {String}     drop_location
 *@apiParam           {String}     firstname
 *@apiParam           {String}     lastname
 *@apiParam           {String}     phone_number
 *@apiParam           {String}     driver_id
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Driver start trip",
 *                  "is_driver_started": 1,
 *                  "payment_opt": 1,
 *                  "type": 3,
 *                  "pick_latitude": 11.0146138,
 *                  "pick_longitude": 76.9817354,
 *                  "drop_latitude": 11.0332088,
 *                  "drop_longitude": 76.98,
 *                  "pick_location": "LMS Street, P N Palayam, Coimbatore, Tamil Nadu, India",
 *                  "drop_location": "PSG College of Arts & Science, PSG CAS, Civil Aerodrome Post, Peelamedu, Coimbatore, Tamil Nadu, India",
 *      "user": {
 *                  "id": 43,
 *                  "firstname": "Testonehh",
 *                  "lastname": "One",
 *                  "email": "test1@gmail.com",
 *                  "phone_number": "+918056335103",
 *                  "profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151496344239549.png",
 *                  "review": "4"
 *               }
 *                   }
 *  }
 *
 * @apiErrorExample  {json}       Error-Response:
 *       {
 *           "success": false,
 *           "error_code": "816",
 *           "error_message": "Invalid request",
 *           "exception": "App\\Ship\\Exceptions\\CommonException",
 *       }
 *
 */

$router->post('/dispatch/manual/request/accept', [
    'as'   => 'Dispatch@dispatch_manual_accept_request',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',
    ]
]);
