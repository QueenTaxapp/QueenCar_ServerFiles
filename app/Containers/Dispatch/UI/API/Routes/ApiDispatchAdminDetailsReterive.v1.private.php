<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Admin details
 * @api                {post} /dispatch/admin/details  Dispatch Admin details
 * @apiDescription     it is used to reterive the admin values
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "admin_values",
 *      "admin": {
 *                  "id": 8,
 *                  "firstname": "dispatch",
 *                  "lastname": "edit test",
 *                  "registration_code": "18789",
 *                  "email": "dispatchuser@gmail.com",
 *                  "phone_number": "+919003991988",
 *                  "emergency_number": "+917200704057",
 *                  "role": 100000,
 *                  "profile_pic": null,
 *                  "address": "114,Sathiq basha street",
 *                  "city": "coimbatore",
 *                  "country": "indai",
 *                  "postalcode": "641007",
 *                  "timezone": "Asia/Kolkata"
 *  }
 *
 *
 *
 */
$router->post('/dispatch/admin/details', [
    'as'   => 'Dispatch@dispatch_admin_details',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',

    ]
]);
