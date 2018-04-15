<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch  Ride Later
 * @api                {post} /dispatch/ride/later  Dispatch  Ride Later
 * @apiDescription     used to create a ride later Request on dispatch panel
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {String}     id
 *@apiParam           {String}     token
 *@apiParam           {Double}     platitude
 *@apiParam           {Double}     plongitude
 *@apiParam           {Double}     dlatitude
 *@apiParam           {Double}     dlongitude
 *@apiParam           {Integer}    payment_opt
 *@apiParam           {Integer}    type
 *@apiParam           {Integer}    user_id
 *@apiParam           {String}     pick_location
 *@apiParam           {String}     drop_location
 *@apiParam           {String}     timezone
 *@apiParam           {String}     datetime
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Trip_registered_successfully",
 *  }
 *
 *
 *
 *
 */
$router->post('/dispatch/ride/later', [
    'as'   => 'Dispatch@dispatch_ride_later',
    'uses'  => 'Controller@run',
    'middleware' => [
        //'DispatchTokenCheck.api',

    ]
]);
