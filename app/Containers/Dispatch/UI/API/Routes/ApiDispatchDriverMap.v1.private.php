<?php


/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Driver Map
 * @api                {post} /disptach/driver/map Dispatch Driver Map
 * @apiDescription     it is used to show the driver available and on trip on dispatch map
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     id
 * @apiParam           {String}     token

 *
 * @apiSuccessExample  {json}    Success-Response:
 * {
 *      "success": true,
 *      "success_message": "driver status",
 *      "driver": [
 *          {
 *              "id": 3,
 *              "driver_name": "ganesh kumar",
 *              "type_name": "test",
 *              "type_id": 2,
 *              "latitude": 11.0146303,
 *              "longitude": 76.9814672,
 *              "is_available": 0,
 *              "status": "On trip"
 *          },
 *          {
 *              "id": 12,
 *              "driver_name": "testhjjj dtghjjMghk",
 *              "type_name": "test",
  *              "type_id": 2,
 *              "latitude": 11.0146577,
 *              "longitude": 76.9814753,
 *              "is_available": 1,
 *              "status": "Available"
 *          },
 *          {
 *              "id": 32,
 *              "driver_name": "gnehs kumar",
 *              "type_name": "BMW",
 *              "type_id": 3,
 *              "latitude": 11.0146301,
 *              "longitude": 76.9814672,
 *              "is_available": 1,
 *              "status": "Available"
 *          }
 *             ]
 * }
 *
 * @apiErrorExample  {json}       Error-Response:
 *       {
 *           "success": false,
 *           "error_code": 731,
 *           "error_message": "No driver available",
 *           "exception": "App\\Ship\\Exceptions\\CommonException",
 *       }
 *
 *
 *
 */


$router->post('/disptach/driver/map', [
    'as'   => 'Dispatch@dispatch_driver_map',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',
    ]
]);
