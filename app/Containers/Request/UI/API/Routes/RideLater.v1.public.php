<?php

/**
 * @apiGroup           Request
 * @apiName            Ride Later
 * @api                {post} /user/ridelater Ride Later
 * @apiDescription     Ride Later
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {String}      platitude
 * @apiParam           {String}      plongitude
 * @apiParam           {String}      dlongitude
 * @apiParam           {String}      dlatitude
 * @apiParam           {String}      plocation
 * @apiParam           {String}      dlocation
 * @apiParam           {String}      paymentOpt
 * @apiParam           {String}      type
 * @apiParam           {String}      timezone
 * @apiParam           {String}      datetime
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 *{
 *  "success": true,
 *  "success_message": "Trip_registered_successfully",
 *}
 *
 */

$router->post('/user/ridelater', [
    'as' => 'Request@ridelater',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



