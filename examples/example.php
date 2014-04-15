<?php

/**
 * LinkedIn API test
 *
 * This LinkedIn API PHP Wrapper class connects to the LinkedIn API.
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */

// add your own credentials in this file
require_once __DIR__ . '/credentials.php';

// required to load
require_once __DIR__ . '/../src/LinkedIn.php';

use JeroenDesloovere\LinkedIn\LinkedIn;

// define api
$api = new LinkedIn($appKey, $appSecret, $oAuthAccessToken);

// get profile
$results = $api->getProfile();

// show results
print_r($results);
