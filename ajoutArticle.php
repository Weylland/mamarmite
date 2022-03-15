<?php
include "./include/head.php";
include "./include/nav.php";
?>

<main>
    <section id="accueilRecettes">
        <div id="accueilTitleContainer">
            <h2>
                Les entrées
            </h2>
        </div>
        <div class="formContainer">
            <form method="post" action="./php/newArticle.php" enctype="multipart/form-data">
                <!-- NOM DE LA RECETTE  -->
                <label for="articleTitle">Titre</label>
                <input type="text" name="article_title" id="articleTitle" placeholder="Nom de la recette">

                <div class="formBigGroup">
                    <!-- IMAGES  -->
                    <div class="formSmallGroup">
                        <label for="articlePicture" id="articlePictureLabel">Vos images</label>
                        <div class="fileInput">
                            <div class="labelWraper">
                                <label for="articlePicture">Vos images</label>
                                <input type="file" name="article_picture" id="articlePicture">
                            </div>
                        </div>
                    </div>


                    <!-- CATEGORIE  -->
                    <div class="formSmallGroup">
                        <label for="category">Type de plat</label>
                        <select name="article_category" id="category">
                            <option value="1">Entrée</option>
                            <option value="2">Plat</option>
                            <option value="3">Dessert</option>
                            <option value="4">Boisson</option>
                        </select>
                    </div>
                </div>
                
                <div class="formBigGroup">
                    <!-- DUREE  -->
                    <div class="formSmallGroup">
                        <label for="articleDuration">Durée de preparation</label>
                        <input type="number" name="article_duration" id="articleDuration" placeholder="Durée en minute">
                    </div>

                    <!-- DIFFICULTE -->
                    <div class="formSmallGroup">
                        <label for="difficulty">Difficulté</label>
                        <select name="difficulty" id="articleDifficulty">
                            <option value="1">Très facile</option>
                            <option value="2">Facile</option>
                            <option value="3">Moyen</option>
                            <option value="4">Difficile</option>
                            <option value="5">Très difficile</option>
                        </select>
                    </div>
                </div>

                <!-- INGREDIENTS  -->
                <label for="ingredients">Ingrédients</label>
                <textarea  name="article_ingredients" id="ingredients" maxlenght="500">Les ingrédients</textarea>

                <!-- PREPARATION  -->
                <label for="preparation">Préparation</label>
                <textarea  name="article_preparation" id="preparation">Les étapes</textarea>

                <button type="submit">Envoyer</button>
            </form>
        </div>
        
    </section>
</main>

<?php
include "./include/footer.php";
?>