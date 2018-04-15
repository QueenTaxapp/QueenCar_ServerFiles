<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Login Validation
 * @api                {post} /dispatch/login/validation Dispatch Login Validation
 * @apiDescription     It is used to validate the admin on dispatch login page
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     email_address
 * @apiParam           {String}     password

 *
 * @apiSuccessExample  {json}    Success-Response:
*  {
*       "success": true,
*       "success_message": "dispatcher_logged_in_successfully",
*       "dispatcher": {
*                       "id": 4,
*                       "firstname": "dispatcher",
*                       "lastname": "test",
*                       "registration_code": "18568",
*                       "email": "vignesh.nplus@gmail.com",
*                       "phone_number": "+917200704057",
*                       "emergency_number": "+919003991988",
*                       "is_active": 0,
*                       "role": 100000,
*                       "profile_pic": null,
*                       "token": "kkose80hmftnioztsizw2loj3zhrcn"
*                      }
*   }
 *
 * @apiErrorExample  {json}       Error-Response:
 * {
 *      "success": false,
 *      "error_code": "730",
 *      "error_message": "Email Adddress Or Password Invalid",
 *      "exception": "App\\Ship\\Exceptions\\CommonException",
 *  }
 *
 *
 *
 */
$router->post('/dispatch/login/validation', [
    'as'   => 'Dispatch@dispatch_login_validation',
    'uses'  => 'Controller@run',
    'middleware' => [

    ]
]);
