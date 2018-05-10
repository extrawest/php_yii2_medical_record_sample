# medical-card-test

## Installation

### Development Environment

* run init instructions: `./init-container.sh`
* edit .env file manually (if needed)

### Development Urls
* http://localhost:8081/ - backend interface
* http://localhost:8082/api - REST api
* http://localhost:8083/api - Test REST api (for functional tests)
* http://localhost:8082/doc - REST api documentation

### Default Credentials
* After docker deploy, backend and REST credentials are: admin/123

## Environments
* Debug settings:
  * YII_DEBUG - (true|false)
  * YII_ENV - system environment (dev|prod)
* Request parameters
  * COOKIE_VALIDATION_KEY - random string, cookie salt
* Database settings
  * DB_DSN - database DSN (e.g. mysql:host=127.0.0.1;port=3306;dbname=medical)
  * DB_USERNAME - database user name
  * DB_PASSWORD - database user password
  * DB_TEST_DSN - test database DSN (e.g. mysql:host=127.0.0.1;port=3306;dbname=medical_test)
  * DB_TEST_USERNAME - test database user name
  * DB_TEST_PASSWORD - test database user password
  * DB_TABLE_PREFIX (optional)
* API settings
  * API_URL = http://localhost:8082/api/v1
  * API_TEST_URL = http://localhost:8083/api/v1

## Command line routines

* `console/yii migrate` - Upgrades the application by applying new migrations
* `apidoc -i api/ -o api/web/doc/` - Regenerate Api documentation
* `vendor/bin/codecept run unit --config=tests/codeception/api` - Unit tests
# php_yii2_medical_record_sample
