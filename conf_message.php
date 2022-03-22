<?php
include './include/head.php';
include './include/nav.php';
session_start();
?>

<div id="accueilTitleContainer">
    <h2>
    <?php
        if(isset($_SESSION['first_name'])){
            echo 'Bonjour ' . $_SESSION['first_name'];
        }
    ?>
    </h2>
</div>

<div class="confCont">
    <p>Votre message est envoyé.</p>

    <a href="index.php" class="button">Accueil</a>

</div>

<?php
include './include/footer.php';
?>