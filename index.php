<?php
include "./include/head.php";
include "./include/nav.php";
?>

<main>
    <header id="accueilHeader">
        <div id="accueilHeaderTitle">
            <h1>Mama'rmite</h1>
            <h2>Le blog cuisine</h2>
        </div>
    </header>
    <section id="accueilRecettes">
        <div id="accueilTitleContainer">
            <h2>
                Les recettes
            </h2>
        </div>
        <!-- ----- CARD SECTION ----- -->
        <div id="cardContainer">
            <!-- ----- CARDS ----- -->
            <?php
            include "./php/connexionBdd.php";
            $req = $pdo->query("SELECT id, article_title, article_picture, article_note, article_difficulty  FROM articles ");
            while ($data = $req->fetch()) {
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

                switch ($data->article_note) {
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

                echo "    
                            </div>
                            <div class='cardBottom'>
                                <div class='cardDifficulte'>";
                switch ($data->article_difficulty) {
                    case "tresfacile":
                        echo "<p>Très facile</p>";
                        break;
                    case "facile":
                        echo "<p>Facile</p>";
                        break;
                    case "moyen":
                        echo "<p>Moyen</p>";
                        break;
                    case "difficile":
                        echo "<p>Difficile</p>";
                        break;
                    case "tresdifficile":
                        echo "<p>Très difficile</p>";
                        break;
                    default:
                        echo "<p>Inconnue</p>";
                }

                echo " </div>
                                <a href='./article.php?id={$data->id}' class='cardButton' target='_blank'>Voir la recette</a>
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