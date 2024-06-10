<?php get_header('public');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>

<body>


    <div class="container">
        <h1 class="mb-4">Nos Machine à café à grain</h1>
        <p class="p">Ici se trouve la liste de nos machines à grain.</p>
        <div class="ligne"></div>


        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?= htmlspecialchars($product['nom']); ?>">
                        <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product['nom']); ?></h5>
                            <p class="card-text"><strong>Prix :</strong> <span style="font-weight: bold;"><?= htmlspecialchars($product['prix']); ?> €</span></p>
                            <a href="<?= $router->generate('detailsProducts', ['id' => $product['id']]); ?>" class="btn btn-primary">Voir les détails</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php get_footer('public'); ?>