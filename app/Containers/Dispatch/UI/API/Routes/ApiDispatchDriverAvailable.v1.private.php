<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Driver Available
 * @api                {post} /disptach/driver/available Dispatch Driver Available
 * @apiDescription     it is used to reterive no of drivers available
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     email_address
 * @apiParam           {String}     password

 *
 * @apiSuccessExample  {json}    Success-Response:
*   {
*       "success": true,
*       "success_message": "driver available",
*       "driver": [
*               {
*                   "id": 12,
*                   "firstname": "testhjjj",
*                   "lastname": "dtghjjMghk",
*                   "phone_number": "+918056335103",
*                   "email": "test@gmail.com",
*                   "latitude": 11.0145572,
*                   "longitude": 76.9814541,
*                   "type_name": "test"
*               },
*               {
*                   "id": 21,
*                   "firstname": "vicky",
*                   "lastname": "test                     AS",
*                   "phone_number": "+9172007040574",
*                   "email": "vickytest4@gmail.com",
*                   "latitude": 11.0145891,
*                   "longitude": 76.9814653,
*                   "type_name": "test"
*               },
*               {
*                   "id": 23,
*                   "firstname": "test",
*                   "lastname": "usr",
*                   "phone_number": "+918056335106",
*                   "email": "test10@gmail.com",
*                   "latitude": 9.081852,
*                   "longitude": 8.6753122,
*                   "type_name": "test"
*               }
*                  ]
*  }
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
$router->post('/disptach/driver/available', [
    'as'   => 'Dispatch@dispatch_driver_available',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',

    ]
]);
