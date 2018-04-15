<?php

/**
 * @apiGroup           Users
 * @apiName            User Logout
 * @api                {post} /user/logout User Logout
 * @apiDescription     User Logout
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *  {
 *      "success": true,
 *      "success_message": "Logged Out Successfully"
 *  }
 *
 */

    $router->post('/user/logout', [
        'as'   => 'user@user_logout',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



