<?php

/**
 * LinkedIn API test
 *
 * @author Jeroen Desloovere <jeroen@siesqo.be>
 */

// require
require_once('../linkedin.php');

// define variables
$consumerKey = '';
$consumerSecret = '';
$token = '';
$tokenSecret = '';

// define API
$API = new LinkedIn($consumerKey, $consumerSecret, $token, $tokenSecret);

// do query
// @todo
$results = array();

// show results
print_r($results);
