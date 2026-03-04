<?php

header('Content-Type: application/json');

require "config.php";

$settings = [];
$actions = [];


/* SETTINGS */
$sq = $conn->query("SELECT * FROM settings LIMIT 1");
if($sq){
    $settings = $sq->fetch_assoc();
}


/* ACTION BUTTONS */
$aq = $conn->query("SELECT * FROM actions ORDER BY id ASC");

while($row = $aq->fetch_assoc()){
    $actions[] = $row;
}


echo json_encode([
    "settings" => $settings,
    "actions" => $actions
]);

?>