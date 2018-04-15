<?php

/**
* @apiGroup           Users
* @apiName            List Favorite Place
* @api                {post} /user/listfav List Favourite Place
* @apiDescription     List Favourite Place
* @apiVersion         1.0.0
* @apiPermission      none
*
* @apiHeader          Accept application/json
*
* @apiParam           {Integer}     id   user id
* @apiParam           {String}     token    user token
*
*
* @apiSuccessExample  {json}    Success-Response:
*   HTTP/1.1 200 OK
*{
*       "success": true,
*       "success_message": "Favorite_Added_Successfully",
*       "favplace": [
*                       {
*                           "id": 15,
*                           "placeId": "PN Palayam Road 79-81, Poosari Palayam (Near Maniakaram Palayam), Coimbatore, Tamil Nadu 641006, India",
*                           "nickName": "Home",
*                           "latitude": 11.0288691599999992831726558506488800048828125,
*                           "longitude": 76.980731109999993577730492688715457916259765625
*                       },
*                       {
*                           "id": 16,
*                           "placeId": "V Market Road, Old Salem City, Salem, Tamil Nadu 636001, India",
*                           "nickName": "Salem",
*                           "latitude": 11.0236520000000002283968569827266037464141845703125,
*                           "longitude": 76.152451200000001563239493407309055328369140625
*                       },
*                       {
*                           "id": 17,
*                           "placeId": "5, G K D Nagar, P N Palayam, Coimbatore, Tamil Nadu 641037, India",
*                           "nickName": "Office",
*                           "latitude": 11.0236520000000002283968569827266037464141845703125,
*                           "longitude": 76.152451200000001563239493407309055328369140625
*                       }
*       ]
*}
*
*/

    $router->post('/user/listfav', [
        'as'   => 'FavoritePlace@listFav',
        'uses' => 'Controller@run',
        'middleware' => [
            'userTokenCheck.api',
        ]
    ]);



