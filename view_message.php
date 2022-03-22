<?php
include "./include/head.php";
include "./include/nav.php";
$id = $_GET['id'];

include "./php/connexionBdd.php";
$req = $pdo->prepare("SELECT * FROM contact WHERE id = $id");
$req->execute();

?>

<div id="accueilTitleContainer">
    <h2>
        Voir le message
    </h2>
</div>

<fieldset>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date d'envoi</th>
            <th>Message</th>
        </tr>

<?php
    while ($data = $req->fetch()) {
        echo "<br><tr> <td>$data->last_name</td> <td>$data->first_name</td> <td>$data->send_date</td> <td>$data->message</td><br>";
        echo "</tr>";
    }
?>

    </table>
</fieldset>

<a href="espace_admin.php" class="button">Retour</a>

<br><br>

<?php
    include "./include/footer.php";
?>