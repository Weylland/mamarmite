<?php
require_once "functions.php";

if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['last_name'])) {
        echo 'faux1';
    } elseif (empty($_POST['first_name'])) {
        echo 'faux2';
    } elseif (empty($_POST['mail'])) {
        echo 'faux3';
    } elseif (empty($_POST['message'])) {
        echo 'faux4';
    } else {
        $last_name = valid_donnees($_POST['last_name']);
        $first_name = valid_donnees($_POST['first_name']);
        $mail = valid_donnees($_POST['mail']);
        $message = valid_donnees($_POST['message']);

        require "./connexionBdd.php";
        session_start();
        $req = $pdo->prepare("INSERT INTO contact SET last_name = ?, first_name = ?, mail = ?, send_date = NOW(), message = ?");
        $_SESSION['first_name'] = $_POST['first_name'];
        $req->execute([$last_name, $first_name, $mail, $message]);
        header('location: ../conf_message.php');

        exit();
    }
}
if(isset($errors)){
    $_SESSION['erreur'] = $errors;
    header('location: contact.php');
}
?>