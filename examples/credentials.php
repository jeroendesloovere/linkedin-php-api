<?php

// define own LinkedIn credentials
$appKey = ''; // required
$appSecret = ''; // required

// username and password are required
if (empty($appKey) || empty($appSecret)) {
    echo 'Please define your app key and app secret in ' . __DIR__ . '/credentials.php';
}
