<?php get_header('public'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2o" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/detailsproducts.css">
</head>

<body>

    <div class="product-container">
        <h1 class="mb-4">Détails du Produit</h1>
        <div class="ligne">
            <hr>
        </div>

        <div class="product-row">
            <div class="product-col-img">
                <img src="../<?= htmlspecialchars($product_details['image']); ?>" class="product-img" alt="<?= htmlspecialchars($product_details['nom']); ?>">
            </div>
            <div class="product-col mb-4">
                <h2 class="product-title mb-3"><?= htmlspecialchars($product_details['nom']); ?></h2>
                <p class="product-description mb-4"><?= htmlspecialchars($product_details['description']); ?></p>
                <table class="product-table">
                    <tr>
                        <th>Modèle</th>
                        <td><?= htmlspecialchars($product_details['modele']); ?></td>
                    </tr>
                    <tr>
                        <th>Stock Disponible</th>
                        <td><?= htmlspecialchars($product_details['stock']); ?></td>
                    </tr>
                    <tr>
                        <th>Code EAN</th>
                        <td><?= htmlspecialchars($product_details['code_ean']); ?></td>
                    </tr>
                    <tr>
                        <th>Origine</th>
                        <td><?= htmlspecialchars($product_details['origine']); ?></td>
                    </tr>
                    <tr>
                        <th>Poids</th>
                        <td><?= htmlspecialchars($product_details['poids']); ?></td>
                    </tr>
                    <tr>
                        <th>Watts</th>
                        <td><?= htmlspecialchars($product_details['watts']); ?></td>
                    </tr>
                    <tr>
                        <th>Dimensions</th>
                        <td><?= htmlspecialchars($product_details['dimensions']); ?></td>
                    </tr>
                    <tr>
                        <th>Catégorie</th>
                        <td><?= htmlspecialchars($product_details['categorie_id']); ?></td>
                    </tr>
                    <tr>
                        <th>Marque</th>
                        <td><?= htmlspecialchars($product_details['marque_id']); ?></td>
                    </tr>
                    <tr>
                        <th>Prix</th>
                        <td><strong><?= htmlspecialchars($product_details['prix']); ?> €</strong></td>
                    </tr>
                </table>
                <div class="product-buttons mt-4">
                    <form action="/panier?action=add" method="post">
                        <input type="hidden" name="product_id" value="<?= $product_details['id'] ?>">
                        <input type="hidden" name="price" value="<?= $product_details['prix'] ?>">
                        <p>Quantité :</p><input type="number" name="quantity" min="1" value="1">
                        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
get_footer();
?>