<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Ride Later Cancel
 * @api                {post} /dispatch/ridelatercancel Dispatch Ride Later Cancel
 * @apiDescription     It is used to cancel the ridelater request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {String}      request_id
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Ride_later_cancelled",
 *  }
 *
 *
 * @apiErrorExample  {json}       Error-Response:
 *       {
 *           "success": false,
 *           "error_code": 727,
 *           "error_message": "Request Already Ended",
 *           "exception": "App\\Ship\\Exceptions\\CommonException",
 *       }

 *
 */


$router->post('/dispatch/ridelatercancel', [
    'as' => 'Dispatch@dispatch_ride_later_cancel',
    'uses' => 'Controller@run',
    'middleware' => [

    ]
]);



