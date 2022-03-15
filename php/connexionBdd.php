<?php 

    $serverName = "localhost";
    $dbName = "mamarmite";
    $userName = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    } 
    catch(PDOException $e) {
        echo 'Erreur : ' .$e->getMessage();
    }
