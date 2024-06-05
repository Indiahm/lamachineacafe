<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Machine à Café</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="bandeau">
            <div>
                <h2>Livraison gratuite à partir de 50 euros</h2>
            </div>
        </div>

        <div class="header">
            <div class="menu">
                <div class="logo-bar">
                    <div>
                        <img src="../images/logo3.svg" width="300" height="200" alt="logo">
                    </div>



                    <div class="bouton-connexion" id="bouton-connexion-acceuil">
                        <a href="<?= $router->generate('login'); ?>">Se connecter</a>
                        <img src="../images/person-circle.svg" alt="se connecter">
                    </div>

                    <div class="panier">
                        <a href="<?= $router->generate('register'); ?>">Inscription</a>
                        <img src="../images/bag-fill.svg" alt="panier">
                    </div>
                </div>
            </div>
            
            <nav class="menu">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Machine à café à grain</a></li>
                    <li><a href="#">Machine à café à expresso</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Cafetières</a>
                        <div class="dropdown-content">
                            <a href="#">Catégorie 1</a>
                            <a href="#">Catégorie 2</a>
                            <a href="#">Catégorie 3</a>
                            <a href="#">Catégorie 4</a>
                        </div>
                    </li>
                    <li><a href="#">Nos cafés en grain</a></li>
                    <li><a href="#">Nos cafés moulus</a></li>
                    <li><a href="#">Nous découvrir</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>
