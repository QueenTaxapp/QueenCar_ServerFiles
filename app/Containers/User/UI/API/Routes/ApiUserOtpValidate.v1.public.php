<?php


/**
 * @apiGroup           Users
 * @apiName            User Otp Validate
 * @api                {post} /user/otpvalidate User otpvalidate
 * @apiDescription     User Otp Validate
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     token   
 * @apiParam           {String}     otp_key
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *      "success": true,
 *      "token" : "$2ydsgkjhsfgjhksfhkjshgfkjs",
 *      "success_message" : "Otp_Validate"
 *   }
 *
 */


    $router->post('/user/otpvalidate', [
        'as'   => 'userotpvalidate',
        'uses' => 'Controller@userOtpValidate',
    ]);



