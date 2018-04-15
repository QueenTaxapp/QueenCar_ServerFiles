<?php
/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Request & driver Details
 * @api                {post} /dispatch/request/status Dispatch Request & driver Details
 * @apiDescription     it is used to get  Dispatch Request & driver Details
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {String}     id
 *@apiParam           {String}     token
 *@apiParam           {Integer}    request_id

 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": "true",
 *      "success_message": "request_status",
 *      "request": {
 *              "id": 1,
 *              "user_id": 43,
 *              "driver_id": 0,
 *              "is_driver_started": 0,
 *              "is_driver_arrived": 0,
 *              "is_trip_start": 0,
 *              "is_completed": 0,
 *              "is_cancelled": 1
 *                  },
 *         "driver": {}
 *  }
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": "true",
 *      "success_message": "request_status",
 *      "request": {
 *              "id": 1,
 *              "user_id": 43,
 *              "driver_id": 2,
 *              "is_driver_started": 0,
 *              "is_driver_arrived": 0,
 *              "is_trip_start": 0,
 *              "is_completed": 0,
 *              "is_cancelled": 1
 *                  },
 *     "driver": {
 *              "driver_name": "ganesh driver",
 *              "phone_number": "+7674576758",
 *              "profile_pic": "http://localhost/tapngo/public/assets/img/uploads/151178269462804.jpg"
 *               }
 *  }
 *
 *
 */



$router->post('/dispatch/request/status', [
    'as'   => 'Dispatch@dispatch_request_driver_status',
    'uses'  => 'Controller@run',
    'middleware' => [
        //'DispatchTokenCheck.api',

    ]
]);
