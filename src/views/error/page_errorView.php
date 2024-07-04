<?php get_header('Accueil', 'public'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/error.css">
</head>
<body>
    <div class="error-container">
        <div class="text-container">
            <h1>Oups !</h1>
            <h2>La page que vous recherchez semble introuvable.</h2>
            <p>Code d'erreur : 404</p>
            <p>Vous pouvez retourner à la <a href="<?= htmlspecialchars($router->generate('accueil')) ?>">page d'accueil</a>.</p>
        </div>
        <div class="error-image">
            <img src="public/images/3454900-error-404-with-the-mignon-tasse-cafe-mascotte-gratuit-vectoriel.jpg" alt="Image d'erreur 404">
            <p class="p1">Un petit café pour patienter ?</p>
        </div>
    </div>
</body>
</html>

<?php get_footer('public'); ?>
