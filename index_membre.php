<?php
session_start();
if(empty($_SESSION['username'])){
    header('location: connexion.php');
}
include "header.php";
include "nav.php";
?>


<div id="order">
    <p class="titreconfphp">Bonjour <?= $_SESSION['username'] ?>,
    <br><br>
    <?php if($_SESSION['user_type'] == 2){ echo "Vous êtes administrateur. <br><br>";} ?>
    Que voulez-vous faire ?

<?php 
if($_SESSION['user_type'] == 2){
    echo "<br><br><a href='./espace_membre.php' style='color:black; font-family:Comfortaa, cursive; font-size:15px'> Gérer les membres</a>";
}
?>
<br><br>
<a href="gest_message.php" style="color:black;font-family: 'Comfortaa', cursive; font-size:15px">Gérer les messages</a>
<br><br><a href="deconnect.php" style="color:black;font-family: 'Comfortaa', cursive; font-size:15px">Déconnexion</a></p>
</div>

<?php
include 'footer.php';
?>
