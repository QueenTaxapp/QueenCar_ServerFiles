<?php

/**
 * @apiGroup           Users
 * @apiName            Delete Favorite Place
 * @api                {post} /user/deletefav Delete Favourite Place
 * @apiDescription     Delete Favourite Place
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {String}     id   user id
 *@apiParam           {String}     token    user token
 *@apiParam           {String}     favid
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *
 *  {
*   "success": true,
*   "success_message": "Favorite_Deleted_Successfully",
*   "favid": 15
*   }
 *
 */

    $router->post('/user/deletefav', [
        'as'   => 'FavoritePlace@deleteFav',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



