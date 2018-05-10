<?php
/**
* @api {post} /api/v1/auth/token/ Request new token
* @apiVersion 1.0.0
* @apiName generateToken
* @apiGroup Authorization
*
* @apiParam {String=password} grant_type OAUTH2 grant type
* @apiParam {String} username Manager Login
* @apiParam {String} password Manager Password
*
* @apiSuccessExample Success-Response:
*      HTTP/1.1 200 OK
*      {
*        "access_token": "IVuirEm-kNAqQx9Bplth4FEZeGSz8eU2Hxo-QUzC",
*        "expires_in": 3600,
*        "token_type": "bearer",
*        "scope": null,
*        "refresh_token": "rw2EFOBxv-5JGhBY05cj3svvwL8jNu91U6aaZpAZ"
*      }
*/

/**
* @api {get} /api/v1/auth/token/ Token Info
* @apiVersion 1.0.0
* @apiName tokenInfo
* @apiGroup Authorization
*
*
* @apiSuccessExample Success-Response:
*      HTTP/1.1 200 OK
*      {
*        "id": 1,
*        "login": "admin",
*        "first_name": "",
*        "last_name": ""
*      }
*
* @apiUse AuthRequired
*/

/**
 * @apiDefine AuthRequired
 *
 * @apiHeader {String} Authorization Access token.
 *
 * @apiParam {String} access_token Access token.
 *
 * @apiError UnauthorizedError Invalid access token provided.
 *
 * @apiErrorExample Error-Response:
 *     HTTP/1.1 401 Unauthorized
 *     {
 *       "name": "Unauthorized",
 *       "message": "Invalid access token",
 *       "code": 401,
 *       "status": 401
 *     }
 *
 * @apiErrorExample Error-Response:
 *     HTTP/1.1 403 Forbidden
 *     {
 *       "name": "Forbidden",
 *       "message": "The access token provided is invalid.",
 *       "code": 0,
 *       "status": 403
 *     }
 */
