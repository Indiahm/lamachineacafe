<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assurez-vous de lier correctement votre feuille de style -->
</head>
<body>
    <header>
        <?php get_header('Liste des utilisateurs', 'admin'); ?>
    </header>

    <div class="container">
        <h2 class="my-4">Liste des utilisateurs</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Rôle</th>
                        <th scope="col" class="text-center">Créé</th>
                        <th scope="col" class="text-center">Adresse de livraison</th>
                        <th scope="col" class="text-center">Numéro de téléphone</th>
                        <th scope="col" class="text-center">Prénom</th>
                        <th scope="col" class="text-center">Nom</th>
                        <th scope="col" class="text-center">Modifier/Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td class="text-center align-middle"><?= htmlspecialchars($user->email); ?></td>
                            <td class="text-center align-middle"><?= getRoleName($user->role_id); ?></td>
                            <td class="text-center align-middle"><?= htmlspecialchars($user->created); ?></td>
                            <td class="text-center align-middle"><?= htmlspecialchars($user->shipping_address); ?></td>
                            <td class="text-center align-middle"><?= htmlspecialchars($user->phone_number); ?></td>
                            <td class="text-center align-middle"><?= htmlspecialchars($user->first_name); ?></td>
                            <td class="text-center align-middle"><?= htmlspecialchars($user->last_name); ?></td>
                            <td class="text-center align-middle">
                                <a href="<?= $router->generate('editUser', ['id' =>  $user->id]); ?>" class="btn btn-primary btn-sm mr-2">Modifier</a>
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


    <?php checkSessionTimeout(); ?>
</body>
</html>
