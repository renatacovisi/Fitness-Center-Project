<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/Fitness-Center-project/classes/User.php");
require_once("$root/Fitness-Center-project/public/config.php");
#starts a new session for the user
session_start();
$user = isset( $_SESSION['userEmail'] ) ? User::getByEmail($_SESSION['userEmail'], connect()) : User::generatePublicUser();

?>
