<?php
include "./include/head.php";
include "./include/nav.php";
include "./php/connexionBdd.php";

$req = $pdo->prepare("SELECT * FROM users WHERE user_username = :user_username");
            $req->execute(
                array(
                    'user_username' => $_SESSION['user_username']
                )
            );
$result = $req->fetch(PDO::FETCH_ASSOC);
$user_id = $result['id'];

?>

<div class="gauchedroite_membre">

    <div class="gauche_membre">
        <p align="center">
            <img class="avatar" src="./asset/img/profil-img/<?= $result['user_profile_picture'] ?>">
            </p>
            <p class="titre1"><b><?= $_SESSION['user_username'] ?></b></p>
            <br>
            <p class="titre2">Administrateur depuis le

            <?= $result['user_creation_date'] ?>
            
            <form action="./php/change_profile_pic_admin.php?id=<?= $user_id ?>" method="POST" enctype="multipart/form-data">
                <br><br><label for="profilPicture" style="color:white; margin-left:10%;">Changer votre image de profil</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" >
                <input type="file" name="user_profile_picture" id="profilPicture" style="color:white; width:80%; margin-left:10%;">
                <button>Envoyer</button>
            </form>

        </p>
    </div>

    <div class="droite_membre">

        <div id="accueilTitleContainer">
            <h2>
                Bonjour <?= $_SESSION['user_username'] ?>
            </h2>
        </div>

        <p class="titre1" style="color:black;">Messages</p>
        <fieldset>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date d'envoi</th>
                    <th>Message</th>
                </tr>
                <?php
                    include "./php/connexionBdd.php";
                    $req = $pdo->query("SELECT * FROM contact");
                    while ($data = $req->fetch()) {
                        echo "<br><tr> <td>$data->id</td> <td>$data->last_name</td> <td>$data->first_name</td> <td>$data->send_date</td>";
                        echo "<td><a class='button1' href='./view_message.php?id=$data->id'>Voir</a>";
                        echo "<a class='button1' href='./php/delete_message.php?id=$data->id'>Supprimer</a><br><br>";
                        echo "</td></tr>";
                    }
                ?>
            </table>
        </fieldset>
        <br><br>

        <p class="titre1" style="color:black;">Utilisateurs</p>


        <fieldset>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Date d'inscription</th>
                    <th>Membre: 1 admin: 2</th>
                </tr>


                <?php
                include "./php/connexionBdd.php";
                $req = $pdo->query("SELECT * FROM users");
                while ($data = $req->fetch()) {
                    echo "<br><tr> <td>$data->id</td> <td>$data->user_username</td> <td>$data->user_creation_date</td> <td>$data->user_type</td>";
                    echo "<td>";
                    echo "<br><a class='button1' href='./php/delete_user.php?id=$data->id'>Supprimer</a><br><br>";
                    echo "</td></tr>";
                }

                ?>

            </table>
        </fieldset>
    </div>
</div>

<?php
include "./include/footer.php"

?>