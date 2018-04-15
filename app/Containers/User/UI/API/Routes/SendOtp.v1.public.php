<?php

/**
 * @apiGroup           Users
 * @apiName            Send Otp For User
 * @api                {post} /user/sendotp Send Otp For User
 * @apiDescription     Otp For User
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam              {String}     phone_number
 * @apiParam              {String}     token
 *
 * @apiHeader          Accept application/json
 *
 *
 * @apiSuccessExample  {json}    Success-Response:for New user
 *   HTTP/1.1 200 OK
 *   {
 *   "success": true,
 *   "success_message" : "New_User"
 *   "token" : "$2ydsgkjhsfgjhksfhkjshgfkjs"
 *   }
 *
 *
 * @apiSuccessExample  {json}    Success-Response:for Existing user
 *   HTTP/1.1 200 OK
 *   {
 *   "success": true,
 *   "user": {
 *       "is_presented": true
 *   },
 *   "success_message" : "Existing_User"
 *   }
 *
 */

    $router->post('/user/sendotp', [
        'as'   => 'SendOtp',
        'uses' => 'Controller@SendOtpTemp',
    ]);



