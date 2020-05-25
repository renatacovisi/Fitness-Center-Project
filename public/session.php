<?php
require('../classes/user.php');
require_once ('../public/config.php');
#starts a new session for the user
session_start();
$user = isset( $_SESSION['userEmail'] ) ? user::getByEmail($_SESSION['userEmail'], connect()) : user::generatePublicUser();

?>
