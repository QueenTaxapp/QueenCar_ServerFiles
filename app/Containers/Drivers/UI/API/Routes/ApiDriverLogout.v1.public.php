<?php

/**
 * @apiGroup           Driver
 * @apiName            Driver Logout
 * @api                {post} /driver/logout Driver Logout
 * @apiDescription     Driver Logout
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam              {Integer}     id    driver id
 * @apiParam              {String}     token   driver token
 *
 * @apiHeader          Accept application/json
 *
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *  {
 *      "success": true,
 *      "success_message": "Logged Out Successfully"
 *  }
 *
 */

    $router->post('/driver/logout', [
        'as'   => 'Driver@driver_logout',
        'uses' => 'Controller@run',
        'middleware' => [
            'DriverTokenCheck.api',
        ]
    ]);



