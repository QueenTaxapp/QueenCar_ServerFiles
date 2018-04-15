<?php

/**
 * @apiGroup           PromoCode
 * @apiName            Suser PromoCode check
 * @api                {post} /user/promocode/check check promocode for user
 * @apiDescription     used to check if promo code exist,active,not,expired,not reached max limit
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam              {id}         id
 * @apiParam              {String}     token
 * @apiParam              {String}         promo_code
 * @apiParam              {id}     request_id
 *
 * @apiHeader          Accept application/json
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *      "success": "true",
 *      "success_message": "Thank you! Enjoy this ride"
 *   }
 *
 *
 *
 */

$router->post('/user/promocode/check', [
    'as'   => 'PromoCode@check_promo_code',
    'uses' => 'Controller@run',
    'middleware' => [
        //'userTokenCheck.api',
    ]
]);



