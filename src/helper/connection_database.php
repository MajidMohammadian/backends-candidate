<?php
global $db;

// Create connection
$db = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

// Check connection
if ($db->connect_error) {
    die("Mysql connection failed: " . $db->connect_error);
}