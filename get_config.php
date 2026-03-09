<?php
include "db.php";

$result = $conn->query("SELECT * FROM site_config LIMIT 1");

$row = $result->fetch_assoc();

echo json_encode($row);
?>