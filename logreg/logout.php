<?php

include "./Gconfig.php";

//Reset OAuth access token
// $google_client->revokeToken();

session_start();
$_SESSION = array();
session_destroy();
header("location: login.php");

?>
