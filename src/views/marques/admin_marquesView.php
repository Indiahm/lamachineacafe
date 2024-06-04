<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Marques</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

    <header>
        <?php get_header('Liste des Marques', 'admin'); ?>
    </header>

    <div class="container">
        <h2 class="mb-4">Liste des Marques</h2>
        <a href="<?= $router->generate('addMarque'); ?>" class="btn btn-success mb-4">Ajouter une Marque</a>

        <form class="form-inline my-2 my-lg-0" method="POST" action="">
            <div class="input-group">
                <div class="input-group-prepend"></div>
                <input class="form-control mr-sm-2 mb-4 custom-search-input" type="search" placeholder="Rechercher une marque" aria-label="Rechercher" name="search">
            </div>
        </form>


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
                            <td class="table-light text-center align-middle"><?= htmlspecialchars($marque->nom); ?></td>
                            <td class="table-light text-center align-middle"><?= htmlspecialchars($marque->created_at); ?></td>
                            <td class="table-light text-center align-middle"><?= htmlspecialchars($marque->updated_at); ?></td>
                            <td class="table-secondary text-center align-middle">
                                <a href="<?= $router->generate('editMarque', ['id' =>  $marque->id]); ?>" class="btn btn-primary btn-sm mr-2">Modifier</a>
                                <a href="<?= $router->generate('deleteMarque', ['id' =>  $marque->id]); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
    </div>

</body>

</html>