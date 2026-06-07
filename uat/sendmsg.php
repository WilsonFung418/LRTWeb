<?php
//https://github.com/aaviator42/MatrixTexter

require 'MatrixTexter.php';

$homeserver = "https://matrix.w-solutionshk.xyz";
$username = "wilson";
$password = "luvddr99";
$roomID = "!FQlBPFGzSCIPErqkbD:matrix.w-solutionshk.xyz";

//authenticate with homeserver
$accessToken = \MatrixTexter\login($homeserver, $username, $password);

$message = "Test Message!";

//send message to room
\MatrixTexter\sendMessage($homeserver, $accessToken, $roomID, $message);

//inavlidate access token
\MatrixTexter\logout($homeserver, $accessToken); 

?>
