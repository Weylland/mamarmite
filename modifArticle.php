<?php
include "./include/head.php";
include "./include/nav.php";
$id = $_GET['id'];
$req = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
$req->execute(
    array(
        'id' => $id
    )
);
$result = $req->fetch(PDO::FETCH_ASSOC);
?>

<main>
    <section id="accueilRecettes">
        <div id="accueilTitleContainer">
            <h2>
                Votre recette
            </h2>
        </div>
        <div class="formContainer">
            <form method="post" action="./php/changeArticle.php?id=<?= $id ?>" enctype="multipart/form-data">
                <!-- NOM DE LA RECETTE  -->
                <label for="articleTitle">Titre</label>
                <input type="text" name="article_title" id="articleTitle" value="<?= $result['article_title'] ?>" require>

                <div class="formBigGroup">
                    <!-- IMAGES  -->
                    <div class="formSmallGroup">
                        <label for="articlePicture" id="articlePictureLabel">Vos images</label>
                        <div class="fileInput">
                            <div class="labelWraper">
                                <label for="articlePicture">Vos images</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                <input type="file" name="article_picture" id="articlePicture" require>
                            </div>
                        </div>
                    </div>


                    <!-- CATEGORIE  -->
                    <div class="formSmallGroup">
                        <label for="category">Type de plat</label>
                        <select name="article_category" id="category">
                            <option value="entre">Entrée</option>
                            <option value="plat">Plat</option>
                            <option value="dessert">Dessert</option>
                            <option value="boisson">Boisson</option>
                        </select>
                    </div>
                </div>

                <div class="formBigGroup">
                    <!-- DUREE  -->
                    <div class="formSmallGroup">
                        <label for="articleDuration">Durée de preparation</label>
                        <input type="number" name="article_duration" id="articleDuration" placeholder="Durée en minute" value="<?= $result['article_duration'] ?>" require>
                    </div>

                    <!-- DIFFICULTE -->
                    <div class="formSmallGroup">
                        <label for="articleDifficulty">Difficulté</label>
                        <select name="article_difficulty" id="articleDifficulty">
                            <option value="tresfacile">Très facile</option>
                            <option value="facile">Facile</option>
                            <option value="moyen">Moyen</option>
                            <option value="difficile">Difficile</option>
                            <option value="tresdifficile">Très difficile</option>
                        </select>
                    </div>
                </div>

                <!-- INGREDIENTS  -->
                <label for="ingredients">Ingrédients</label>
                <textarea name="article_ingredients" id="ingredients" maxlenght="500" require><?= $result['article_ingredients'] ?></textarea>

                <!-- PREPARATION  -->
                <label for="preparation">Préparation</label>
                <textarea name="article_preparation" id="preparation" require><?= $result['article_preparation'] ?></textarea>

                <button type="submit">Envoyer</button>
            </form>
        </div>

    </section>
</main>

<?php
include "./include/footer.php";
?>