<?php

/**
 * @apiGroup           Users
 * @apiName            UserSos
 * @api                {post} /user/sos   User Sos
 * @apiDescription     User Sos
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}      token
 * @apiParam           {String}      name
 * @apiParam           {String}      phone_number
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *   {
 *      "success": "true",
 *      "success_message": "user sos details save successfully",
 *      "sos": [
 *                  {
 *                      "id": 2,
 *                      "name": "customer care",
 *                      "number": "72007040574"
 *                  },
 *                  {
 *                      "id": 4,
 *                      "name": "police",
 *                      "number": "100456987"
 *                  }
 *      ],
 *      "user_sos": [{
 *                      "name": "gkr",
 *                      "number": "1234567890"
 *      }]
 *   }
 *
 */



$router->post('/user/sos', [
    'as' => 'UserSos@user_sos',
    'uses' => 'Controller@run',
    'middleware' => [
        'userTokenCheck.api',
    ]
]);
