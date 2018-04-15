<?php

/**
 * @apiGroup           Dispatch
 * @apiName            Dispatch DashBoard
 * @api                {post} /dispatch/dashboard Dispatch DashBoard
 * @apiDescription     it is used to reterive Dispatch DashBoard based values
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token

 *
 * @apiSuccessExample  {json}    Success-Response:
 *  {
 *      "success": true,
 *      "success_message": " dispatch_dashboard",
 *      "dispatch_dashboard": {
 *                             "completedTrips": 0,
 *                             "cancelledTrips": 0,
 *                             "ongoingTrips": 0,
 *                             "last7DaysCompletedTrips":
 *                              {
 *                                  "2018-01-28": 0,
 *                                  "2018-01-27": 0,
 *                                  "2018-01-26": 0,
 *                                  "2018-01-25": 0,
 *                                  "2018-01-24": 0,
 *                                  "2018-01-23": 0,
 *                                  "2018-01-22": 0
 *                              },
 *                              "last12MonthsCompletedTrips":
 *                              {
 *                                  "2017-12": 0,
 *                                  "2017-11": 0,
 *                                  "2017-10": 0,
 *                                  "2017-09": 0,
 *                                  "2017-08": 0,
 *                                  "2017-07": 0,
 *                                  "2017-06": 0,
 *                                  "2017-05": 0,
 *                                  "2017-04": 0,
 *                                  "2017-03": 0,
 *                                  "2017-02": 0,
 *                                  "2017-01": 0
 *                              },
 *                              "last12MonthsCancelledTrips":
 *                              {
 *                                  "2017-12": 0,
 *                                  "2017-11": 0,
 *                                  "2017-10": 0,
 *                                  "2017-09": 0,
 *                                  "2017-08": 0,
 *                                  "2017-07": 0,
 *                                  "2017-06": 0,
 *                                  "2017-05": 0,
 *                                  "2017-04": 0,
 *                                  "2017-03": 0,
 *                                  "2017-02": 0,
 *                                  "2017-01": 0
 *                              }
 *                            }
 *  }
 *
 *
 *
 *
 */
$router->post('/dispatch/dashboard', [
    'as'   => 'Dispatch@dispatch_dashboard',
    'uses'  => 'Controller@run',
    'middleware' => [

      // 'DispatchTokenCheck.api',


    ]
]);
