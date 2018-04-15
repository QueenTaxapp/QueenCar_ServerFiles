<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Admin Edit
 * @api                {post} /dispatch/admin/edit  Dispatch Admin Edit
 * @apiDescription     it is used to edit the admin
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {String}     firstname
 * @apiParam           {String}     lastname
 * @apiParam           {String}     [address]
 * @apiParam           {String}     country
 * @apiParam           {Integer}    postal_code
 * @apiParam           {String}     emergency_number With Country Code
 * @apiParam           {Multipart}  [profile_pic]
 * @apiParam           {String}     [old_password] it required when new_password has value
 * @apiParam           {String}     [new_password] it required when old_password has value
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "admin_edited_successfully",
 *      "admin": {
 *                  "firstname": "dispatch",
 *                  "lastname": "edit test",
 *                  "emergency_number": "+917200704057",
 *                  "profile_pic": null,
 *                  "address": "114,Sathiq basha street",
 *                  "country": "indai",
 *                  "postalcode": "641007"
 *              }
 *  }
 *
 * @apiErrorExample  {json}       Error-Response:
 *       {
 *           "success": false,
 *           "error_code": 736,
 *           "error_message": "Emergency number already registered",
 *           "exception": "App\\Ship\\Exceptions\\CommonException",
 *       }
 *
 * @apiErrorExample  {json}       Error-Response:
 *       {
 *           "success": false,
 *           "error_code": 737,
 *           "error_message": "Incorrect Current Password",
 *           "exception": "App\\Ship\\Exceptions\\CommonException",
 *       }
 *
 *
 */
$router->post('/dispatch/admin/edit', [
    'as'   => 'Dispatch@dispatch_admin_edit',
    'uses'  => 'Controller@run',
    'middleware' => [
         'DispatchTokenCheck.api',

    ]
]);
