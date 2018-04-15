<?php

/**
 * @apiGroup           Wallet
 * @apiName            Get Wallet Amount
 * @api                {post} /user/getwallet Get Wallet Amount
 * @apiDescription     Get Wallet Amount
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
 *  "success": true,
 *  "success_message": "Get_Wallet_Amount",
 *  "amount_added": 100,
 *  "amount_balance": 100,
 *  "amount_spent": 0,
 *  "currency":"Rp"
 * }
 *
 */

$router->post('/user/getwallet', [
    'as' => 'wallet@get_wallet_amount',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



