<?php


/**
 * @apiGroup           Driver
 * @apiName            Driver History List
 * @api                {post} /driver/historyList  Driver History List
 * @apiDescription     Driver History List
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   driver id
 * @apiParam           {String}      token   driver token
 * @apiParam           {String}      page
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 * {
 *      "success": true,
 *      "success_message": "driver_history_lists",
 *      "request": [
 *                  {
 *                      "request_id":"RES_53018",
 *                      "id": 227,
 *                      "user_id": 40,
 *                      "pick_latitude": 11.0146183000000004170715328655205667018890380859375,
 *                      "pick_longitude": 76.981502500000004829416866414248943328857421875,
 *                      "drop_latitude": 11.0146183000000004170715328655205667018890380859375,
 *                      "drop_longitude": 76.981502500000004829416866414248943328857421875,
 *                      "pick_location": "Sowripalayam Road, Udayampalayam Road, Ganapathypudur, KR Puram, Udayampalayam, Coimbatore, Tamil Nadu 641028",
 *                      "drop_location": "No: 395, Sarojini Naidu Road, Sidhapudur, Balasundaram Layout, B.K.R Nagar, New Siddhapudur, Coimbatore, Tamil Nadu 641044",
 *                      "trip_start_time": "2017-12-25 07:30:47",
 *                      "is_completed": 0,
 *                      "is_cancelled": 1,
 *                      "driver_id": 12,
 *                      "car_model": "1973",
 *                      "car_number": "XUV",
 *                      "driver_type": 2,
 *                      "user_profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151439422368934.jpg",
 *                      "type_icon": "http://192.168.1.20/tabgo/public/assets/img/uploads/24898.png",
 *                      "type_name":"adffs",
 *                      "total":16.5,
 *                      "currency":"$"
 *                  },
 *                  {
 *                      "request_id":"RES_74018",
 *                      "id": 228,
 *                      "user_id": 40,
 *                      "pick_latitude": 11.0146183000000004170715328655205667018890380859375,
 *                      "pick_longitude": 76.981502500000004829416866414248943328857421875,
 *                      "drop_latitude": 11.0146183000000004170715328655205667018890380859375,
 *                      "drop_longitude": 76.981502500000004829416866414248943328857421875,
 *                      "pick_location": "Sowripalayam Road, Udayampalayam Road, Ganapathypudur, KR Puram, Udayampalayam, Coimbatore, Tamil Nadu 641028",
 *                      "drop_location": "No: 395, Sarojini Naidu Road, Sidhapudur, Balasundaram Layout, B.K.R Nagar, New Siddhapudur, Coimbatore, Tamil Nadu 641044",
 *                      "trip_start_time": "2017-12-25 07:30:47",
 *                      "is_completed": 0,
 *                      "is_cancelled": 1,
 *                      "driver_id": 12,
 *                      "car_model": "1973",
 *                      "car_number": "XUV",
 *                      "driver_type": 2,
 *                      "user_profile_pic": "http://192.168.1.20/tabgo/public/assets/img/uploads/151439422368934.jpg",
 *                      "type_icon": "http://192.168.1.20/tabgo/public/assets/img/uploads/24898.png",
 *                      "type_name":"adffs",
 *                      "total":67.5,
 *                      "currency":"$"
 *                  }
 *      ]
 * }
 *
 *  @apiSuccessExample  {json}    Success-Response:no_data_found
 *   HTTP/1.1 200 OK
 * {
 *      "success": true,
 *      "success_message": "driver_history_not_found",
 *      "request": []
 * }
 */

$router->post('/driver/historyList', [
    'as'   => 'Driver@driver_list_history',
    'uses'  => 'Controller@run',
    'middleware' => [
        'DriverTokenCheck.api',
    ]
]);