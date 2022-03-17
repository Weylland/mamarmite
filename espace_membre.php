<?php
session_start();
include "./include/head.php";
include "./include/nav.php";
include "./php/connexionBdd.php";

$req = $pdo->prepare("SELECT * FROM users WHERE user_username = :user_username");
$req->execute(
    array(
        'user_username' => $_SESSION['user_username']
    )
);

?>

<div class="gauchedroite_membre">

    <div class="gauche_membre">
        <p align="center"><img class="avatar" src="./asset/img/profil-img/avatar.png"></p>
        <p class="titre1"><b><?= $_SESSION['user_username'] ?></b></p>
        <br>
        <p class="titre2">Membre depuis le

         <?php
            while ($data = $req->fetch()) {
                echo "<td>$data->user_creation_date</td>";
            }
        ?>
        
        <br><br>
        <br><br>
        <a class="ajout-article" href="./ajoutArticle.php">Ajouter un article</a>
        <br><br>
        <a href="php/deconnect.php">Déconnexion</a>
        </p>
    </div>

    <div class="droite_membre">

        <p class="titre3">Bonjour <?= $_SESSION['user_username'] ?> </p>



        <p class="titre1" style="color:black;">Mes articles publiés</p>

        
        <fieldset>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date de publication</th>
                    <th>Actions</th>
                </tr>


                <?php
                include "./php/connexionBdd.php";
                $req = $pdo->query("SELECT * FROM articles");
                while ($data = $req->fetch()) {
                    echo "<br><tr> <td>$data->id</td> <td>$data->article_title</td> <td>$data->article_creation_date</td>";
                    echo "<td>";
                    echo "<br><a class='ajout-article' href='./php/update_art.php?id=$data->id'>Modifier </a>";
                    echo "<br><br><a class='ajout-article' href='./php/delete_art.php?id=$data->id'>Supprimer</a><br><br>";
                    echo "</td></tr>";
                }

                ?>

            </table>
        </fieldset>
    </div>
</div>

    <?php
    include "./include/footer.php";

    ?>