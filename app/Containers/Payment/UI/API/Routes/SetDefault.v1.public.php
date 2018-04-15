<?php

/**
 * @apiGroup           Payment
 * @apiName            Change Default Card
 * @api                {post} /user/carddefault Change Default Card
 * @apiDescription     Change Default Card
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id   user id
 * @apiParam           {String}      token   user token
 * @apiParam           {String}      card_id
 *
 * @apiSuccessExample  {json}    Success-Response:
 *
 * {
 *  "success": true,
 *  "success_message": "default_changed",
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
 * }
 *
 */

$router->post('/user/carddefault', [
    'as' => 'payment@change_default',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



