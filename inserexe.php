<?php
include_once './fonction.php';

if(!empty($_POST)){
    $errors = array();

if(empty($_POST['titre'])){
    echo 'faux1';
}

elseif(empty($_POST['auteur'])){
    echo 'faux2';
}

elseif(empty($_POST['annee'])){
    echo 'faux3';
}

else {
    $titre = valid_donnees($_POST['titre']);
    $auteur = valid_donnees($_POST['auteur']);
    $annee = valid_donnees($_POST['annee']);

require "./bdd.php";
    $req = $pdo->prepare("INSERT INTO table1 SET titre = ?, auteur = ?, annee = ? ");
    $req->execute([$_POST['titre'], $_POST['auteur'], $_POST['annee']]);
    header('location: ./accueil.php');

    exit();
}
}
?>