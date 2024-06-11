<?php
// Définir le titre de la page
$pageTitle = "Panier";
// Inclure l'en-tête
get_header($pageTitle, 'login');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="../css/panier.css">
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']); // Effacer le message de la session
        } ?>
        <?php if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']); // Effacer le message de la session
        }
        ?>
        <h1>Votre Panier</h1>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($panier)) : ?>
                    <?php foreach ($panier as $item) : ?>
                        <tr>
                            <td>
                                <?php if (isset($item['image']) && !empty($item['image'])) : ?>
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="Image du produit" style="width: 100px;">
                                <?php else : ?>
                                    <span>Aucune image disponible</span>
                                <?php endif; ?>
                            </td>
                            <td><?= isset($item['nom']) ? htmlspecialchars($item['nom']) : '' ?></td>
                            <td><?= $item['prix'] ?> €</td>
                            <td>
                                <form action="/panier?action=update" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <input type="number" name="quantity" value="<?= $item['quantite'] ?>" min="1">
                                    <input type="submit" value="Mettre à jour">
                                </form>
                            </td>
                            <td><?= $item['prix'] * $item['quantite'] ?> €</td>
                            <td>
                                <form action="/panier?action=delete" method="POST">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <input type="submit" value="Supprimer">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Votre panier est vide.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <h3 class="total">Total à payer: <?= $totalPrice ?> €</h3>
    </div>
</body>

</html>