<?php

/**
 *
 * @apiGroup           Dispatch
 * @apiName            Dispatch Set Driver
 * @api                {post} /dispatch/set/driver  Dispatch Set Driver
 * @apiDescription     Dispatch Set Driver
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
 *@apiParam           {String}     firstname
 *@apiParam           {String}     lastname
 *@apiParam           {String}     phone_number
 *@apiParam           {String}     driver_id
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "driver_set_for_this_request",
 *  }
 *
 *
 */
$router->post('/dispatch/set/driver', [
    'as'   => 'Dispatch@dispatch_set_driver',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',

    ]
]);
