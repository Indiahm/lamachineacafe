<?php get_header('public'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Se connecter</h1>
                <p>Bienvenue sur notre plateforme. Connectez-vous pour accéder à vos ressources.</p>
            </div>

            <div class="form-body">

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
                        <?php
                    // Récupération et affichage des messages d'erreur'
                    $errors = getAndClearMessages('error');
                    displayErrorMessages($errors);

                    // Récupération et affichage des messages de succès
                    $successes = getAndClearMessages('success');
                    displaySuccessMessages($successes);

                    // Inscription RéussieWR
                    displayRegistrationSuccessMessage();
                    ?>
                </form>
            </div>
            <div class="form-footer">
                <a class="inscription" href="<?= $router->generate('register'); ?>">Pas encore inscrit ? Créer un compte ici</a>
            </div>
            <div>
                <p class="mdp">Mot de passe oublié ? <a href=<?= $router->generate('mdpoublie'); ?>>Réinitialiser</a></p>
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