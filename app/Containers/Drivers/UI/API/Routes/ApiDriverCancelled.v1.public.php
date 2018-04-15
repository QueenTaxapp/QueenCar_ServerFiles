<?php
/**
 * @apiGroup           Driver
 * @apiName            Driver trip cancelled
 * @api                {post} /driver/trip/cancel  Driver Trip Cancelled
 * @apiDescription     Trip Cancelled  by the driver
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token   driver token
 * @apiParam           {Integer}     request_id
 * @apiParam           {String}      reason
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "Trip cancelled"
 *   }
 *
 *
 *
 */

    $router->post('/driver/trip/cancel', [
    'as'   => 'Driver@driver_trip_cancel',
    'uses'  => 'Controller@run',
    'middleware' => [
    //'DriverTokenCheck.api',
    ]
    ]);
