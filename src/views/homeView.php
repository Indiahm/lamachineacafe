<?php get_header('Accueil'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>

<body>


    <h2 id="titre1">Toutes nos machines à café</h2>
    <?php if ($produits) {
        foreach ($produits as $produit) {
            echo "Nom : " . $produit['nomProduit'] . "<br>";
            echo "Description : " . $produit['descriptionProduit'] . "<br>";
        }
    } else {
        echo "Aucun produit trouvé.";
    }


    get_footer('Accueil'); ?>
