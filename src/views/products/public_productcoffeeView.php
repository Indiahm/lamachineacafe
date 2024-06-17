<?php
get_header('public');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/produit.css">
    <link rel="stylesheet" href="../css/cafe.css">

    <style>
    </style>
</head>

<body>

    <div class="container">
        <h1 class="mb-4">Tous nos Cafés Disponibles</h1>
        <p class="p">Ici se trouve la liste de tous nos cafés disponibles en vente.</p>
        <div class="ligne"></div>

        <div id="productCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../public/images/1.webp" class="d-block w-100" alt="Café 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Café Salvador</h5>
                        <p>Plongez dans les saveurs riches et authentiques du Café SALVADOR – AYUTEPEQUE, disponible pour seulement 6.75 €.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../public/images/22.jpg" class="d-block w-100" alt="Café 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Blend Expresso</h5>
                        <p>Éveillez vos sens avec le Café Blend Expresso, une expérience caféinée intense à 5.60 €.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../public/images/33.jpg" class="d-block w-100" alt="Café 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bresil - Beloni</h5>
                        <p>Succombez à la douceur exquise du Café Bresil - Beloni et découvrez une tasse de pure perfection.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row">
            <?php
            foreach ($products as $product) : ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
get_footer('public');
?>
