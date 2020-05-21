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
require( "../app/src/connection.php" );


function handleException( $exception ) {
    echo "Sorry, a problem occurred. Please try later.";
    error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
