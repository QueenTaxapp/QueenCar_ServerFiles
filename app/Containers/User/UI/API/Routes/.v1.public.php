<?php

/**
 * @apiGroup           Users
 * @apiName            User Token For Otp
 * @api                {post} /user/temptoken User Token generator
 * @apiDescription     User Token For Otp
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *   "success": true,
 *   "token" : "$2ydsgkjhsfgjhksfhkjshgfkjs",
 *   "success_message" : "Token_Created"
 *   }
 *
 */

    $router->post('/user/temptoken', [
        'as'   => 'GetTempToken',
        'uses' => 'Controller@SendTempKey',
    ]);



