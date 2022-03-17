<?php
include './include/head.php';
include './include/nav.php';
session_start();
?>

<div id="accueilTitleContainer">
    <h2>
        Pas de chance !!!
    </h2>
</div>

<div class="confCont">
    <p>Non d'utilisateur déjà existant !</p>

    <a href="./inscription.php" class="button">Réessayer</a>

</div>

<?php
include './include/footer.php';
?>