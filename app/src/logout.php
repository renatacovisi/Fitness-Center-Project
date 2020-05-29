<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once(FIXED_PATH."/Fitness-Center-project/app/src/session.php");

if ($user->type == "public") {
    header( "Location: ../../public/index.php" );
    exit;
}

#remove the username session key
unset( $_SESSION['userEmail'] );
#redirect back to index.php
header( "Location: ../../public/index.php?action=confirmLogout" );
exit;
?>