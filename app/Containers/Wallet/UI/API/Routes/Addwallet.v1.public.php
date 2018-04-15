<?php

/**
 * @apiGroup           Wallet
 * @apiName            Add wallet
 * @api                {post} /user/addwallet Add wallet
 * @apiDescription     Add wallet
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 * @apiParam           {String}      card_id
 * @apiParam           {String}      amount
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
 *  "success": true,
 *  "success_message": "Added Wallet Successfully",
 *  "amount_added": 100,
 *  "amount_balance": 100,
 *  "amount_spent": 0,
 *  "currency":"Rp"
 * }
 *
 */

$router->post('/user/addwallet', [
    'as' => 'wallet@add_wallet',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



