<?php get_header('Accueil', 'public'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/acceuil.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <?php
        $successes = getAndClearMessages('success');
        displaySuccessMessages($successes);
        ?>

        <div id="carouselExampleControls" class="carousel slide animate__animated animate__fadeIn" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/images/1.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="">Machine à Café en grain</h5>
                        <p class="animate__animated animate__fadeIn">Découvrez notre sélection de machines à café en grain pour une expérience caféine exceptionnelle.</p>
                        <a href="<?= $router->generate('grain'); ?>" class="details animate__animated animate__fadeInUp">En savoir d'avantage</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/images/2.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="">Machine à expresso</h5>
                        <p class="animate__animated animate__fadeIn">Explorez notre gamme de machines à expresso pour savourer des cafés riches et aromatiques à tout moment de la journée.</p>
                        <a href="<?= $router->generate('expresso'); ?>" class="details animate__animated animate__fadeInUp">En savoir d'avantage</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="public/images/3.webp" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="">Cafetières</h5>
                        <p class="animate__animated animate__fadeIn">Découvrez nos cafetières pour préparer des cafés filtre de qualité supérieure avec facilité et élégance.</p>
                        <a href="<?= $router->generate('cafetieres'); ?>" class="details animate__animated animate__fadeInUp">En savoir d'avantage</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        <h1 class="mb-4">Liste des Produits Café</h1>
        <p class="p animate__animated animate__fadeIn">Ici se trouve la liste des produits pour le café.</p>
        <div class="ligne animate__animated animate__fadeIn"></div>


        <div class="row animate__animated animate__fadeIn">
            <div class="col-md-4">
                <div class="card">
                    <img src="../public/images/cafés.jpg" class="card-img-top" alt="Image 1">
                    <div class="card-body">
                        <h5 class="card-title">Nos Cafés</h5>
                        <a href="<?= $router->generate('cafe') ?>" class="details">En savoir d'avantage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="../public/images/Matériels.png" class="card-img-top" alt="Image 2">
                    <div class="card-body">
                        <h5 class="card-title">Nos Machines</h5>
                        <a href="<?= $router->generate('machine') ?>" class="details">En savoir d'avantage</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="../images/Professionel.jpg" class="card-img-top" alt="Image 3">
                    <div class="card-body">
                        <h5 class="card-title">Professionels</h5>
                        <a href="<?= $router->generate('info') ?>" class="details">Voir les détails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php get_footer('public'); ?>

