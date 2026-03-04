<?php

$host = "sql308.infinityfree.com";
$user = "if0_41298912";
$password = "kRAR5F7ZdbItFC";
$database = "if0_41298912_angkur"; // change if using another database

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>