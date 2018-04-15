<?php

/**
 * @apiGroup           Payment
 * @apiName            Card List
 * @api                {post} /user/cardlist Card List
 * @apiDescription     Card List
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id    user id
 * @apiParam           {String}      token    user token
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
 *  "success": true,
 *  "success_message": "Get_card_list",
 *  "payment": [
 *      {
 *      "card_id": 1,
 *      "last_number": "12",
 *      "card_type": "VISA",
 *      "is_default": false
 *      },
 *      {
 *      "card_id": 2,
 *      "last_number": "12",
 *      "card_type": "VISA",
 *      "is_default": true
 *      }
 *  ]
 *}
 *
 */

$router->post('/user/cardlist', [
    'as' => 'payment@list_card',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



