<?php

/**
 * @apiGroup           Driver
 * @apiName            DriverProfile
 * @api                {post} /driver/profile  Driver Profile
 * @apiDescription     Driver Profile
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {String}      firstname
 * @apiParam           {String}      lastname
 * @apiParam           {String}      [new_password] it is required when old password field has value
 * @apiParam           {String}      [old_password] it is required when new password field has value
 * @apiParam           {Multipart}   [profile_pic]
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *      "success": "true",
 *      "success_message": "Profile Updated Successfully"
 *   }
 *
 */



        $router->post('test/driver/profile', [
            'as' => 'Profile@driver_profile',
            'uses' => 'Controller@run',
            'middleware' => [
                'DriverTokenCheck.api',
//                'userTokenCheck.api',
            ]
        ]);
