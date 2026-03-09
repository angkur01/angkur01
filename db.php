<?php
$host = "sql12.freesqldatabase.com";
$user = "sql12819336";
$pass = "W2UZxLEJEZ";
$db = "sql12819336";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed");
}
?>