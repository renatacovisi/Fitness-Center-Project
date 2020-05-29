<?php

require_once(FIXED_PATH."/Fitness-Center-Project/classes/User.php");
//starts a new session for the user
session_start();
//sets a user with the email supllied by the login page or sets a public user
$user = isset( $_SESSION['userEmail'] ) ? User::getByEmail($_SESSION['userEmail'], connect()) : User::generatePublicUser();

function isLoggedIn($user) {
    return $user->type == "admin" || $user->type == "member";
}

?>
