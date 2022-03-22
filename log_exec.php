<?php
include './include/head.php';
include './include/nav.php';
?>


<div class="texte1">
    <?php

    require 'php/connexionBdd.php';

    if (isset($_POST["submit"])) {
        if (empty($_POST['user_username']) || empty($_POST['user_password'])) {
            echo "Veuillez remplir les champs <br><br> <a class='lien' href='connexion.php'>Réessayez</a>";
        } else {
            $query = "SELECT * FROM users WHERE user_username = :user_username";
            $statement = $pdo->prepare($query);
            $statement->execute(
                array(
                    'user_username' => $_POST['user_username']
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                if (password_verify($_POST['user_password'], $result['user_password'])) {
                    session_start();
                    $_SESSION['user_username'] = $_POST['user_username'];

                    if ($result['user_type'] == 1) {
                        exit(header('location: ./espace_membre.php'));
                    } elseif ($result['user_type'] == 2) {
                        exit(header('location: ./espace_admin.php'));
                    } else {
                        echo "Erreur. <br><br>";
                    }
                } else {
                    echo "
                        <p>Mot de passe incorrect</p> 
                        <br><br> 
                        <a href='connexion.php'><button type='submit' name='submit'>Réessayez</button></a>";
                }
            } else {
                echo "Nom d'utilisateur incorrect <br><br> <a href='connexion.php'><button type='submit' name='submit'>Réessayez</button></a>";
            }
        }
    }
    ?>
</div>
<?php
include './include/footer.php';
?>