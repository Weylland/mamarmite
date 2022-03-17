<?php
include './include/head.php';
include './include/nav.php';
session_start();
?>

<div id="accueilTitleContainer">
    <h2>
    <?php
        if(isset($_SESSION['user_username'])){
            echo 'Bonjour ' . $_SESSION['user_username'];
        }
    ?>
    </h2>
</div>

<div class="confCont">
    <p>votre inscription est terminée.</p>

    <a href="connexion.php" class="button">Connectez-vous</a>

</div>

<?php
include './include/footer.php';
?>