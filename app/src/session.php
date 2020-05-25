<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require("$root/Fitness-Center-project/classes/user.php");
require_once("$root/Fitness-Center-project/public/config.php");
#starts a new session for the user
session_start();
$user = isset( $_SESSION['userEmail'] ) ? user::getByEmail($_SESSION['userEmail'], connect()) : user::generatePublicUser();

?>
