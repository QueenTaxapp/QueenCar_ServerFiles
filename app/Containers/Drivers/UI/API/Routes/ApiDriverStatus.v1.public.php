<?php


/**
 * @apiGroup           Driver
 * @apiName            Driver Status
 * @api                {post} /driver/status Driver  Status
 * @apiDescription     Driver Toogle Status
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *{
 *   "success": true,
 *   "success_message": "Status Updated",
 *   "driver": {
 *               "is_active": 0,
 *               "is_approve": 0,
 *               "is_available": 0
 *              }
 *}
 *
 */

$router->post('/driver/status', [
    'as'   => 'Driver@driver_status',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DriverTokenCheck.api',
    ]
]);
