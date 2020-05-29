<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/Dublin" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost:3308;dbname=sunrise" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "classes" );
define("SRC_PATH", "/app/src");
define( "TEMPLATE_PATH", "templates" );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
define( "CLASSES_PER_PAGE", 8);
define( "LOCAL", true);
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
if (LOCAL) {
    define("FIXED_PATH", $root);
    define("WEB_URL_PREFIX", "");
}
else {
    define("FIXED_PATH", "/home/s3021651/public_html");
    define("WEB_URL_PREFIX", "/~s3021651");
}
//require_once(FIXED_PATH."/Fitness-Center-Project/app/src/connection.php");



function handleException( $exception ) {
    echo "Sorry, a problem occurred. Please try later.";
    echo $exception;
}

set_exception_handler( 'handleException' );
?>
