<?php

/**
 * @apiGroup           Compliants
 * @apiName            Compliants List
 * @api                {post} /compliants/list Compliants List
 * @apiDescription     Driver Profile
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 * @apiParam           {Integer}     id
 * @apiParam           {String}     token
 * @apiParam           {Integer}     type 1 = user , 2 = driver
 * @apiParam           {Double}     latitude
 * @apiParam           {Double}     longitude
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 *  {
 *      "success": true,
 *      "success_message": "complaint_list",
 *      "complaint_list": [
 *          {
 *              "id": 4,
 *              "title": "test"
 *          }
 *      ],
 *      "admin_key":"533771"
 *  }
 *
 */



        $router->post('compliants/list', [
            'as' => 'Compliant@compliant_list',
            'uses' => 'Controller@run',
            'middleware' => [
               // 'DriverTokenCheck.api',
//                'userTokenCheck.api',
            ]
        ]);
