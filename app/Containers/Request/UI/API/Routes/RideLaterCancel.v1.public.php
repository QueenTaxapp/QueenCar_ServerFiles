<?php

/**
 * @apiGroup           Request
 * @apiName            Ride Later Cancel
 * @api                {post} /user/ridelatercancel Ride Later Cancel
 * @apiDescription     It is used to cancel the ridelater request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
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
 * @apiErrorExample  {json}       Error-Response:
 *       {
 *           "success": false,
 *           "error_code": 803,
 *           "error_message": "Request not registered",
 *           "exception": "App\\Ship\\Exceptions\\CommonException",
 *       }

 *
 */


$router->post('/user/ridelatercancel', [
    'as' => 'Request@ridelater_cancel',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



