<?php

/**
 * @apiGroup           Payment
 * @apiName            Add Payment Card
 * @api                {post} /user/addcard Add Payment Card
 * @apiDescription     Add Payment Card
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 * @apiParam           {String}      payment_id
 * @apiParam           {String}      last_number
 * @apiParam           {String}      card_type
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
 *  "success": true,
 *  "success_message": "Card_Added_Successfully",
 *  "payment":[
 *      {
 *      "card_id": 1,
 *      "last_number": "12",
 *      "card_type": "VISA",
 *      "is_default": false
 *      }
 *  ]
 * }
 *
 */

$router->post('/user/addcard', [
    'as' => 'payment@add_card',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



