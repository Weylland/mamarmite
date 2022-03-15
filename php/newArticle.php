<?php
require "./functions.php";

$article_title = valid_donnees($_POST['article_title']);
$article_picture = $_FILES['article_picture']['name'];
$article_duration = valid_donnees($_POST['article_duration']);
$article_difficulty = valid_donnees($_POST['article_difficulty']);
$article_ingredients = valid_donnees($_POST['article_ingredients']);
$article_preparation = valid_donnees($_POST['article_preparation']);
$article_category = valid_donnees($_POST['article_category']);
$article_user_id = 1;


require "./connexionBdd.php";

$req = $pdo->prepare(
    "
        INSERT INTO articles SET 
        article_title = ?, 
        article_picture = ?, 
        article_duration = ?, 
        article_difficulty = ?, 
        article_ingredients = ?,
        article_preparation = ?,
        article_category = ?,
        article_user_id = ?,
        article_creation_date = NOW()
    "
);

$req->execute([
    $article_title,
    $article_picture,
    $article_duration,
    $article_difficulty,
    $article_ingredients,
    $article_preparation,
    $article_category,
    $article_user_id
]);

header('location: ../index.php');
