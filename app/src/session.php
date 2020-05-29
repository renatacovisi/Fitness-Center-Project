<?php

require_once(FIXED_PATH."/Fitness-Center-Project/classes/User.php");
#starts a new session for the user
session_start();
$user = isset( $_SESSION['userEmail'] ) ? User::getByEmail($_SESSION['userEmail'], connect()) : User::generatePublicUser();

?>
