<?php

require_once '../google/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('826136951872-06fdmreaeu1hjm47jgb4j18ds775jam7.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('az2WQARfpXq5MCY9Q8ajik0z');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:123/pWS19ikmigratua/php/Layout.php');
$google_client->addScope('email');

$google_client->addScope('profile');
?>