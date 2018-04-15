<?php

/**
 * @apiGroup           Driver
 * @apiName            Driver arrived
 * @api                {post} /driver/arrived  Driver Arrived
 * @apiDescription     Driver Arrived registration
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token    driver token
 * @apiParam           {Integer}     request_id

 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "driver arrived"
 *   }
 *
 *
 *
 */
    $router->post('/driver/arrived', [
    'as'   => 'Driver@driver_arrived',
    'uses'  => 'Controller@run',
    'middleware' => [
            'DriverTokenCheck.api',
        ]
    ]);
