<?php
function connect() {
    return new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
}
?>