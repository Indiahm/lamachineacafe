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
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required autocomplete ="username">
                        </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required autocomplete="off">
                        </div>

                    <div class="form-footer">
                        <button type="submit" class="connexion">Se connecter</button>
                        <div>
                            <?php
                            displayErrorMessages($errors);?>
                            <?php displaySuccessMessages($successes);
                            ?>
                            <?php displayRegistrationSuccessMessage() ?>


        <?php if (isset($_SESSION['error_message'])): ?>
                <p style="color: red;"><?= $_SESSION['error_message'] ?></p>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>

                        </div>
                    </div>
                </form>
            </div>

            <div class="form-footer">
                <a class="inscription" href="<?= $router->generate('register'); ?>">Pas encore inscrit ? Créer un compte ici</a>
            </div>
            <div>
                <p class="mdp">Mot de passe oublié ? <a href="<?= $router->generate('mdpoublie'); ?>">Réinitialiser</a></p>
            </div>
        </div>
    </div>
</body>

</html>

