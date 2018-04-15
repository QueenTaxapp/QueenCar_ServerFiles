<?php

/**
 * @apiGroup           Company
 * @apiName            Company List
 * @api                {post} /company/list  Company List
 * @apiDescription     Company List
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiHeader          Accept application/json
 *
 *
 * @apiSuccessExample  {json}    Success-Response:
 *   HTTP/1.1 200 OK
 * {
 * "success": true,
 * "success_message": "Company List",
 * "company": [
 *          {
 *              "id": 1,
 *              "name": "vicky1"
 *          },
 *          {
 *              "id": 2,
 *              "name": "RKV builders 2"
 *          },
 *          {
 *              "id": 7,
 *              "name": "vinoth R"
 *          }
 *              ]
 * }
 *
 */
        $router->post('/company/list', [
            'as' => 'Company@company_list',
            'uses' => 'Controller@run',
            'middleware' => [
//                'userTokenCheck.api',
            ]
        ]);