<?php

header("Content-Type: application/json");

require "config.php";

/* READ JSON DATA */
$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode([
        "status" => "error",
        "message" => "No data received"
    ]);
    exit;
}


/* SETTINGS DATA */

$hero_name  = $conn->real_escape_string($data['hero_name']);
$hero_role  = $conn->real_escape_string($data['hero_role']);
$hero_intro = $conn->real_escape_string($data['hero_intro']);

$about_text  = $conn->real_escape_string($data['about_text']);
$about_image = $conn->real_escape_string($data['about_image']);

$whatsapp = $conn->real_escape_string($data['whatsapp']);
$telegram = $conn->real_escape_string($data['telegram']);
$email    = $conn->real_escape_string($data['email']);


/* UPDATE SETTINGS TABLE */

$update = "
UPDATE settings SET
hero_name='$hero_name',
hero_role='$hero_role',
hero_intro='$hero_intro',
about_text='$about_text',
about_image='$about_image',
whatsapp='$whatsapp',
telegram='$telegram',
email='$email'
WHERE id=1
";

$conn->query($update);


/* ACTION BUTTONS */

$conn->query("DELETE FROM actions");


if(isset($data['actions']) && is_array($data['actions'])){

    foreach($data['actions'] as $a){

        $title       = $conn->real_escape_string($a['title']);
        $description = $conn->real_escape_string($a['description']);
        $icon        = $conn->real_escape_string($a['icon']);
        $link        = $conn->real_escape_string($a['link']);

        $conn->query("
        INSERT INTO actions (title,description,icon,link)
        VALUES ('$title','$description','$icon','$link')
        ");

    }

}


/* RESPONSE */

echo json_encode([
    "status" => "success",
    "message" => "Content saved successfully"
]);

?>