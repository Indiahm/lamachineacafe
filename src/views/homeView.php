<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css"> -->

</head>

<body>

    <h1>Les machines à grains</h1>
    <?php
    if (!empty($beansMachines)) {
        foreach ($beansMachines as $beanMachine) {
            ?>
            <h2><?php echo $beanMachine->NomProduit; ?></h2>
            <p>Description produit: <?php echo $beanMachine->DescriptionProduit; ?></p>
        <?php
        }
    } else {
        echo "Aucun produit disponible pour le moment."; // Message à afficher lorsque la variable est vide
    }
    ?>