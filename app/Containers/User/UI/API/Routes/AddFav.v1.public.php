<?php

/**
 * @apiGroup           Users
 * @apiName            Add Favorite Place
 * @api                {post} /user/addfav Add Favourite Place
 * @apiDescription     Add Favourite Place
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *@apiParam           {String}     id    user id
 *@apiParam           {String}     token    user token
 *@apiParam           {String}     nickName
 *@apiParam           {String}     placeId
 *@apiParam           {String}     latitude
 *@apiParam           {String}     longitude
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
*   {
*   "success": true,
*   "success_message": "Favorite_Added_Successfully",
*   "favplace": [
*       {
*       "placeid": "test",
*       "id": 15,
*       "nickName": "test",
*       "latitude": "11.23232",
*       "longitude": "76.3434343"
*       }
*   ]
*   }
 *
 */

    $router->post('/user/addfav', [
        'as'   => 'FavoritePlace@addFav',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



