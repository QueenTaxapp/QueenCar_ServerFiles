<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch Create Request
 * @api                {post} /dispatch/create/request  Dispatch Create Request
 * @apiDescription     it is used to Create Request on dispatch panel
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {String}     id
 *@apiParam           {String}     token
 *@apiParam           {Double}     platitude
 *@apiParam           {Double}     plongitude
 *@apiParam           {Double}     dlatitude
 *@apiParam           {Double}     dlongitude
 *@apiParam           {Integer}    payment_opt
 *@apiParam           {Integer}    type
 *@apiParam           {Integer}    user_id
 *@apiParam           {String}     pick_location
 *@apiParam           {String}     drop_location
 *@apiParam           {String}     firstname
 *@apiParam           {String}     lastname
 *@apiParam           {String}     phone_number
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "Create_Request_successfully",
 *      "is_automatic": "1",
 *      "request": {
 *           "id": 21,
 *           "request_id": "RES_99155",
 *           "time_left": "100",
 *          "pick_latitude": "11.0147692",
 *          "pick_longitude": "76.980241",
 *          "drop_longitude": "76.980241",
 *          "drop_latitude": "11.001928",
 *          "drop_location": "\"76.980241",
 *          "pick_location": "asdf"
 *                 },
 *      "user": {
 *          "id": 1,
 *          "firstname": "ganesh",
 *          "lastname": "user",
 *          "email": "usertest@gmail.com",
 *          "phone_number": "9876465688",
 *          "profile_pic": null,
 *          "latitude": 1234.2,
 *          "longitude": 1234.2,
 *          "review": "2"
 *              },
 *      "driver": [],
 *      "request_details":
 *              {
 *                  "id": "4",
 *                  "token": "ykkwxr5zy3qqv43uo1p0utlidvobj9",
 *                  "platitude": "11.0146138",
 *                  "plongitude": "76.98173539999993",
 *                  "dlongitude": "76.98173539999993",
 *                  "dlatitude": "11.0332088",
 *                  "payment_opt": "1",
 *                  "type": "3",
 *                  "user_id": "105",
 *                  "drop_location": "PSG College of Arts & Science, PSG CAS, Civil Aerodrome Post, Peelamedu, Coimbatore, Tamil Nadu, India",
 *                  "pick_location": "LMS Street, P N Palayam, Coimbatore, Tamil Nadu, India",
 *                  "firstname": "saravana",
 *                  "lastname": "test",
 *                  "phone_number": "+9172003894072"
 *               }
 *  }
 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": "driver_list",
 *      "is_automatic": 0,
 *      "request": [],
 *      "user": {
 *          "id": 1,
 *          "firstname": "ganesh",
 *          "lastname": "user",
 *          "email": "usertest@gmail.com",
 *          "phone_number": "9876465688",
 *          "profile_pic": null,
 *          "latitude": 1234.2,
 *          "longitude": 1234.2,
 *          "review": "2"
 *              },
 *      "driver": [
 *              {
 *                  "id": 5,
 *                  "firstname": "ganesh",
 *                  "lastname": "kumar"
 *              }
 *                  ],
 *      "request_details":
 *              {
 *                  "id": "4",
 *                  "token": "ykkwxr5zy3qqv43uo1p0utlidvobj9",
 *                  "platitude": "11.0146138",
 *                  "plongitude": "76.98173539999993",
 *                  "dlongitude": "76.98173539999993",
 *                  "dlatitude": "11.0332088",
 *                  "payment_opt": "1",
 *                  "type": "3",
 *                  "user_id": "105",
 *                  "drop_location": "PSG College of Arts & Science, PSG CAS, Civil Aerodrome Post, Peelamedu, Coimbatore, Tamil Nadu, India",
 *                  "pick_location": "LMS Street, P N Palayam, Coimbatore, Tamil Nadu, India",
 *                  "firstname": "saravana",
 *                  "lastname": "test",
 *                  "phone_number": "+9172003894072"
 *               }
 *  }
 *
 *
 */
$router->post('/dispatch/create/request', [
    'as'   => 'Dispatch@dispatch_create_request',
    'uses'  => 'Controller@run',
    'middleware' => [
        //'DispatchTokenCheck.api',

    ]
]);
