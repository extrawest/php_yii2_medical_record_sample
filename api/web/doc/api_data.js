define({ "api": [
  {
    "type": "post",
    "url": "/api/v1/auth/token/",
    "title": "Request new token",
    "version": "1.0.0",
    "name": "generateToken",
    "group": "Authorization",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "password"
            ],
            "optional": false,
            "field": "grant_type",
            "description": "<p>OAUTH2 grant type</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Manager Login</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Manager Password</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"access_token\": \"IVuirEm-kNAqQx9Bplth4FEZeGSz8eU2Hxo-QUzC\",\n  \"expires_in\": 3600,\n  \"token_type\": \"bearer\",\n  \"scope\": null,\n  \"refresh_token\": \"rw2EFOBxv-5JGhBY05cj3svvwL8jNu91U6aaZpAZ\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/Authorization.php",
    "groupTitle": "Authorization"
  },
  {
    "type": "get",
    "url": "/api/v1/auth/token/",
    "title": "Token Info",
    "version": "1.0.0",
    "name": "tokenInfo",
    "group": "Authorization",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"id\": 1,\n  \"login\": \"admin\",\n  \"first_name\": \"\",\n  \"last_name\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/Authorization.php",
    "groupTitle": "Authorization",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Access token.</p>"
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
            "optional": false,
            "field": "access_token",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UnauthorizedError",
            "description": "<p>Invalid access token provided.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"name\": \"Unauthorized\",\n  \"message\": \"Invalid access token\",\n  \"code\": 401,\n  \"status\": 401\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Forbidden\n{\n  \"name\": \"Forbidden\",\n  \"message\": \"The access token provided is invalid.\",\n  \"code\": 0,\n  \"status\": 403\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/api/v1/medical-cards/",
    "title": "Create new medical card",
    "version": "1.0.0",
    "name": "patientCreate",
    "group": "MedicalCards",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>(Required) Patient first name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>(Required) Patient last name</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "date_of_birth",
            "description": "<p>(Required) Patient date of birth</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "allowedValues": [
              "1",
              "2"
            ],
            "optional": false,
            "field": "gender",
            "description": "<p>(Required) Patient gender (1-male, 2-female)</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "optional": false,
            "field": "nationality_id",
            "description": "<p>(Required) Patient nationality (see all list in nationality API)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "access_token",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 201 Created\n  {\n    \"id\": 1,\n    \"first_name\": \"John\",\n    \"last_name\": \"Doe\",\n    \"date_of_birth\": \"2018-03-05\",\n    \"gender\": \"Male\",\n    \"nationality\": \"British\",\n    \"_links\": {\n      \"self\": {\n        \"href\": \"http://localhost:8082/api/v1/medical-cards/1/\"\n      }\n   }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/MedicalCards.php",
    "groupTitle": "MedicalCards",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UnauthorizedError",
            "description": "<p>Invalid access token provided.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"name\": \"Unauthorized\",\n  \"message\": \"Invalid access token\",\n  \"code\": 401,\n  \"status\": 401\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Forbidden\n{\n  \"name\": \"Forbidden\",\n  \"message\": \"The access token provided is invalid.\",\n  \"code\": 0,\n  \"status\": 403\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/v1/medical-cards/",
    "title": "List of medical cards",
    "version": "1.0.0",
    "name": "patientList",
    "group": "MedicalCards",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n[\n  {\n    \"id\": 1,\n    \"first_name\": \"John\",\n    \"last_name\": \"Doe\",\n    \"date_of_birth\": \"2018-03-05\",\n    \"gender\": \"Male\",\n    \"nationality\": \"British\",\n    \"_links\": {\n      \"self\": {\n        \"href\": \"http://localhost:8082/api/v1/medical-cards/1/\"\n      }\n   }\n}]",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/MedicalCards.php",
    "groupTitle": "MedicalCards",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Access token.</p>"
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
            "optional": false,
            "field": "access_token",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UnauthorizedError",
            "description": "<p>Invalid access token provided.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"name\": \"Unauthorized\",\n  \"message\": \"Invalid access token\",\n  \"code\": 401,\n  \"status\": 401\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Forbidden\n{\n  \"name\": \"Forbidden\",\n  \"message\": \"The access token provided is invalid.\",\n  \"code\": 0,\n  \"status\": 403\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "put",
    "url": "/api/v1/medical-cards/{id}/",
    "title": "Update medical card",
    "version": "1.0.0",
    "name": "patientUpdate",
    "group": "MedicalCards",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Numeric",
            "optional": false,
            "field": "id",
            "description": "<p>(Required) Medical card ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>(Required) Patient first name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>(Required) Patient last name</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "date_of_birth",
            "description": "<p>(Required) Patient date of birth</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "allowedValues": [
              "1",
              "2"
            ],
            "optional": false,
            "field": "gender",
            "description": "<p>(Required) Patient gender (1-male, 2-female)</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "optional": false,
            "field": "nationality_id",
            "description": "<p>(Required) Patient nationality (see all list in nationality API)</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "nutrition",
            "description": "<p>Nutrition IDs (see all list in nutrition API)</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "nutritionalDiagnosis",
            "description": "<p>Nutritional Diagnosis IDs (see all list in $nutritionalDiagnosis API)</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "allowedValues": [
              "1",
              "2",
              "3",
              "4"
            ],
            "optional": false,
            "field": "urine_continent_daytime",
            "description": "<p>Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "allowedValues": [
              "1",
              "2",
              "3",
              "4"
            ],
            "optional": false,
            "field": "faeces_continent_daytime",
            "description": "<p>Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "allowedValues": [
              "1",
              "2",
              "3",
              "4"
            ],
            "optional": false,
            "field": "urine_continent_nightime",
            "description": "<p>Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)</p>"
          },
          {
            "group": "Parameter",
            "type": "Numeric",
            "allowedValues": [
              "1",
              "2",
              "3",
              "4"
            ],
            "optional": false,
            "field": "faeces_continent_nightime",
            "description": "<p>Urine Continent Daytime <br/> (1-yes, 2-no, 3-sometimes, 4-Required Aids)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "access_token",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": 1,\n    \"first_name\": \"John\",\n    \"last_name\": \"Doe\",\n    \"date_of_birth\": \"2018-03-05\",\n    \"gender\": \"Male\",\n    \"nationality\": \"British\",\n    \"_links\": {\n      \"self\": {\n        \"href\": \"http://localhost:8082/api/v1/medical-cards/1/\"\n      }\n   }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/MedicalCards.php",
    "groupTitle": "MedicalCards",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UnauthorizedError",
            "description": "<p>Invalid access token provided.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"name\": \"Unauthorized\",\n  \"message\": \"Invalid access token\",\n  \"code\": 401,\n  \"status\": 401\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Forbidden\n{\n  \"name\": \"Forbidden\",\n  \"message\": \"The access token provided is invalid.\",\n  \"code\": 0,\n  \"status\": 403\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/v1/medical-cards/{id}/",
    "title": "View medical card by ID",
    "version": "1.0.0",
    "name": "patientView",
    "group": "MedicalCards",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Medical card ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "\"nutrition\"",
              "\"nutritionalDiagnosis\"",
              "\"continence\""
            ],
            "optional": false,
            "field": "expand",
            "description": "<p>Expand result with optional attributes</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "access_token",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  {\n    \"id\": 1,\n    \"first_name\": \"John\",\n    \"last_name\": \"Doe\",\n    \"date_of_birth\": \"2018-03-05\",\n    \"gender\": \"Male\",\n    \"nationality\": \"British\",\n    \"_links\": {\n      \"self\": {\n        \"href\": \"http://localhost:8082/api/v1/medical-cards/1/\"\n      }\n   }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/MedicalCards.php",
    "groupTitle": "MedicalCards",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Access token.</p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "UnauthorizedError",
            "description": "<p>Invalid access token provided.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 401 Unauthorized\n{\n  \"name\": \"Unauthorized\",\n  \"message\": \"Invalid access token\",\n  \"code\": 401,\n  \"status\": 401\n}",
          "type": "json"
        },
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 403 Forbidden\n{\n  \"name\": \"Forbidden\",\n  \"message\": \"The access token provided is invalid.\",\n  \"code\": 0,\n  \"status\": 403\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/v1/nationalities/",
    "title": "List of nationalities",
    "version": "1.0.0",
    "name": "nationalityList",
    "group": "OtherDictionaries",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n[\n  {\n    \"id\": 1,\n    \"name\": \"British\"\n  },\n  {\n    \"id\": 2,\n    \"name\": \"English\"\n  },\n  {\n    \"id\": 3,\n    \"name\": \"Irish\"\n  },\n  {\n    \"id\": 4,\n    \"name\": \"Scottish\"\n  }\n]",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/Other.php",
    "groupTitle": "OtherDictionaries"
  },
  {
    "type": "get",
    "url": "/api/v1/nationalities/",
    "title": "List of nutrition",
    "version": "1.0.0",
    "name": "nutritionList",
    "group": "OtherDictionaries",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n[\n  {\n    \"id\": 1,\n    \"name\": \"Dairy Free\"\n  },\n  {\n    \"id\": 2,\n    \"name\": \"Food cut up\"\n  },\n  {\n    \"id\": 3,\n    \"name\": \"Fortified drinks\"\n  },\n  {\n      \"id\": 4,\n      \"name\": \"Gluten Free\"\n  },\n  {\n      \"id\": 5,\n      \"name\": \"Halal\"\n  },\n  {\n      \"id\": 6,\n      \"name\": \"High Fibre\"\n  },\n  {\n      \"id\": 7,\n      \"name\": \"Kosher\"\n  },\n  {\n      \"id\": 8,\n      \"name\": \"Low salt\"\n  },\n  {\n      \"id\": 9,\n      \"name\": \"Normal\"\n  },\n  {\n      \"id\": 10,\n      \"name\": \"PEG feed\"\n  },\n  {\n      \"id\": 11,\n      \"name\": \"Pureed\"\n  },\n  {\n      \"id\": 12,\n      \"name\": \"Soft\"\n  },\n  {\n      \"id\": 13,\n      \"name\": \"Thickening fluids\"\n  },\n  {\n      \"id\": 14,\n      \"name\": \"Vegan\"\n  },\n  {\n      \"id\": 15,\n      \"name\": \"Wheat Free\"\n  }\n]",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/Other.php",
    "groupTitle": "OtherDictionaries"
  },
  {
    "type": "get",
    "url": "/api/v1/nutritional-diagnosis/",
    "title": "List of nutritional diagnosis",
    "version": "1.0.0",
    "name": "nutritionalDiagnosisList",
    "group": "OtherDictionaries",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n  [\n    {\n      \"id\": 1,\n      \"name\": \"Allergy\"\n    },\n    {\n      \"id\": 2,\n      \"name\": \"Anaemia\"\n    },\n    {\n      \"id\": 3,\n      \"name\": \"Celiac\"\n    },\n    {\n      \"id\": 4,\n      \"name\": \"Constipation\"\n    },\n    {\n      \"id\": 5,\n      \"name\": \"Diabetic\"\n    },\n    {\n      \"id\": 6,\n      \"name\": \"High Blood Pressure\"\n    },\n    {\n      \"id\": 7,\n      \"name\": \"High Cholestorol\"\n    },\n    {\n      \"id\": 8,\n      \"name\": \"IBS\"\n    },\n    {\n      \"id\": 9,\n      \"name\": \"Low Blood Pressure\"\n    }\n  ]",
          "type": "json"
        }
      ]
    },
    "filename": "api/modules/api/v1/doc/Other.php",
    "groupTitle": "OtherDictionaries"
  },
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "api/web/doc/main.js",
    "group": "_home_ksar_Projects_medical_card_test_api_web_doc_main_js",
    "groupTitle": "_home_ksar_Projects_medical_card_test_api_web_doc_main_js",
    "name": ""
  }
] });
