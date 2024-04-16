<?php get_header('Inscription', 'login'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #663300;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #663300;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            grid-column: span 2;
        }

        button[type="submit"]:hover {
            background-color: #552800;
        }

        .success-message {
            padding: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-message">
            <p>Inscription Réussie avec succès !</p>
        </div>
    <?php endif; ?>

    <h1>Inscription</h1>
    <form method="post">
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="confirm_password">Confirmer le mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <div>
            <label for="shipping_address">Adresse de livraison :</label>
            <input type="text" id="shipping_address" name="shipping_address" required>
        </div>

        <div>
            <label for="phone_number">Numéro de téléphone :</label>
            <input type="text" id="phone_number" name="phone_number">
        </div>

        <div>
            <label for="first_name">Prénom :</label>
            <input type="text" id="first_name" name="first_name">
        </div>

        <div>
            <label for="last_name">Nom :</label>
            <input type="text" id="last_name" name="last_name">
        </div>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>

<?php get_footer('login'); ?>
