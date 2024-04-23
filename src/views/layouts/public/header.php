<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?> | La Machine a Cafe </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <style>
    .bg-beige {
      background-color: #d0b49f
    }

    .navbar.navbar-expand-lg .navbar-nav .nav-link {
      font-weight: bold;
    }

    .btn-connexion {
      border-color: #007bff;
      color: #fff;
    }

    .btn-connexion:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .btn-inscription {
      background-color: #28a745;
      border-color: #28a745;
      color: #fff;
    }

    .btn-inscription:hover {
      background-color: #218838;
      border-color: #218838;
    }
  </style>

  <header>
    <nav class="navbar navbar-expand-lg bg-beige mb-4" data-bs-theme="light">
      <div class="container">
        <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
            <path fill="#c48c00" d="M44,37H4v5c0,1.105,0.895,2,2,2h36c1.105,0,2-0.895,2-2V37z" />
            <linearGradient id="mqGAn~AfKUNcLhPwXVdula" x1="24" x2="24" y1="15.647" y2="-.296" gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-color="#92a3b0" />
              <stop offset=".015" stop-color="#a3b5c4" />
              <stop offset=".032" stop-color="#aec2d1" />
              <stop offset=".046" stop-color="#b2c6d6" />
            </linearGradient>
            <path fill="url(#mqGAn~AfKUNcLhPwXVdula)" d="M11,13v3h4v-3c0-4.971,4.029-9,9-9h0c4.971,0,9,4.029,9,9v3h4v-3c0-7.18-5.82-13-13-13h0	C16.82,0,11,5.82,11,13z" />
            <path fill="#fad500" d="M44,23H4v-5c0-1.105,0.895-2,2-2h36c1.105,0,2,0.895,2,2V23z" />
            <rect width="40" height="7" x="4" y="23" fill="#edbe00" />
            <rect width="40" height="7" x="4" y="30" fill="#e3a600" />
            <linearGradient id="mqGAn~AfKUNcLhPwXVdulb" x1="24" x2="24" y1="35.373" y2="27.155" gradientUnits="userSpaceOnUse">
              <stop offset="0" stop-color="#4b4b4b" />
              <stop offset="1" stop-color="#3b3b3b" />
            </linearGradient>
            <path fill="url(#mqGAn~AfKUNcLhPwXVdulb)" d="M27,29c0-1.657-1.343-3-3-3s-3,1.343-3,3c0,1.304,0.837,2.403,2,2.816V35c0,0.552,0.448,1,1,1	s1-0.448,1-1v-3.184C26.163,31.403,27,30.304,27,29z" />
          </svg> Menu Utilisateur | La Machine a Cafe </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" Cinema>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex align-items-center">
          <button type="button" class="btn btn-success px-3 me-2" onclick="window.location.href='https://lamachineacafe.test/admin/connexion'">Se connecter</button>
          <button type="button" class="btn btn-primary me-3" onclick="window.location.href='https://lamachineacafe.test/inscription'">Inscription</button>
        </div>

      </div>
      </div>
      </div>
    </nav>
  </header>
  <main class="container mb-4">

    <?php displayAlert(); ?>

    <style>
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

      .admin-name {
        color: #333;
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
    </style>