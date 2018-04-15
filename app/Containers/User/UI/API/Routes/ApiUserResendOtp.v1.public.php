<?php

/**
 * @apiGroup           Users
 * @apiName            UserResendOtp
 * @api                {post} /user/resendotp User Resend Otp
 * @apiDescription     User Resend Otp
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     token   
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *      "success": true,
 *      "token" : "$2ydsgkjhsfgjhksfhkjshgfkjs",
 *      "success_message" : "Resend_Otp"
 *   }
 *
 */

$router->post('/user/resendotp', [
    'as'   => 'userresendotp',
    'uses' => 'Controller@userResendOtp'
]);
