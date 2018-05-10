<?php

/**
 * @api {get} /api/v1/medical-cards/ List of medical cards
 * @apiVersion 1.0.0
 * @apiName patientList
 * @apiGroup MedicalCards
 *
 *
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *      [
 *        {
 *          "id": 1,
 *          "first_name": "John",
 *          "last_name": "Doe",
 *          "date_of_birth": "2018-03-05",
 *          "gender": "Male",
 *          "nationality": "British",
 *          "_links": {
 *            "self": {
 *              "href": "http://localhost:8082/api/v1/medical-cards/1/"
 *            }
 *         }
 *      }]
 *
 * @apiUse AuthRequired
 */

/**
 * @api {get} /api/v1/medical-cards/{id}/ View medical card by ID
 * @apiVersion 1.0.0
 * @apiName patientView
 * @apiGroup MedicalCards
 *
 * @apiParam {Number} id Medical card ID
 * @apiParam {String="nutrition","nutritionalDiagnosis","continence"} expand Expand result with optional attributes
 *
 *
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *        {
 *          "id": 1,
 *          "first_name": "John",
 *          "last_name": "Doe",
 *          "date_of_birth": "2018-03-05",
 *          "gender": "Male",
 *          "nationality": "British",
 *          "_links": {
 *            "self": {
 *              "href": "http://localhost:8082/api/v1/medical-cards/1/"
 *            }
 *         }
 *      }
 *
 * @apiUse AuthRequired
 */

/**
 * @api {post} /api/v1/medical-cards/ Create new medical card
 * @apiVersion 1.0.0
 * @apiName patientCreate
 * @apiGroup MedicalCards
 *
 * @apiParam {String} first_name (Required) Patient first name
 * @apiParam {String} last_name (Required) Patient last name
 * @apiParam {Date} date_of_birth (Required) Patient date of birth
 * @apiParam {Numeric=1,2} gender (Required) Patient gender (1-male, 2-female)
 * @apiParam {Numeric} nationality_id (Required) Patient nationality (see all list in nationality API)
 *
 *
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 201 Created
 *        {
 *          "id": 1,
 *          "first_name": "John",
 *          "last_name": "Doe",
 *          "date_of_birth": "2018-03-05",
 *          "gender": "Male",
 *          "nationality": "British",
 *          "_links": {
 *            "self": {
 *              "href": "http://localhost:8082/api/v1/medical-cards/1/"
 *            }
 *         }
 *      }
 *
 * @apiUse AuthRequired
 */

/**
 * @api {put} /api/v1/medical-cards/{id}/ Update medical card
 * @apiVersion 1.0.0
 * @apiName patientUpdate
 * @apiGroup MedicalCards
 *
 * @apiParam {Numeric} id (Required) Medical card ID
 * @apiParam {String} first_name (Required) Patient first name
 * @apiParam {String} last_name (Required) Patient last name
 * @apiParam {Date} date_of_birth (Required) Patient date of birth
 * @apiParam {Numeric=1,2} gender (Required) Patient gender (1-male, 2-female)
 * @apiParam {Numeric} nationality_id (Required) Patient nationality (see all list in nationality API)
 * @apiParam {Array} nutrition Nutrition IDs (see all list in nutrition API)
 * @apiParam {Array} nutritionalDiagnosis Nutritional Diagnosis IDs (see all list in $nutritionalDiagnosis API)
 * @apiParam {Numeric=1,2,3,4} urine_continent_daytime Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)
 * @apiParam {Numeric=1,2,3,4} faeces_continent_daytime Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)
 * @apiParam {Numeric=1,2,3,4} urine_continent_nightime Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)
 * @apiParam {Numeric=1,2,3,4} faeces_continent_nightime Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)
 *
 *
 * @apiSuccessExample Success-Response:
 *      HTTP/1.1 200 OK
 *        {
 *          "id": 1,
 *          "first_name": "John",
 *          "last_name": "Doe",
 *          "date_of_birth": "2018-03-05",
 *          "gender": "Male",
 *          "nationality": "British",
 *          "_links": {
 *            "self": {
 *              "href": "http://localhost:8082/api/v1/medical-cards/1/"
 *            }
 *         }
 *      }
 *
 * @apiUse AuthRequired
 */
