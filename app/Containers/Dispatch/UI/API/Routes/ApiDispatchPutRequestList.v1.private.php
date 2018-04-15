<?php

    /**
    * @apiGroup           Dispatch
    * @apiName            Dispatch Specific Admin Request List
    * @api                {post} /dispatch/request/list  Dispatch Specific Admin Request List
    * @apiDescription     used to list the specific dispatch admin request and schedule as similiar to paginate
    * @apiVersion         1.0.0
    * @apiPermission      none
    *
    * @apiHeader          Accept application/json
    *
    * @apiParam           {INT}        id
    * @apiParam           {String}     token
    * @apiParam           {INT}        page min 1
    * @apiParam           {INT}        ride_later 0 for request ,1 for schedule
    * @apiParam           {String}     [search_key_user] User name
    * @apiParam           {String}     [search_key_driver] Driver Name
    * @apiParam           {Int}        [search_key_trip_status] 1 : trip not yet start , 2 : ongoing, 3 : completed ,4:cancelled
    * @apiParam           {String}     [search_key_payment_type] 0 : card ,1:cash, 2 : wallet , 3 : cash&wallet
    * @apiParam           {String}     [search_key_payment_status] 0 : unpaid ,1: paid
    * @apiParam           {String}     [search_key_from_date] <code>required when search_key_to_date has value </code> eg : 2018-02-24 17:07:39
    * @apiParam           {String}     [search_key_to_date] <code>required when  search_key_from_date has value</code> eg : 2018-02-24 17:07:39

     *
    * @apiSuccessExample  {json}    Success-Response:
    *   {
    *       "success": true,
    *       "success_message": "request_list_for_specific_dispatch_admin_ride_later",
    *       "total_no_of_request": 2,
    *       "page": 1,
    *       "request": [
    *               {
    *                   "id": 264,
    *                   "trip_start_time": null,
    *                   "created_at": {
    *                           "date": "2018-02-27 11:52:58.000000",
    *                           "timezone_type": 3,
    *                           "timezone": "Asia/Kolkata"
    *                                  },
    *       "request_id": "RES_86444",
    *       "is_completed": 0,
    *       "is_cancelled": 0,
    *       "payment_opt": 1,
    *       "is_paid": 0,
    *       "is_trip_start": 0,
    *       "trip_bill": 0,
    *       "user_name": "saravana test",
    *       "driver_name": null,
    *       "trip_status": "Trip Not Yet Started",
    *       "is_paid_message": "Unpaid",
    *       "payment_type_select": "Cash"
    *               },
    *               {
    *                   "id": 263,
    *                   "trip_start_time": null,
    *                   "created_at":
    *                                   {
    *                       "date": "2018-02-27 11:49:41.000000",
    *                       "timezone_type": 3,
    *                       "timezone": "Asia/Kolkata"
    *                                   },
    *                   "request_id": "RES_93066",
    *                   "is_completed": 0,
    *                   "is_cancelled": 0,
    *                   "payment_opt": 1,
    *                   "is_paid": 0,
    *                   "is_trip_start": 0,
    *                   "trip_bill": 0,
    *                   "user_name": "test ing",
    *                   "driver_name": null,
    *                   "trip_status": "Trip Not Yet Started",
    *                   "is_paid_message": "Unpaid",
    *                   "payment_type_select": "Cash"
    *               }
    *                   ]
    *   }
    *
    *
    * @apiSuccessExample  {json}    Success-Response:
    *   {
    *       "success": true,
    *       "success_message": "request_list_for_specific_dispatch_admin_request",
    *       "total_no_of_request": 2,
    *       "page": 1,
    *       "request": [
    *               {
    *                   "id": 264,
    *                   "trip_start_time": null,
    *                   "created_at":
    *                                   {
    *                       "date": "2018-02-27 11:49:41.000000",
    *                       "timezone_type": 3,
    *                       "timezone": "Asia/Kolkata"
    *                                   },
    *       "request_id": "RES_86444",
    *       "is_completed": 0,
    *       "is_cancelled": 0,
    *       "payment_opt": 1,
    *       "is_paid": 0,
    *       "is_trip_start": 0,
    *       "trip_bill": 0,
    *       "user_name": "saravana test",
    *       "driver_name": null,
    *       "trip_status": "Trip Not Yet Started",
    *       "is_paid_message": "Unpaid",
    *       "payment_type_select": "Cash"
    *               },
    *               {
    *                   "id": 263,
    *                   "trip_start_time": null,
    *                   "created_at": {
    *                       "date": "2018-02-27 11:49:41.000000",
    *                       "timezone_type": 3,
    *                       "timezone": "Asia/Kolkata"
    *                                   },
    *                   "request_id": "RES_93066",
    *                   "is_completed": 0,
    *                   "is_cancelled": 0,
    *                   "payment_opt": 1,
    *                   "is_paid": 0,
    *                   "is_trip_start": 0,
    *                   "trip_bill": 0,
    *                   "user_name": "test ing",
    *                   "driver_name": null,
    *                   "trip_status": "Trip Not Yet Started",
    *                   "is_paid_message": "Unpaid",
    *                   "payment_type_select": "Cash"
    *               }
    *                   ]
    *   }
    *
     */
    
$router->post('/dispatch/request/list', [
    'as'   => 'Dispatch@dispatch_request_list',
    'uses'  => 'Controller@run',
    'middleware' => [
        //'DispatchTokenCheck.api',

    ]
]);
