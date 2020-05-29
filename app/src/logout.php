<?php
require('../../public/config.php');
//includes session
require_once(FIXED_PATH."/Fitness-Center-Project/app/src/session.php");

//if the user is public, redirects to index.php
if ($user->type == "public") {
    header( "Location: ../../public/index.php" );
    exit;
}

//remove the username session key
unset( $_SESSION['userEmail'] );
//redirect back to index.php
header( "Location: ../../public/index.php?action=confirmLogout" );
exit;
?>