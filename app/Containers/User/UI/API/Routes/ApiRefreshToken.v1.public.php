<?php

/**
 * @apiGroup           Users
 * @apiName            Refresh Token
 * @api                {post} /user/refreshtoken Refresh Token
 * @apiDescription     Refresh Token
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *          "success": true,
 *          "success_message" : "User_Logged",
 *           "user": {
 *                   "id": 1,
 *                   "firstname": "vicky",
 *                   "lastname": "test",
 *                   "email": "vickytest@gmail.com",
 *                   "phone": "7200704057",
 *                   "login_by": "android",
 *                   "login_method": "manual"
 *                   "token": "$2y$10$gK/MnepooaAZYMYj04pI4OUQglk5XeQ2qORXqie5eVX7ThjMWd21y"
 *                   "profile_pic" : "http://localhost/tabgo/public/admin.jpg"
 *                   }
 *   }
 *
 */

    $router->post('/user/refreshtoken', [
        'as'   => 'RefreshToken',
        'uses' => 'Controller@RefreshToken',
    ]);



