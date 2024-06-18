<?php get_header('public'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser son Mot de Passe</title>
    <!-- Assurez-vous que les chemins vers vos fichiers CSS sont corrects et accessibles -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">

    <!-- Autoriser le chargement de Font Awesome depuis le CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Réinitialiser son Mot de Passe</h1>
                <p class="one">Vous avez perdu votre mot de passe ? Récupérez-le à tout moment.</p>
            </div>

            <div class="form-body">
                <form method="POST" action="<?= htmlspecialchars($router->generate('mdpoublie')); ?>">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
                    <div class="form-footer">
                        <button type="submit" class="connexion">Réinitialiser</button>
                        <div>
                            <?php
                            if (isset($_SESSION['messages']['error'])) {
                                foreach ($_SESSION['messages']['error'] as $error) {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                    echo htmlspecialchars($error);
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                    echo '</div>';
                                }
                                unset($_SESSION['messages']['error']);
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php get_footer(); ?>
