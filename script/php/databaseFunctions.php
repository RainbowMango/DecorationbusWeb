<?php
include("MySQLUtil.php");

function db_connect() {
    $result = new mysqli(DECORATION_BUS_MYSQL_HOST.':'.DECORATION_BUS_MYSQL_PORT, DECORATION_BUS_MYSQL_USER, DECORATION_BUS_MYSQL_PASS, DECORATION_BUS_MYSQL_DB);
    if (!$result) {
        throw new Exception('Could not connect to database server');
    } else {
        return $result;
    }
}

?>

