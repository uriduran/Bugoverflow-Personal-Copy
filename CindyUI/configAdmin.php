<?php

$db_host = "localhost";
$db_username = "admin";
$db_password = "";
$db_name = "bugoverflow_database";

// Create connection
$db = new mysqli($db_host, $db_username, $db_password,$db_name);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
