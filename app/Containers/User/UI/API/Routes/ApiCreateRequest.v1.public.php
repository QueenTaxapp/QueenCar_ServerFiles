<?php

/**
 * @apiGroup           Users
 * @apiName            Create New Request
 * @api                {post} /user/createrequest Create New Request
 * @apiDescription     Create New Request
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {Integer}     id   user id
 *@apiParam           {String}     token    user token
 *@apiParam           {Double}     platitude
 *@apiParam           {Double}     plongitude
 *@apiParam           {Double}     dlongitude
 *@apiParam           {Double}     dlatitude
 *@apiParam           {Integer}     paymentOpt
 *@apiParam           {Integer}     type
 *@apiParam           {String}     plocation
 *@apiParam           {String}     dlocation
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
*   {
*       "success": true,
*       "success_message": "Create_Request_successfully",
*       "request": {
*                   "id": 222,
*                   "request_id": "RES_40715",
*                   "pick_latitude": "11.0147692",
*                   "pick_longitude": "76.980241",
*                   "drop_longitude": "76.980241",
*                   "drop_latitude": "11.001928",
*                   "drop_location": "No: 395, Sarojini Naidu Road, Sidhapudur, Balasundaram Layout, B.K.R Nagar, New Siddhapudur, Coimbatore, Tamil Nadu 641044",
*                   "pick_location": "Sowripalayam Road, Udayampalayam Road, Ganapathypudur, KR Puram, Udayampalayam, Coimbatore, Tamil Nadu 641028"
*       },
*       "user": {
*                   "id": 40,
*                   "firstname": "user",
*                   "lastname": "test",
*                   "email": "usertest1@gmail.com",
*                   "phone_number": "+914321567890",
*                   "profile_pic": "",
*                   "latitude": 0,
*                   "longitude": 0
*       }
*   }
 *
 */

    $router->post('/user/createrequest', [
        'as'   => 'Request@createrequest',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



