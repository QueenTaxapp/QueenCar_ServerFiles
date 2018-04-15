<?php
/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Manual Request Driver Available
 * @api                {post} /dispatch/manual/request/driver/available  Dispatch Manual Request Driver Available
 * @apiDescription     used to list the driver available for dispatch create request  manually
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

 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "available_drivers",
 *      "drivers": [
 *              {
 *                  "id": 5,
 *                  "firstname": "ganesh",
 *                  "lastname": "kumar"
 *              }
 *                  ]
 *  }
 *
 *
 */

$router->post('/dispatch/manual/request/driver/available', [
    'as'   => 'Dispatch@manual_request_driver_available',
    'uses'  => 'Controller@run',
    'middleware' => [
        //'DispatchTokenCheck.api',

    ]
]);
