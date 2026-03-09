<?php

$host = "sql12.freesqldatabase.com";
$user = "sql12819336";
$password = "W2UZxLEJEZ";
$database = "sql12819336"; // change if using another database

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>