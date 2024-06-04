
<!DOCTYPE html>
<html lang="fr">

<?php get_header("Accueil"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/carousel.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>

<body>

<div class="imagesSlider">
    <img src="public/images/slide6.svg" alt="">

</div>



<div id="app"></div>
        <script type="module" src="src/main.jsx"></script>
        
    <div class="carousel">
        <div>
            <section>
                <ul class="carousel-items1">
                    <li class="carousel-item1">
                        <h1>Hello</h1>
                        <img class="imageproduit" src="public/images/machine1.svg" alt="Machine 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor officiis, ipsa obcaecati hic
                            facilis pariatur maiores, aliquid corrupti nesciunt quas nisi minima quasi, ex reiciendis
                            est
                            odio voluptates. Fugiat, eum.</p>
                        <button>Découvrir</button>
                    </li>
                    <!-- Ajoute plus de <li> ici si nécessaire -->
                </ul>
            </section>
        </div>

        <div>
            <section>
                <ul class="carousel-items1">
                    <li class="carousel-item1">
                        <h1>Hello</h1>
                        <img class="imageproduit" src="public/images/machine1.svg" alt="Machine 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor officiis, ipsa obcaecati hic
                            facilis pariatur maiores, aliquid corrupti nesciunt quas nisi minima quasi, ex reiciendis
                            est
                            odio voluptates. Fugiat, eum.</p>
                        <button>Découvrir</button>
                    </li>
                    <!-- Ajoute plus de <li> ici si nécessaire -->
                </ul>
            </section>
        </div>

        <div>
            <section>
                <ul class="carousel-items1">
                    <li class="carousel-item1">
                        <h1>Hello</h1>
                        <img class="imageproduit" src="public/images/machine1.svg" alt="Machine 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor officiis, ipsa obcaecati hic
                            facilis pariatur maiores, aliquid corrupti nesciunt quas nisi minima quasi, ex reiciendis
                            est
                            odio voluptates. Fugiat, eum.</p>
                        <button>Découvrir</button>
                    </li>
                    <!-- Ajoute plus de <li> ici si nécessaire -->
                </ul>
            </section>
        </div>
        <div>
            <section>
                <ul class="carousel-items1">
                    <li class="carousel-item1">
                        <h1>Hello</h1>
                        <img class="imageproduit" src="public/images/machine1.svg" alt="Machine 1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor officiis, ipsa obcaecati hic
                            facilis pariatur maiores, aliquid corrupti nesciunt quas nisi minima quasi, ex reiciendis
                            est
                            odio voluptates. Fugiat, eum.</p>
                        <button>Découvrir</button>
                    </li>
                    <!-- Ajoute plus de <li> ici si nécessaire -->
                </ul>
            </section>
        </div>
    </div>


    <div class="page">
        <h2 id="titre1">Toutes nos machines à café</h2>
        <?php
        if (isset($produits) && !empty($produits)) {
            foreach ($produits as $produit) {
                echo "<div class='produit'>";
                echo "<h3>Nom : " . htmlspecialchars($produit['nomProduit']) . "</h3>";
                echo "<p>Description : " . htmlspecialchars($produit['descriptionProduit']) . "</p>";
                echo '<a href="views/productView.php?id=' . htmlspecialchars($produit['id']) . '">';
                echo '<img src="' . htmlspecialchars($produit['imageProduit']) . '" alt="' . htmlspecialchars($produit['nomProduit']) . '">';
                echo '</a>';
                echo "</div>";
            }
        } else {
            echo "<p>Aucun produit trouvé.</p>";
        }
        ?>
    </div>




<?php
get_footer();
?>

</html>