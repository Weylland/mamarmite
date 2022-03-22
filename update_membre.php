<?php
include "./include/head.php";
include "./include/nav.php";
$id = $_GET['id'];
$req = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$req->execute(
    array(
        'id' => $id
    )
);
$result = $req->fetch(PDO::FETCH_ASSOC);
?>


<div id="accueilTitleContainer">
    <h2>
    Modification de <br>vos informations personnelles
    </h2>
</div>

<div class="contenu">
    <form action="./php/update_exec.php?id=<?= $id ?>" method="POST">

        <label for="user_username">Nom d'utilisateur</label>
        <input type="text" name="user_username" id="user_username" value="<?= $result['user_username'] ?>" required>

        <label for="user_last_name">Nom</label>
        <input type="text" name="user_last_name" id="user_last_name" value="<?= $result['user_last_name'] ?>" required>

        <label for="user_first_name">Prénom</label>
        <input type="text" name="user_first_name" id="user_first_name" value="<?= $result['user_first_name'] ?>" required>

        <label for="user_mail">Adresse mail</label>
        <input type="mail" name="user_mail" id="user_mail" value="<?= $result['user_mail'] ?>" required>

        <label for="confirm_mail">Confirmer l'adresse mail</label>
        <input type="text" name="confirm_mail" id="confirm_mail" required>

        <label for="user_password">Mot de passe</label>
        <input type="password" name="user_password" id="user_password" required>

        <label for="confirm_password">Confirmer le mot de passe</label>
        <input type="password" name="confirm_password" id="confirm_password" required>

        <button type="submit">Valider</button>
    </form>
</div>

<?php
include "./include/footer.php"

?>

