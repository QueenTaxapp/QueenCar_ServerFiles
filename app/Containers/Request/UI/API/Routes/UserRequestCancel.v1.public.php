<?php

/**
 * @apiGroup           Request
 * @apiName            User  Cancel Request
 * @api                {post} /user/request/cancel  User  Cancel Request
 * @apiDescription      User  Cancel Request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 * @apiParam           {Integer}    request_id
 * @apiParam           {String}      reason

 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Trip cancelled"
 *  }
 *
 */

$router->post('/user/request/cancel', [
    'as' => 'Request@user_cancel_request',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);
