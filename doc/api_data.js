define({ "api": [
  {
    "group": "Users",
    "name": "UserLogin",
    "type": "post",
    "url": "/user/login",
    "title": "User Login",
    "description": "<p>User Login</p>",
    "version": "1.0.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Accept",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "email",
            "description": "<p>Email or Username both of them valid</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "password",
            "description": "<p>password is required when login_method=manual</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "device_token",
            "description": "<p>Device Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "login_by",
            "defaultValue": "android|ios",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "login_method",
            "defaultValue": "manual|facebook|google",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "social_unique_id",
            "description": "<p>social_unique_id is required when login_method=facebook|google</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n       \"success\": true,\n        \"user\": {\n                \"id\": 1,\n                \"firstname\": \"vicky\",\n                \"lastname\": \"test\",\n                \"email\": \"vickytest@gmail.com\",\n                \"phone\": \"7200704057\",\n                \"login_by\": \"android\",\n                \"login_method\": \"manual\"\n                }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./app/Containers/Hero/UI/API/Routes/ApiHeroLogin.v1.private.php",
    "groupTitle": "Users"
  },
  {
    "group": "Users",
    "name": "UserLogin",
    "type": "post",
    "url": "/user/login",
    "title": "User Login",
    "description": "<p>User Login</p>",
    "version": "1.0.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Accept",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "email",
            "description": "<p>Email or Username both of them valid</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "password",
            "description": "<p>password is required when login_method=manual</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "device_token",
            "description": "<p>Device Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "login_by",
            "defaultValue": "android|ios",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "login_method",
            "defaultValue": "manual|facebook|google",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "social_unique_id",
            "description": "<p>social_unique_id is required when login_method=facebook|google</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n       \"success\": true,\n        \"user\": {\n                \"id\": 1,\n                \"firstname\": \"vicky\",\n                \"lastname\": \"test\",\n                \"email\": \"vickytest@gmail.com\",\n                \"phone\": \"7200704057\",\n                \"login_by\": \"android\",\n                \"login_method\": \"manual\"\n                }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./app/Containers/User/UI/API/Routes/ApiUserLogin.v1.private.php",
    "groupTitle": "Users"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/commander/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_commander_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/browser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/browser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/browser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/browser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/browser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_browser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/debug.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/debug.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/debug.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/debug.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/debug.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/debug.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_debug_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/node.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_node_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_node_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/node.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_node_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_node_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/debug/src/node.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_debug_src_node_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_debug_src_node_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/json-schema-ref-parser/dist/ref-parser.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_json_schema_ref_parser_dist_ref_parser_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/ms/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/ms/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/ms/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/ms/index.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_ms_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/z-schema/dist/ZSchema-browser-test.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_z_schema_dist_ZSchema_browser_test_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_z_schema_dist_ZSchema_browser_test_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./node_modules/z-schema/dist/ZSchema-browser-test.js",
    "group": "_opt_lampp_htdocs_apiato_node_modules_z_schema_dist_ZSchema_browser_test_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_node_modules_z_schema_dist_ZSchema_browser_test_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/flot-spline/js/jquery.flot.spline.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_flot_spline_js_jquery_flot_spline_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_flot_spline_js_jquery_flot_spline_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/flot-spline/js/jquery.flot.spline.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_flot_spline_js_jquery_flot_spline_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_flot_spline_js_jquery_flot_spline_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/flot-spline/js/jquery.flot.spline.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_flot_spline_js_jquery_flot_spline_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_flot_spline_js_jquery_flot_spline_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_dist_transitionize_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./public/resources/vendors/transitionize/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_public_resources_vendors_transitionize_transitionize_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/flot-spline/js/jquery.flot.spline.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_flot_spline_js_jquery_flot_spline_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_flot_spline_js_jquery_flot_spline_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/flot-spline/js/jquery.flot.spline.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_flot_spline_js_jquery_flot_spline_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_flot_spline_js_jquery_flot_spline_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/flot-spline/js/jquery.flot.spline.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_flot_spline_js_jquery_flot_spline_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_flot_spline_js_jquery_flot_spline_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/expect.js/index.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_expect_js_index_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/parsleyjs/bower_components/mocha/mocha.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_parsleyjs_bower_components_mocha_mocha_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/dist/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_dist_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/switchery/switchery.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_switchery_switchery_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/dist/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_dist_transitionize_js",
    "name": "Public"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "private",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_transitionize_js",
    "name": "Private"
  },
  {
    "type": "",
    "url": "public",
    "title": "",
    "version": "0.0.0",
    "filename": "./vendor/resources/transitionize/transitionize.js",
    "group": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_transitionize_js",
    "groupTitle": "_opt_lampp_htdocs_apiato_vendor_resources_transitionize_transitionize_js",
    "name": "Public"
  }
] });
