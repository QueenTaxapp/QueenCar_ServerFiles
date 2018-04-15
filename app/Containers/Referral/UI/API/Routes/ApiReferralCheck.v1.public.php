<?php

/**
 * @apiGroup           Users
 * @apiName            Check Referral Code
 * @api                {post} /user/referralcheck Check Referral Code
 * @apiDescription     Check Referral Token
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 * @apiParam           {String}      referral_code
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
*       "success": true,
*       "success_message": "Referral_Added_Successfully"
*   }
 *
 */

    $router->post('/user/referralcheck', [
        'as'   => 'referral@referral_check',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



