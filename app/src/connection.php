<?php
//creates an connection object to be used in all queries
function connect() {
    return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
}
?>