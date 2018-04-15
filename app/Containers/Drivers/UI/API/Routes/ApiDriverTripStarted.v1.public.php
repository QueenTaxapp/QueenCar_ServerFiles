<?php

/**
 * @apiGroup           Driver
 * @apiName            Driver trip started
 * @api                {post} /driver/trip/start  Driver trip started
 * @apiDescription     driver to register the trip started
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token   driver token
 * @apiParam           {Integer}     request_id

 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "trip started"
 *   }
 *
 *
 *
 */
$router->post('/driver/trip/start', [
    'as'   => 'Driver@driver_trip_started',
    'uses'  => 'Controller@run',
    'middleware' => [
      //  'DriverTokenCheck.api',
    ]
]);
