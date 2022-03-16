<?php
include "./include/head.php";
include "./include/nav.php";
session_start();
$id = $_GET['id'];
include "./php/connexionBdd.php";
$req = $pdo->query("SELECT * FROM articles WHERE id = $id");
$results = $req->fetchAll();
?>

<main>
    <section id="accueilRecettes">
        <?php foreach ($results as $result) : ?>
            <div id="accueilTitleContainer">
                <h2>
                    <?= $result->article_title ?>
                </h2>
            </div>
            <!-- ----- ARTICLE ----- -->
            <div class="articleContainer">
                <div class="articleImg">
                    <img src="./asset/img/<?= $result->article_picture ?>" alt="">
                </div>
                <div class="articleIndication">
                    <div class="articleNote">
                        <?php
                        switch ($result->article_note) {
                            case 1:
                                echo "<i class='fa-solid fa-star'></i>";
                                break;
                            case 2:
                                echo "
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                        ";
                                break;
                            case 3:
                                echo "
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                        ";
                                break;
                            case 4:
                                echo "
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                        ";
                                break;
                            case 5:
                                echo "
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                            <i class='fa-solid fa-star'></i>
                                        ";
                                break;
                            default:
                                echo "<i class='fa-solid fa-star'></i>";
                        }
                        ?>
                    </div>
                    <div class="articleDuration">
                        <i class="fa-regular fa-hourglass"></i>
                        <p><?= $result->article_duration ?></p>
                    </div>
                    <div class="articleDifficulty">
                        <i class="fa-solid fa-signal"></i>
                        <p>
                        <?php
                        switch ($result->article_difficulty) {
                            case 'tresfacile':
                                echo "Très facile";
                                break;
                            case 'facile':
                                echo "Facile";
                                break;
                            case 'moyen':
                                echo "Moyen";
                                break;
                            case 'difficile':
                                echo "Difficile";
                                break;
                            case 'tresdifficile':
                                echo "Très difficile";
                                break;
                            default:
                                echo "Erreur";
                        }
                        ?>
                        </p>
                    </div>
                </div>
                <div class="articleIngredient">
                    <h2>Ingrédients</h2>
                    <p><?= $result->article_ingredients ?></p>
                </div>
                <div class="articlePreparation">
                    <h2>Préparation</h2>
                    <p><?= $result->article_preparation ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</main>

<?php
include "./include/footer.php";
?>