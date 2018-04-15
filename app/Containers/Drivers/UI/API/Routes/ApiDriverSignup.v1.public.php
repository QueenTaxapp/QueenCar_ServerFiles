<?php

/**
 * @apiGroup           Driver
 * @apiName            DriverSignUp
 * @api                {post} /driver/signup Driver SignUp
 * @apiDescription     Driver SignUp
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {String}     firstname   First Name
 * @apiParam           {String}     lastname   Last Name
 * @apiParam           {String}     email   Email
 * @apiParam           {String}     [password]   password is required when login_method=manual
 * @apiParam           {String}     phone  Phone Number
 * @apiParam           {String}     type  Car Type
 * @apiParam           {String}     car_number
 * @apiParam           {String}     car_model
 * @apiParam           {Multipart}     [profile_pic]  Profile Picture
 * @apiParam           {String}     device_token  Device Id
 * @apiParam           {String}     login_by="android|ios"
 * @apiParam           {String}     login_method="manual|facebook|google"
 * @apiParam           {String}     [social_unique_id]     social_unique_id is required when login_method=facebook|google
 * @apiParam           {multipart}     [license]     image
 * @apiParam           {String}     [license_name]     license_name is required when license is present
 * @apiParam           {String}     [license_date]     license_date is required when license is present ex:2017-10-13
 * @apiParam           {multipart}     [insurance]     image
 * @apiParam           {String}     [insurance_name]     insurance_name is required when insurance is present
 * @apiParam           {String}     [insurance_date]     insurance_date is required when insurance is present ex:2017-10-13
 * @apiParam           {multipart}     [rcbook]     image
 * @apiParam           {String}     [rcbook_name]     rcbook_name is required when rcbook is present
 * @apiParam           {String}     [rcbook_date]     rcbook_date is required when rcbook is present ex:2017-10-13
 * @apiParam           {int}        [company]
 * @apiParam           {String}     country   example(IN)
 * @apiParam           {String}     country_code    example(+91)
 * @apiParam           {String}     admin_id

 *
 * @apiSuccessExample  {json}       Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *          "success": true,
 *          "success_message" : "driver_added",
 *          "driver": {
 *                   "id": 24,
 *                   "firstname": "user",
 *                   "lastname": "test123",
 *                   "email": "testuser@gmail.com",
 *                   "phone": "+917200704057",
 *                   "login_by": "android",
 *                   "login_method": "manual",
 *                   "token" => "$2y$10$TMWF.x82d2.B8TUFsIqVk.LfYGpJ85EV2P8Ks3vjo6r3F8d047Sni"
 *                   "profile_pic": "",
 *                   "is_active": 0,
 *                   "is_approve": 0,
 *                   "is_available": 1,
 *                   "car_model":"wry",
 *                   "car_number":"qwe",
 *                   "type_name":"Sedan",
 *                   "type_icon":"http:\/\/192.168.1.18\/platinum\/public\/assets\/img\/uploads\/60758.png"
 *
 *          }
 *          "sos": [
 *           {
 *              "id": 2,
 *              "name": "customer care",
 *              "number": "+72007040574"
 *           },
 *           {
 *              "id": 3,
 *              "name": "customer care 3",
 *              "number": "+919999999999"
 *           },
 *           {
 *              "id": 7,
 *              "name": "test",
 *              "number": "+740145698725"
 *           }
 *         ]
 *
 *   }
 *
 */

$router->post('/driver/signup', [
    'as'   => 'Driver@driver_sign_up',
    'uses'  => 'Controller@run'
]);
