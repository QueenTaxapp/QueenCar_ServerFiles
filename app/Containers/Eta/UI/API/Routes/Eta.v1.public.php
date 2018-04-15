<?php

/**
 * @apiGroup           Eta
 * @apiName            Get Eta of Trip
 * @api                {post} '/application/eta Get Eta of Trip
 * @apiDescription     Get Eta of Trip
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}      id    user id
 * @apiParam           {String}      token    user token
 * @apiParam           {String}      type_id    type id
 * @apiParam           {String}      olat
 * @apiParam           {String}      olng
 * @apiParam           {String}      dlat
 * @apiParam           {String}      dlng
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   {
 *       "success": true,
 *       "success_message": "Eta_For_Trip",
 *       "distance": 2.430000000000000159872115546022541821002960205078125,
 *       "time": 10,
 *       "base_distance": 1,
 *       "base_price": 1,
 *       "price_per_distance": 10,
 *       "price_per_time": 10,
 *       "distance_price": "14.30",
 *       "time_price": 100,
 *       "total": "126.82",
 *       "tax": "10",
 *       "tax_amount": "11.53",
 *       "ride_fare": "115.29",
 *       "currency":"$",
 *       "type_id":3,
 *       "type_name":"BMW"
 *   }
 *
 */

$router->post('/application/eta', [
    'as' => 'eta@get_eta',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



