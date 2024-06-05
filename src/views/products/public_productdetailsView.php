<?php get_header('public');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/detailsproducts.css">
</head>

<body>

    <div class="container">
        <h1 class="mb-4">Détails du Produit</h1>
        <div class="ligne"></div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../<?= htmlspecialchars($product_details['image']); ?>" class="card-img-top" alt="<?= htmlspecialchars($product_details['nom']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product_details['nom']); ?></h5>
                        <p class="card-text">Description : <?= htmlspecialchars($product_details['description']); ?></p>
                        <p class="card-text">Modèle : <?= htmlspecialchars($product_details['modele']); ?></p>
                        <p class="card-text">Stock Disponible : <?= htmlspecialchars($product_details['stock']); ?></p>
                        <p class="card-text">Code EAN : <?= htmlspecialchars($product_details['code_ean']); ?></p>
                        <p class="card-text">Origine : <?= htmlspecialchars($product_details['origine']); ?></p>
                        <p class="card-text">Poids : <?= htmlspecialchars($product_details['poids']); ?></p>
                        <p class="card-text">Watts : <?= htmlspecialchars($product_details['watts']); ?></p>
                        <p class="card-text">Dimensions : <?= htmlspecialchars($product_details['dimensions']); ?></p>
                        <p class="card-text">Catègorie : <?= htmlspecialchars($product_details['categorie_id']); ?></p>
                        <p class="card-text">Marque : <?= htmlspecialchars($product_details['marque_id']); ?></p>
                        <p class="card-text"><strong>Prix :</strong> <span style="font-weight: bold;"><?= htmlspecialchars($product_details['prix']); ?> €</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Inclure le footer
get_footer();
?>