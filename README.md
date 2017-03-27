Yii 2 Basic Application Template
================================

Yii 2 Basic Application Template is a skeleton Yii 2 application best for
rapidly creating small projects.

It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yii2mod/base/v/stable)](https://packagist.org/packages/yii2mod/base)
[![Total Downloads](https://poser.pugx.org/yii2mod/base/downloads)](https://packagist.org/packages/yii2mod/base)
[![License](https://poser.pugx.org/yii2mod/base/license)](https://packagist.org/packages/yii2mod/base)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yii2mod/base/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yii2mod/base/?branch=master) 
[![Code Climate](https://codeclimate.com/github/yii2mod/base/badges/gpa.svg)](https://codeclimate.com/github/yii2mod/base)
[![Build Status](https://travis-ci.org/yii2mod/base.svg?branch=master)](https://travis-ci.org/yii2mod/base)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

## FEATURES
- Sign in, Sign up, etc
- User management
- RBAC with predefined `guest`, `user` and `admin` roles
- RBAC migrations support
- Content management components: cms, comments
- Yii2 component for logging cron jobs
- Account page
- Key-value storage component
- Scheduling extension for running cron jobs
- Support multipath migrations


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

## Installing using Composer

If you do not have [Composer](http://getcomposer.org/), follow the instructions in the
[Installing Yii](https://github.com/yiisoft/yii2/blob/master/docs/guide/start-installation.md#installing-via-composer) section of the definitive guide to install it.

With Composer installed, you can then install the application using the following commands:

    composer global require "fxp/composer-asset-plugin:~1.1.1"
    composer create-project --prefer-dist --stability=dev yii2mod/base application

The first command installs the [composer asset plugin](https://github.com/francoispluchino/composer-asset-plugin/)
which allows managing bower and npm package dependencies through Composer. You only need to run this command
once for all. The second command installs the yii2mod/base application in a directory named `application`.
You can choose a different directory name if you want.

CONFIGURATION
-------------
After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Create a new database and adjust the `components['db']` configuration in `config/common-local.php` accordingly.

2. Apply migrations:
    - `php yii migrate` - create default tables for application
    - `php yii rbac/migrate` - create roles, permissions and rules

3. Set document root of your web server to `/path/to/application/web/` folder.


####To login into the application, use the following credentials:
- email - `admin@example.org`
- password - `123123`

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
composer exec codecept run
``` 

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ``` 

5. (Optional) Create `yii2_basic_tests` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   composer exec codecept run

   # run acceptance tests
   composer exec codecept run acceptance

   # run only unit and functional tests
   composer exec codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
composer exec codecept run -- --coverage-html --coverage-xml

#collect coverage only for unit tests
composer exec codecept run unit -- --coverage-html --coverage-xml

#collect coverage for unit and functional tests
composer exec codecept run functional,unit -- --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.

Special thanks to
------------
[![PhpStorm](http://resources.jetbrains.com/assets/media/open-graph/jetbrains_250x250.png)](https://www.jetbrains.com/phpstorm/)
