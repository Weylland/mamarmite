<?php
require_once "functions.php";


if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['user_username'])) {
        echo 'faux1';
    } elseif (empty($_POST['user_last_name'])) {
        echo 'faux2';
    } elseif (empty($_POST['user_first_name'])) {
        echo 'faux3';
    } elseif (empty($_POST['user_mail'])) {
        echo 'faux4';
    } elseif (empty($_POST['confirm_mail'])) {
        echo 'faux5';
    } elseif (strlen($_POST['user_password']) < 6) {
        echo 'faux6';
    } elseif (empty($_POST['confirm_password'])) {
        echo 'faux7';
    } elseif ($_POST['user_password'] != $_POST['confirm_password'] || $_POST['user_mail'] != $_POST['confirm_mail']) {
        echo 'Adresse mail et/ou mot de passe non identique lors de la confirmation';
    } else {
        $user_username = valid_donnees($_POST['user_username']);
        $user_last_name = valid_donnees($_POST['user_last_name']);
        $user_first_name = valid_donnees($_POST['user_first_name']);
        $user_mail = valid_donnees($_POST['user_mail']);

        require "./connexionBdd.php";
        session_start();

        $req = $pdo->prepare("SELECT * FROM users WHERE user_username = :user_username");
        $req->execute(
            array(
                'user_username' => $_POST['user_username']
            )
        );
        $count = $req->rowCount();
        if ($count > 0) {
            header('location: ../userExist.php');
        } else {
            $req = $pdo->prepare("INSERT INTO users SET user_username = ?, user_last_name = ?, user_first_name = ?, user_mail = ?, user_password = ?, user_creation_date = NOW()");
            $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
            $_SESSION['user_username'] = $_POST['user_username'];
            $req->execute([$user_username, $user_last_name, $user_first_name, $user_mail, $password]);
            header('location: ../conf_insc.php');

            exit();
        }
    }
}
