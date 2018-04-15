<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Dispatch Driver types available on Zones
 * @api                {post} /disptach/driver/type/available/zone Dispatch Driver types available on Zones
 * @apiDescription     It is used to reterive the types available on the zone (latitude and longitude)
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {String}     latitude
 * @apiParam           {String}     longitude
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Driver Types  available",
 *      "driver_types_available_on_zone":
 *       [
 *          {
 *              "driver_type_id": 2,
 *              "driver_type_name": "test",
 *              "driver_type_icon": "http://192.168.1.20/tabgo/public/assets/img/uploads/24898.png"
 *          },
 *          {
 *              "driver_type_id": 3,
 *              "driver_type_name": "BMW",
 *              "driver_type_icon": "http://192.168.1.20/tabgo/public/assets/img/uploads/66185.png"
 *          }
 *       ]
 *  }
 *
 *
 *
 *
 *
 * @apiErrorExample  {json}       Error-Response:
 *  {
 *      "success": false,
 *      "error_code": 734,
 *      "error_message": "Zone not available",
 *      "exception": "App\\Ship\\Exceptions\\CommonException",
 *  }
 *
 * @apiErrorExample  {json}       Error-Response:
 *  {
 *      "success": false,
 *      "error_code": 735,
 *      "error_message": "Driver types not available on this zone",
 *      "exception": "App\\Ship\\Exceptions\\CommonException",
 *  }
 *
 *
 */
$router->post('/disptach/driver/type/available/zone', [
    'as'   => 'Dispatch@dispatch__driver_type_available_on_zone',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',

    ]
]);
