<?php

/**
 * @apiGroup           Users
 * @apiName            UserProfile
 * @api                {post} /user/profile User Profile
 * @apiDescription     User Profile
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id     user id
 * @apiParam           {String}      token   user token
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
 *      "user":
 *      {
 *          "id": 15,
 *          "firstname": "test",
 *          "lastname": "test",
 *          "email": "test@gmail.com",
 *          "phone": "+919965356824",
 *          "login_by": "android",
 *          "login_method":"manual",
 *          "token": "$2y$10$XOToC0NoC/5/zg.pIvizH.xrb86G0URHO.fDZC3.p8BlfAQjcj.am",
 *          "profile_pic": "",
 *          "is_active": 1,
 *          "is_approve": null,
 *          "is_available": null
 *      },
 *      "sos":[]
 *   }
 *
 */



        $router->post('/user/profile', [
            'as' => 'Profile@user_profile',
            'uses' => 'Controller@run',
            'middleware' => [
                'userTokenCheck.api',
            ]
        ]);