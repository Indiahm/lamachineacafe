<?php get_header('public');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/acceuil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="public/images/1.jpg" class="d-block w-100" alt="Slide 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Machine à Café en grain</h5>
                            <p>Découvrez notre sélection de machines à café en grain pour une expérience caféine exceptionnelle.</p>
                            <a href="<?= $router->generate('detailsProducts', ['id' => $product['id']]); ?>" class="details">En savoir d'avantage</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/2.jpg" class="d-block w-100" alt="Slide 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Machine à expresso</h5>
                            <p>Explorez notre gamme de machines à expresso pour savourer des cafés riches et aromatiques à tout moment de la journée.</p>
                            <a href="<?= $router->generate('detailsProducts', ['id' => $product['id']]); ?>" class="details">En savoir d'avantage</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/3.webp" class="d-block w-100" alt="Slide 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cafetières</h5>
                            <p>Découvrez nos cafetières pour préparer des cafés filtre de qualité supérieure avec facilité et élégance.</p>
                            <a href="<?= $router->generate('detailsProducts', ['id' => $product['id']]); ?>" class="details">En savoir d'avantage</a>
                        </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>




        <h1 class="mb-4">Liste des Produits Café</h1>
        <p class="p">Ici se trouve la liste des produits pour le café.</p>
        <div class="ligne"></div>


        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?= htmlspecialchars($product['nom']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['nom']); ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['description']); ?></p>
                            <p class="card-text"><strong>Prix :</strong> <span style="font-weight: bold;"><?= htmlspecialchars($product['prix']); ?> €</span></p>
                            <a href="<?= $router->generate('detailsProducts', ['id' => $product['id']]); ?>" class="details">Voir les détails</a>
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