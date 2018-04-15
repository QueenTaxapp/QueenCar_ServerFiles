<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch  Cancel Request
 * @api                {post} /dispatch/request/cancel  Dispatch  Cancel Request
 * @apiDescription      Dispatch  Cancel Request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {Interger}    request_id
 * @apiParam           {String}      reason

 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Trip cancelled"
 *  }
 *
 */

$router->post('/dispatch/request/cancel', [
    'as' => 'Request@user_cancel_request',
    'uses' => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',
    ]
]);
