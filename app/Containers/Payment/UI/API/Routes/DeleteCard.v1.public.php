<?php

/**
 * @apiGroup           Payment
 * @apiName            Delete Card
 * @api                {post} /user/deletecard Delete Select Card
 * @apiDescription     Delete Select Card
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
 *  "success_message": "Card_Deleted_Successfully",
 *  "payment": [
 *      {
 *      "card_id": 1,
 *      "last_number": "12",
 *      "card_type": "VISA",
 *      "is_default": true
 *      }
 *  ]
 * }
 *
 */

$router->post('/user/deletecard', [
    'as' => 'payment@delete_card',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);



