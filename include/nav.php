<?php
session_start();
require './php/connexionBdd.php';
if (!empty($_SESSION['user_username'])) {
    $req = $pdo->prepare("SELECT * FROM users WHERE user_username = :user_username");
    $req->execute(
        array(
            'user_username' => $_SESSION['user_username']
        )
    );
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_type'] = $result['user_type'];
}
?>
<nav id="nav">
    <div class="logoCont">
        <img src="./asset/img/marmite-logo.png">
    </div>
    <div class="navLeft">
        <ul class="menu">
            <li><a href="../index.php">Accueil</a></li>
            <li id="navDropdown">Les recettes &nbsp;
                <div id="navDropdownList" class="hide">
                    <ul>
                        <li><a href="../entree.php">Entrée</a></li>
                        <li><a href="../plat.php">Plat</a></li>
                        <li><a href="../dessert.php">Dessert</a></li>
                        <li><a href="../boisson.php">Boisson</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="../contact.php">Contact</a></li>
        </ul>
    </div>
    <div class="navRight">
        <?php if (empty($_SESSION['user_username'])) : ?>
            <ul>
                <li><a href="./connexion.php">Connexion</a></li>
                <li><a href="./inscription.php">Inscription</a></li>
            </ul>
        <?php elseif (!empty($_SESSION['user_username'])) : ?>
            <ul>
                <?php if ($_SESSION['user_type'] == 1) : ?>
                    <li><a href="./espace_membre.php"><?= $_SESSION['user_username'] ?></a></li>
                <?php elseif ($_SESSION['user_type'] == 2) : ?>
                    <li><a href="./espace_admin.php"><?= $_SESSION['user_username'] ?></a></li>
                <?php endif; ?>
                <li><a href="./php/deconnect.php">Déconnexion</a></li>
            </ul>
        <?php endif; ?>
    </div>
</nav>
<div id="burgerMenu">
    <i id="burgerMenuI" class="fas"></i>
</div>