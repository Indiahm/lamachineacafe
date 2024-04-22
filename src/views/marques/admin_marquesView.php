<?php get_header('Liste des Marques', 'admin'); ?>

<div class="container">
    <h2 class="mb-4">Liste des Marques</h2>

    <a href="<?= $router->generate('addMarque'); ?>" class="btn btn-success mb-4">Ajouter une Marque</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nom de la Marque</th>
                    <th scope="col" class="text-center">Date de Création</th>
                    <th scope="col" class="text-center">Date de Modification</th>
                    <th scope="col" class="text-center">Modifier/Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marques as $marque) { ?>
                    <tr>
                        <td class="table-light text-center align-middle"><?= htmlentities($marque->nom); ?></td>
                        <td class="table-light text-center align-middle"><?= htmlentities($marque->created_at); ?></td>
                        <td class="table-light text-center align-middle"><?= htmlentities($marque->updated_at); ?></td>
                        <td class="table-secondary text-center align-middle">
                            <a href="<?= $router->generate('editMarque', ['id' =>  $marque->id]); ?>" class="btn btn-primary btn-sm mr-2">
                                Modifier
                            </a>
                            <a href="<?= $router->generate('deleteMarque', ['id' =>  $marque->id]); ?>" class="btn btn-danger btn-sm mr-2">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php get_footer('admin'); ?>
