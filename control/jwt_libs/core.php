<?php
// show error reporting
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Asia/Manila');
 
// variables used for jwt
$key = "Unibh-trabalho-final";
$iss = "http://www.ControlMED.com.br";
$aud = "http://www.ControlMED.com.br";
$iat = 1356999524;
$nbf = 1357000000;
?>