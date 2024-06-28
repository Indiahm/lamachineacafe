<?php get_header('Inscription', 'public'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="../css/profil.css">
</head>
<body>
    
    <div class="container">
        
        <?php
        $successes = getAndClearMessages('successprofil');
        displaySuccessMessages($successes);
        ?>
    
        <h1>Mon Profil</h1>
        <p>Nom : <?= htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']); ?></p>
        <p>Email : <?= htmlspecialchars($user['email']); ?></p>
        <p>Adresse de livraison : <?= htmlspecialchars($user['shipping_address']); ?></p>
        <p>Téléphone : <?= htmlspecialchars($user['phone_number']); ?></p>

        <!-- Bouton pour modifier le profil -->
        <a class="edit-profile" href="<?= $router->generate('update_profile'); ?>">Modifier mon profil</a>

        <form action="<?= $router->generate('delete_account'); ?>" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
            <input type="hidden" name="action" value="delete_account">
            <button class="delete" type="submit">Supprimer mon compte</button>
        </form>
        <a class="retour" href="<?= $router->generate('accueil'); ?>">Retour à l'accueil</a>
    </div>
</body>
</html>
