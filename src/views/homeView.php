<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

</head>

<body>


    <h2>Toutes nos machines à café</h2>
    <?php if ($produits) {
    foreach ($produits as $produit) {
        echo "Nom : " . $produit['nomProduit'] . "<br>";
        echo "Description : " . $produit['descriptionProduit'] . "<br>";
    }
} else {
    echo "Aucun produit trouvé.";
} 
