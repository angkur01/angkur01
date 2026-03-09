<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $conn->prepare("UPDATE site_config SET 
hero_name=?,
hero_role=?,
hero_intro=?,
about_text=?,
about_image=?,
whatsapp=?,
telegram=?,
email=?,
actions=?,
show_about=? WHERE id=1");

$stmt->bind_param(
"sssssssssi",
$data['hero']['name'],
$data['hero']['role'],
$data['hero']['intro'],
$data['about']['text'],
$data['about']['image'],
$data['contact']['whatsapp'],
$data['contact']['telegram'],
$data['contact']['email'],
json_encode($data['actions']),
$data['settings']['showAbout']
);

$stmt->execute();

echo json_encode(["status"=>"success"]);
?>