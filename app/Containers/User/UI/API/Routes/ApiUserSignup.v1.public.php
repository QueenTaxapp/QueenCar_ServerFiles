<?php

/**
 * @apiGroup           Users
 * @apiName            UserSignup
 * @api                {post} /user/signup User Signup
 * @apiDescription     User Signup
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     firstname
 * @apiParam           {String}     lastname
 * @apiParam           {String}     email
 * @apiParam           {String}     phone_number +917894561230 with country code
 * @apiParam           {String}     [password]  password is required when login_method=manual
 * @apiParam           {String}     login_method="manual|facebook|google"
 * @apiParam           {String}     login_by="android|ios"
 * @apiParam           {Multipart}  [profile_pic]
 * @apiParam           {String}     device_token
 * @apiParam           {String}     country_code      +91
 * @apiParam           {String}     [social_unique_id]     social_unique_id is required when login_method=facebook|google
 * @apiParam           {String}     time_zone
 * @apiParam           {String}     country   ex(IN)
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *          "success": true,
 *          "success_message" : "Registered Successfully",
 *          "user": {
 *                   "id": 1,
 *                   "firstname": "user",
 *                   "lastname": "test",
 *                   "email": "test@gmail.com",
 *                   "phone": "+917200704057",
 *                   "login_by": "android",
 *                   "login_method": "manual",
 *                   "token" => "$2y$10$TMWF.x82d2.B8TUFsIqVk.LfYGpJ85EV2P8Ks3vjo6r3F8d047Sni"
 *                   "profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151265277675307.jpg",
 *                   "is_active": 1,
 *                   "is_approve": null,
 *                   "is_available": null
 *          },
 *         "sos": []
 * }
 *
 */


$router->post('/user/signup', [
    'as'   => 'user@user_signup',
    'uses'  => 'Controller@run'
]);
