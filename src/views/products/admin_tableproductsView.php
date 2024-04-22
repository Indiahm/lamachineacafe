<?php get_header('Liste des produits', 'admin'); ?>

<h2 class="mb-4">Liste des produits</h2>

<a href="<?= $router->generate('addProduct'); ?>" class="btn btn-success mb-4">Ajouter un nouveau produit</a>

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

                    <td class="table-secondary text-center align-middle">

                        <a href="<?= $router->generate('deleteProduct', ['id' =>  $product->id]); ?>" class="btn btn-danger btn-sm mr-2">
                            Supprimer
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php get_footer('admin'); ?>