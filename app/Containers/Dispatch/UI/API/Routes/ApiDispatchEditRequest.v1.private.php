<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Edit Schedule Request
 * @api                {post} /dispatch/edit/request Dispatch Edit Request
 * @apiDescription     It is used to edit the schedule request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {Integer}    request_id
 * @apiParam           {Date}       trip_start_time
 * @apiParam           {String}     pick_latitude
 * @apiParam           {String}     pick_longitude
 * @apiParam           {String}     drop_latitude
 * @apiParam           {String}     drop_longitude
 * @apiParam           {String}     pick_location
 * @apiParam           {String}     drop_location
 * @apiParam           {Integer}    type
 * @apiParam           {String}     user_phone_number
 * @apiParam           {Integer}    is_cancelled
 * @apiParam           {String}     user_first_name
 * @apiParam           {String}     user_last_name
 *
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "request_edited_successfully",
 *      "dispatcher": {
 *              "id": 264,
 *              "later": 1,
 *              "zone_id": 2,
 *              "trip_start_time": "1995-06-03 06:39:47",
 *              "current_type": 5,
 *              "created_at": "2018-02-27 11:52:58",
 *              "request_id": "RES_86444",
 *              "is_completed": 0,
 *              "is_cancelled": 0,
 *              "payment_opt": 1,
 *              "is_paid": 0,
 *              "is_trip_start": 0,
 *              "trip_bill": 0,
 *              "pick_latitude": 11.0146138,
 *              "pick_longitude": 76.9817354,
 *              "drop_latitude": 11.0332088,
 *              "drop_longitude": 76.98,
 *              "pick_location": "LMS Street, P N Palayam, Coimbatore, Tamil Nadu, India",
 *              "drop_location": "PSG College of Arts & Science, PSG CAS, Civil Aerodrome Post, Peelamedu, Coimbatore, Tamil Nadu, India",
 *              "user_first_name": "vicky",
 *              "user_last_name": "test",
 *              "user_id": 75,
 *              "driver_first_name": null,
 *              "driver_last_name": null
 *                      }
 *  }
 *
 *
 *
 *
 *
 *
 *
 * @apiErrorExample  {json}       Error-Response:
 *  {
 *      "success": false,
 *      "error_code": 803,
 *      "error_message": "Request not registered",
 *      "exception": "App\\Ship\\Exceptions\\CommonException",
 *  }
 *
 *
 *
 */
$router->post('/dispatch/edit/request', [
    'as'   => 'Dispatch@dispatch_edit_request',
    'uses'  => 'Controller@run',
    'middleware' => [
        //   'DispatchTokenCheck.api',
    ]
]);
