<?php get_header('Liste des Catégories', 'admin'); ?>

<div class="container">
    <h2 class="mb-4">Liste des Catégories</h2>


    <a href="<?= $router->generate('addCategories'); ?>" class="btn btn-success mb-4">Ajouter une Catégorie</a>

    <form class="form-inline my-2 my-lg-0" method="POST" action="">
        <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input class="form-control mr-sm-2 mb-4 custom-search-input" type="search" placeholder="Rechercher une catégorie" aria-label="Search" name="search">
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nom de la Catégorie</th>
                    <th scope="col" class="text-center">Date de Création</th>
                    <th scope="col" class="text-center">Date de Modification</th>
                    <th scope="col" class="text-center">Modifier/Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie) { ?>
                    <tr>
                        <td class="table-light text-center align-middle"><?= htmlentities($categorie->nom); ?></td>
                        <td class="table-light text-center align-middle"><?= htmlentities($categorie->created_at); ?></td>
                        <td class="table-light text-center align-middle"><?= htmlentities($categorie->updated_at); ?></td>
                        <td class="table-secondary text-center align-middle">
                            <a href="<?= $router->generate('editCategories', ['id' =>  $categorie->id]); ?>" class="btn btn-primary btn-sm mr-2">
                                Modifier
                            </a>
                            <a href="<?= $router->generate('deleteCategories', ['id' =>  $categorie->id]); ?>" class="btn btn-danger btn-sm">
                                Supprimer
                            </a>
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


    <?php get_footer('admin'); ?>