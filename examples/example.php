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

// define api
$api = new LinkedIn($appKey, $appSecret);

// do query
// @todo
$results = array();

// show results
print_r($results);
