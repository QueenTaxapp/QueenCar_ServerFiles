<?php


/**
 * @apiGroup           Driver
 * @apiName            Driver Toogle Status
 * @api                {post} /driver/toogle/status Driver Toogle Status
 * @apiDescription     Driver Toogle Status
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token   driver token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  HTTP/1.1 200 OK
 *  {
 *   "success": true,
 *   "success_message": "Status Updated",
 *   "driver": {
 *               "is_active": 0,
 *               "is_approve": 1,
 *               "is_available": 0
 *             }
 *  }
 *
 */

$router->post('/driver/toogle/status', [
'as'   => 'Driver@toogle_status',
'uses'  => 'Controller@run',
    'middleware' => [
        'DriverTokenCheck.api',
    ]
]);
