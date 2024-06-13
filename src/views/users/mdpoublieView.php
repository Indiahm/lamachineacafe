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
                <h1>Réinitialiser son Mot de Passe</h1>
                <p>Vous avez perdu votre mot de passe ? Récupérer le à tous moment</p>
            </div>

            <div class="form-body">
                <form method="POST" action="<?= $router->generate('mdpoublie'); ?>">
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="connexion">Réinitialiser</button>
                        <div>
                            <?php
                            // Récupération et affichage des messages d'erreur
                            if (isset($_SESSION['messages']['error'])) {
                                foreach ($_SESSION['messages']['error'] as $error) {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                    echo htmlspecialchars($error);
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                    echo '</div>';
                                }
                                unset($_SESSION['messages']['error']); // Effacer les messages d'erreur après les avoir affichés
                            }
                            ?>
                </form>
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
            }, (5000)); // 10000 millisecondes = 10 secondes
        });
    </script>
</body>

</html>