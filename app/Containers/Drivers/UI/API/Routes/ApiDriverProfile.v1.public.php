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
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token   driver token
 * @apiParam           {String}      firstname
 * @apiParam           {String}      lastname
 * @apiParam           {String}      [new_password] it is required when old password field has value
 * @apiParam           {String}      [old_password] it is required when new password field has value
 * @apiParam           {Multipart}   [profile_pic]
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *      "success": true,
 *      "success_message": "Profile Updated Successfully",
 *      "driver":
 *      {
 *          "id": 15,
 *          "firstname": "test",
 *          "lastname": "test",
 *          "email": "test@gmail.com",
 *          "phone": "+919965356824",
 *          "login_by": null,
 *          "login_method": null,
 *          "token": "$2y$10$XOToC0NoC/5/zg.pIvizH.xrb86G0URHO.fDZC3.p8BlfAQjcj.am",
 *          "profile_pic": null,
 *          "is_active": 1,
 *          "is_approve": 0,
 *          "is_available": 0,
 *          "car_model":null,
 *          "car_number":null,
 *          "type_name":"adffs",
 *          "type_icon":"http:\/\/192.168.1.18\/tabgo\/public\/assets\/img\/uploads\/50696.png"
 *      },
 *      "sos":[]
 *   }
 *
 *
 *
 */








        $router->post('/driver/profile', [
            'as' => 'Profile@driver_profile',
            'uses' => 'Controller@run',
            'middleware' => [
                'DriverTokenCheck.api',
//                'userTokenCheck.api',
            ]
        ]);
