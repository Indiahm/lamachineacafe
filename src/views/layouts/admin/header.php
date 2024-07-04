<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> | La Machine a Cafe </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>

    <body>

    <header>
        <nav class="navbar navbar-expand-lg bg-beige mb-4" data-bs-theme="light">
            <div class="container">
                <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
                    </svg> Menu Admin | La Machine a Cafe </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="https://lamachineacafe.test/admin/produits">
                                <i class="fas fa-boxes mr-2"></i> Produit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://lamachineacafe.test/admin/utilisateurs">
                                <i class="fas fa-users mr-2"></i> Utilisateurs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://lamachineacafe.test/admin/categories">
                                <i class="fas fa-th-list mr-2"></i> Catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://lamachineacafe.test/admin/marques">
                                <i class="fas fa-tags mr-2"></i> Marques
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-tags mr-2"></i> Commandes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="logout" class="nav-link" href="<?= htmlspecialchars($router->generate('logout'), ENT_QUOTES, 'UTF-8'); ?>">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <main class="container mb-4">

            <?php displayAlert(); ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    </body>
    </html>




    <style>
                .bg-beige {
                    background-color: #d0b49f;
                }

                .navbar.navbar-expand-lg .navbar-nav .nav-link {
                    font-weight: bold;
                    margin-left: 25px;
                }

                .admin-name {
                    font-weight: bold;
                    color: black;
                }

                body {
                    background-color: #f8f9fa;
                }

                .container {
                    margin-top: 20px;
                    margin-bottom: 20px;
                }

                .navbar {
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .navbar-brand {
                    font-size: 1.2rem;
                }

                .navbar-nav .nav-link {
                    color: #333;
                }

                .navbar-nav .nav-link:hover {
                    color: #007bff;
                }

                .btn-outline-danger {
                    color: #dc3545;
                    border-color: #dc3545;
                }

                .btn-outline-danger:hover {
                    color: #fff;
                    background-color: #dc3545;
                    border-color: #dc3545;
                }

                .form-control {
                    border-color: #ced4da;
                }

                .alert {
                    margin-bottom: 20px;
                }

                footer {
                    padding: 20px 0;
                    background-color: #343a40;
                    color: #fff;
                    text-align: center;
                }

                .admin-name {
                    margin-left: 30px;

                }

                .name {
                    color: #FF6666;
                    font-weight: 700;
                }

                .sidebar {
                    /* position: fixed; */
                    top: 98px;
                    bottom: 0;
                    left: 0;
                    z-index: 100;
                    padding: 48px 20px 0;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    background-color: #f8f9fa;
                }

                .nav-link {
                    color: #495057;
                    font-size: 18px;
                    font-weight: 400;
                    padding: 10px 20px;
                }

                .nav-link:hover {
                    color: #007bff;
                    background-color: #d0b49f;
                }

                #logout {
                    color: #FF6666;
                    font-weight: 600;
                }

                h1 {
                    font-size: 20px;
                    margin-left: 15px;
                    margin-right: 15px;
                    margin-bottom: 25px;
                    margin-top: 25px;
                }

         
                
            </style>
