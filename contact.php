<?php
include "./include/head.php";
include "./include/nav.php";
?>

<div id="accueilTitleContainer">
    <h2>
        Contact
    </h2>
</div>

<div class="contenu">
    <form action="./php/contact_exec.php" method="POST">

        

        <label for="last_name">Nom</label>
        <input type="text" name="last_name" id="last_name" required>

        <label for="first_name">Prénom</label>
        <input type="text" name="first_name" id="first_name" required>

        <label for="mail">Adresse mail</label>
        <input type="mail" name="mail" id="mail" required>

        <label for="message">Message</label>
        <textarea name="message" id="message" maxlength="2000" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>

<?php
include "./include/footer.php";
?>