<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
include_once './vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('118545280909-jiv1nd0btgdf4j5a290pqb8t7jd3rfoc.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Alumni/logreg/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');
