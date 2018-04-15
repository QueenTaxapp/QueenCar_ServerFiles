<?php

/**
 * @apiGroup           Driver
 * @apiName            Driver Forgot Password
 * @api                {post} /driver/forgotpassword Driver Forgot Password
 * @apiDescription     Driver Forgot Password
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam              {String}     phone_number
 * @apiParam              {String}     token
 *
 * @apiHeader          Accept application/json
 *
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *   "success": true,
 *   "user": {
 *       "is_presented": true
 *   },
 *   "success_message" : "forgot_password"
 *   }
 *
 */

    $router->post('/driver/forgotpassword', [
        'as'   => 'Forgotpassword',
        'uses' => 'Controller@Forgotpassword',
    ]);



