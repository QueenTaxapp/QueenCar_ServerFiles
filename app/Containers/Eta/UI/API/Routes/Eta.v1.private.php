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
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {String}      type_id
 * @apiParam           {String}      olat
 * @apiParam           {String}      olng
 * @apiParam           {String}      dlat
 * @apiParam           {String}      dlng
 *
 * @apiSuccessExample  {json}    Success-Response:
 * {
 *  "success": true,
 *  "success_message": "Eta_For_Trip",
 *  "distance": 90.48404502000001,
 *  "time": 183,
 *  "base_distance": 0.621371,
 *  "base_price": 1,
 *  "price_per_distance": 1,
 *  "price_per_time": 1,
 *  "distance_price": "89.86",
 *  "time_price": 183,
 *  "total": "301.25",
 *  "tax": "10",
 *  "tax_amount": "27.39",
 *  "ride_fare": "273.86",
 *  "currency": 1,
 *  "type_id": 1,
 *  "type_name": "BMW",
 *}
 *
 */

$router->post('dispatch/application/eta', [
    'as' => 'eta@get_eta',
    'uses' => 'Controller@run',
    'middleware' => [
        'DispatchTokenCheck.api',
    ]
]);



