# Laravel Google API wrapper to easily add Google API to your Laravel 4 / 5 project

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package is simply a wrapper around the "[google/google-api-php-client][link-googleapiphpclient]" library so before
submitting an issue request please take that into account.

I created this package to be a simple way to add the Google API to Laravel projects.

## Requirements
PHP >= 5.4<br>
A Google developer account with Google API enabled and properly configured for the service you plan on using.

## Installation
Run "composer require rodshaffer/laravel-gapi" in the root folder of your Laravel project.

OR

Add the following to the "require" section in your Laravel project composer.json file.

	"rodshaffer/laravel-gapi": "^1.0.0"
	
and then run composer update.

Please note: The next couple of steps (adding the lines to the "confgi/app.php" configuration file) are optional when
using Laravel >= version 5.5 as the package will be auto discovered.

Add the following line to the "package" or "application" providers array(depending on the version of Laravel you are
using) in the Laravel "config/app.php" configuration file.

    'RodShaffer\GoogleApi\Providers\GoogleApiServiceProvider',
    
Add the following line to the "aliases" array in the Laravel "config/app.php" configuration file.

    "GoogleService" => "RodShaffer\GoogleApi\Facades\GoogleService",

Finally run<br><br>
`php artisan vendor:publish --provider="RodShaffer\GoogleApi\Providers\GoogleApiServiceProvider" --tag="config"`<br><br>
to publish the config file.

Make sure you enter the required information for using the Google API service into your Laravel application ".env"
config file as this is where the GoogleService configuration pulls it's settings from refer to "config/googleapi.php"
for the appropriate environment variables.

## How to use

For usage instructions "[go here][link-googleapidocs]".

[ico-version]: https://img.shields.io/packagist/v/RodShaffer/laravel-gapi.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-Apache2-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/RodShaffer/laravel-gapi/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/RodShaffer/laravel-gapi.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/RodShaffer/laravel-gapi.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/RodShaffer/laravel-gapi.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/RodShaffer/laravel-gapi
[link-travis]: https://travis-ci.org/RodShaffer/laravel-gapi
[link-scrutinizer]: https://scrutinizer-ci.com/g/RodShaffer/laravel-gapi/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/RodShaffer/laravel-gapi
[link-downloads]: https://packagist.org/packages/RodShaffer/laravel-gapi
[link-author]: https://github.com/RodShaffer
[link-contributors]: ../../contributors

[link-googleapiphpclient]: https://github.com/google/google-api-php-client
[link-googleapidocs]: https://www.rodshaffer.com/articles/13
