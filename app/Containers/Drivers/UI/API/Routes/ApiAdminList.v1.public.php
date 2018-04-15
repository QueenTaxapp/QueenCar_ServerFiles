<?php

/**
 * @apiGroup           Driver
 * @apiName            Driver Admin List
 * @api                {post} /driver/admin/list  Driver Admin List
 * @apiDescription     Driver Admin Lists
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "driver admin list"
 *      "admins": [
 *                 {
 *                  "id": 2,
 *                  "admin_name": "test test",
 *                  "area_name": "chennai"
 *                 },
 *                 {
 *                  "id": 3,
 *                  "admin_name": "vinoth test2",
 *                  "area_name": "ooty"
 *                 }
 *      ]
 *
 *   }
 *
 *
 *
 */
    $router->post('/driver/admin/list', [
    'as'   => 'Driver@driver_admin_list',
    'uses'  => 'Controller@run',
    'middleware' => [
            //'DriverTokenCheck.api',
        ]
    ]);
