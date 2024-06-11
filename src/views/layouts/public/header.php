<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Machine à Café</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header>


        <div class="header">
            <div class="connexion">
                <div class="logo-bar">
                    <div>
                        <img src="../images/logo3.svg" width="300" height="200" alt="logo">
                    </div>
                    <div class="bouton-connexion" id="bouton-connexion-acceuil">
                        <a href="<?= $router->generate('login'); ?>">Se connecter</a>
                        <img class="imgggg" src="../images/person-circle.svg" alt="se connecter">
                        <a href="<?= $router->generate('register'); ?>">Inscription</a>
                        <img class="imgggg" src="../images/bag-fill.svg" alt="panier">
                    </div>

                    <div class="panier">

                    </div>
                </div>
            </div>

            <nav class="menu">
                <ul>
                    <li> <a href="<?= $router->generate('accueil'); ?>">Accueil</a></li>
                    <li> <a href="<?= $router->generate('grain'); ?>">Machine à café à grain</a></li>
                    <li> <a href="<?= $router->generate('expresso'); ?>">Machine à café à expresso</a></li>
                    <li> <a href="<?= $router->generate('cafetieres'); ?>">Cafetières</a></li>
                    <li><a href="#">Nos cafés en grain</a></li>
                    <li><a href="#">Nos cafés moulus</a></li>
                    <li><a href=<?= $router->generate('info'); ?>>Nous découvrir</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>