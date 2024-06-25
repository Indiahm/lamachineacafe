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
                        <img class="imgggg" src="../images/person-circle.svg" alt="se connecter">
                        <span class="admin-name">Utilisateur | </span> <span class="name"> <?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></span>
                    </div>

                    <div class="panier-logo">
                        <a href="<?= $router->generate('panier'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
                            </svg>
                            <span>Mon Panier</span>
                        </a>
                    </div>

                    <div class="panier-logo">
    <a href="<?= $router->generate('profil', ['uuid' => $_SESSION['user_id']]); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H3zm5-6a3 3 0 1 0-3-3 3 3 0 0 0 3 3z"/>
        </svg>
        <span>Mon Profil</span>
    </a>
</div>



                    <div class="logout">
                        <a id="logout" class="nav-link logout-btn" href="<?= $router->generate('logout') ?>">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </a>
                    </div>
                </div>


            </div>

            <nav class="menu">
                <ul>
                    <li><a href="<?= $router->generate('accueil'); ?>">Accueil</a></li>
                    <li><a href="<?= $router->generate('grain'); ?>">Machine à café à grain</a></li>
                    <li><a href="<?= $router->generate('expresso'); ?>">Machine à café à expresso</a></li>
                    <li><a href="<?= $router->generate('cafetieres'); ?>">Cafetières</a></li>
                    <li><a href="#">Nos cafés en grain</a></li>
                    <li><a href="#">Nos cafés moulus</a></li>
                    <li><a href="<?= $router->generate('info'); ?>">Nous découvrir</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>