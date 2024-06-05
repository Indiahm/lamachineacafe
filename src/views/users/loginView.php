<?php get_header('public'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="form-container">
            <div class="form-header">Se connecter</div>

            <div class="form-body">
                <?php
                // Récupération et affichage des messages d'erreur
                $errors = getAndClearMessages('error');
                foreach ($errors as $error) :
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($error) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endforeach; ?>

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

                <?php
                // Affichage du message de succès d'inscription s'il est présent dans la session
                if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] === true) :
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Inscription réussie ! Connectez-vous avec vos identifiants.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    // Supprimer la session après l'avoir affichée pour qu'elle ne soit plus affichée lors des rechargements de la page
                    unset($_SESSION['registration_success']);
                    ?>
                <?php endif; ?>

                <form method="POST" action="<?= $router->generate('login'); ?>">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="connexion">Se connecter</button>
                        <div>
                </form>
            </div>
            <div class="form-footer">
                <a class="inscription" href="<?= $router->generate('register'); ?>">Pas encore inscrit ? Créer un compte ici</a>
            </div>
        </div>
    </div>

    <script>
        // Sélectionne tous les messages d'erreur avec la classe alert-dismissible
        const errorMessages = document.querySelectorAll('.alert-dismissible');

        // Pour chaque message d'erreur, ajoute une temporisation pour le cacher après 10 secondes
        errorMessages.forEach(message => {
            setTimeout(() => {
                message.style.display = 'none';
            }, 10000); // 10000 millisecondes = 10 secondes
        });
    </script>
</body>

</html>