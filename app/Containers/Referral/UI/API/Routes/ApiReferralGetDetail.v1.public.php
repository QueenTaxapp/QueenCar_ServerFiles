<?php

/**
 * @apiGroup           Users
 * @apiName            Get Referral Detail
 * @api                {post} /user/getreferral Get Referral Detail
 * @apiDescription     Get Referral Detail
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
 *      "success": true,
 *      "success_message": "Get_Referral_code",
 *      "code": "0eadv",
 *      "earned": 100,
 *      "spent": 0,
 *      "balance": 0,
 *      "currency":"Rp"
 * }
 *
 */

    $router->post('/user/getreferral', [
        'as'   => 'referral@getreferral',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



