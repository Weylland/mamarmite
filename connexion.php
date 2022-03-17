<?php
include "./include/head.php";
include "./include/nav.php"

?>


<div id="accueilTitleContainer">
    <h2>
        Connexion
    </h2>
</div>

<div class="contenu">
    <form action="log_exec.php" method="POST">
        <label for="user_username">Nom d'utilisateur</label>
        <input type="text" name="user_username" id="usname" required>

        <label for="user_password">Mot de passe</label>
        <input type="password" name="user_password" id="uspass" required>
        
        <button type="submit" name="submit">Connexion</button>
    </form>
</div>

<?php
include "./include/footer.php"

?>