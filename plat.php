<?php
include "./include/head.php";
include "./include/nav.php";
?>

<main>
    <section id="accueilRecettes">
        <div id="accueilTitleContainer">
            <h2>
                Les plats
            </h2>
        </div>
        <!-- ----- CARD SECTION ----- -->
        <div id="cardContainer">
        <?php
            include "./php/connexionBdd.php";
            $req = $pdo->query("SELECT id, article_title, article_picture, article_note, article_difficulty, article_category  FROM articles WHERE article_category = 2");
            while($data = $req->fetch()) {
                echo "
                    <div class='card'>
                    <div class='cardImg'>
                        <img src='./asset/img/{$data->article_picture}' alt='Image du plat {$data->article_title} '>
                    </div>
                    <div class='cardBody'>
                        <div class='cardTitle'>
                            <h3>
                                {$data->article_title}
                            </h3>
                        </div>
                        <div class='cardNote'>";

                    switch($data->article_note) {
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
                        default:
                            echo "<i class='fa-solid fa-star'></i>";
                    }

                    echo "    
                        </div>
                        <div class='cardBottom'>
                            <div class='cardDifficulte'>";
                    switch($data->article_difficulty) {
                        case 1:
                            echo "<p>Très facile</p>";
                            break;
                        case 2:
                            echo "<p>Facile</p>";
                            break;
                        case 3:
                            echo "<p>Moyen</p>";
                            break;
                        case 4:
                            echo "<p>Difficile</p>";
                            break;
                        case 5:
                            echo "<p>Très difficile</p>";
                            break;
                        default:
                            echo "<p>Inconnue</p>";
                    }

                    echo " </div>
                            <a href='./article.php?id={$data->id}' class='cardButton'>Voir la recette</a>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
        </div>
    </section>
</main>

<?php
include "./include/footer.php";
?>