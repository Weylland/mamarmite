<?php
require "./functions.php";
$id = $_GET['id'];

$user_picture = basename($_FILES["user_profile_picture"]["name"]);


$uploads_dir = '../asset/img/profil-img';
$tmp_name = $_FILES["user_profile_picture"]["tmp_name"];
move_uploaded_file($tmp_name, "{$uploads_dir}/{$user_picture}");


require "./connexionBdd.php";

$req = $pdo->prepare(
    "
        UPDATE users SET 
        user_profile_picture = ?
        WHERE id = $id
    "
);

$req->execute([
    $user_picture
]);

header('location: ../espace_membre.php');
