<?php

$db_host = "192.168.1.226";
$db_username = "root";
$db_password = "itmd430";
$db_name = "bugoverflow_database";

// Create connection
$db = new mysqli($db_host, $db_username, $db_password,$db_name);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
<!--VS CODE TEST-->
