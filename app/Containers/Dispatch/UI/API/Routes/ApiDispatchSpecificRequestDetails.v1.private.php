<?php





/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Specific Request Details New
 * @api                {post} /dispatch/specific/request/details  Dispatch Specific Request Details New
 * @apiDescription     this api is used to get the details of the specific request NEW
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {Integer}    request_id
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Request_details",
 *      "request": {
 *                  "id": 260,
 *                  "later": 0,
 *                  "trip_start_time": null,
 *                  "current_type": 5,
 *                  "created_at": "2018-02-27 11:41:12",
 *                  "request_id": "RES_85879",
 *                  "is_completed": 0,
 *                  "is_cancelled": 0,
 *                  "payment_opt": 1,
 *                  "is_paid": 0,
 *                  "is_trip_start": 0,
 *                  "trip_bill": 0,
 *                  "pick_latitude": 11.0146138,
 *                  "pick_longitude": 76.9817354,
 *                  "drop_latitude": 11.0332088,
 *                  "drop_longitude": 76.98,
 *                  "pick_location": "LMS Street, P N Palayam, Coimbatore, Tamil Nadu, India",
 *                  "drop_location": "PSG College of Arts & Science, PSG CAS, Civil Aerodrome Post, Peelamedu, Coimbatore, Tamil Nadu, India",
 *                  "user_first_name": "saravana",
 *                  "user_last_name": "test",
 *                  "driver_first_name": null,
 *                  "driver_last_name": null
 *                  },
 *       "driver_types_available_on_zone": [
 *                  {
 *                      "driver_type_id": 3,
 *                      "driver_type_name": "test"
 *                  },
 *                  {
 *                      "driver_type_id": 5,
 *                      "driver_type_name": "BMW"
 *                  }
 *                                          ]
 *  }
 *
 */

    $router->post('/dispatch/specific/request/details', [
        'as'   => 'Dispatch@dispatch_specific_request_details',
        'uses'  => 'Controller@run',
        'middleware' => [
            //'DispatchTokenCheck.api',

        ]
    ]);
