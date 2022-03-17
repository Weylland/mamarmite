<?php
session_start();
include "header.php";
include "nav.php";

?>

<div class="gauchedroite_membre">

    <div class="gauche_membre">
        <p align="center"><img class="avatar" src="./asset/img/profil-img/avatar.png"></p>
        <p class="titre1"><b><?= $_SESSION['user_username'] ?></b></p>
        <br>
        <p class="titre2">Administrateur depuis le


            <?php
            include "./php/connexionBdd.php";

            $req = $pdo->prepare("SELECT * FROM users WHERE user_username = :user_username");
            $req->execute(
                array(
                    'user_username' => $_SESSION['user_username']
                )
            );

            while ($data = $req->fetch()) {
                echo "<td>$data->user_creation_date</td>";
            }
            ?>

            <br><br>
            <br><br>
            <a class="ajout-article" href="ajoutArticle.php">Ajouter un article</a>
            <br><br><a href="./php/deconnect.php" style="color:white;">Déconnexion</a>
        </p>
    </div>

    <div class="droite_membre">

        <p class="titre3">Bonjour <?= $_SESSION['user_username'] ?> </p>



        <p class="titre1" style="color:black;">Utilisateurs</p>


        <fieldset>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>


                <?php
                include "./php/connexionBdd.php";
                $req = $pdo->query("SELECT * FROM users");
                while ($data = $req->fetch()) {
                    echo "<br><tr> <td>$data->id</td> <td>$data->user_username</td> <td>$data->user_creation_date</td>";
                    echo "<td>";
                    echo "<br><a class='ajout-article' href='./php/delete_user.php?id=$data->id'>Supprimer</a><br><br>";
                    echo "</td></tr>";
                }

                ?>

            </table>
        </fieldset>
    </div>
</div>

    <?php
    include "footer.php"

    ?>