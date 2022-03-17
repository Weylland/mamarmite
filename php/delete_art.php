<?php
session_start();

$id =$_GET['id'];

require "connexionBdd.php";

$req = $pdo->prepare("DELETE FROM articles WHERE id = ?");

$req->execute(array($id));

exit(header('location: ../espace_membre.php'));

?>
