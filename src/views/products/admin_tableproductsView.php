<?php get_header('Liste des produits', 'admin'); ?>

<?php
// Récupération et affichage des messages de succès
$successes = getAndClearMessages('success');
foreach ($successes as $success) :
?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($success) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endforeach; ?>

<h2 class="mb-4">Liste des produits</h2>

<div class="ligne"></div>

<a href="<?= $router->generate('addProduct'); ?>" class="btn btn-success mb-4">+ Ajouter un nouveau produit</a>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">Nom</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Prix</th>
                <th scope="col" class="text-center">Modèle</th>
                <th scope="col" class="text-center">Stock</th>
                <th scope="col" class="text-center">Code EAN</th>
                <th scope="col" class="text-center">Origine</th>
                <th scope="col" class="text-center">Poids</th>
                <th scope="col" class="text-center">Watts</th>
                <th scope="col" class="text-center">Dimensions</th>
                <th scope="col" class="text-center">Categories</th>
                <th scope="col" class="text-center">Marques</th>
                <th scope="col" class="text-center">Modifier/Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->nom); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->description); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->prix); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->modele); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->stock); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->code_ean); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->origine); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->poids); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->watts); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->dimensions); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->categorie); ?></td>
                    <td class="table-light text-center align-middle"><?= htmlentities($product->marque); ?></td>

                    <td class="table-light text-center align-middle">
                        <a href="<?= $router->generate('editProduct', ['id' =>  $product->id]); ?>" class="btn btn-primary btn-sm mr-2">
                            Modifier
                        </a>
                        <a href="<?= $router->generate('deleteProduct', ['id' =>  $product->id]); ?>" class="btn btn-danger btn-sm mr-2">
                            Supprimer
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<nav aria-label="Pagination">
    <ul class="pagination justify-content-end">
        <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
            <li class="page-item <?php if ($currentPage == $page) echo 'active'; ?>">
                <a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>
</div>


<?php get_footer('admin'); ?>

<style>
  .ligne {
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    margin: 20px 0;
  }
</style>