<?php get_header('Modifier Profil', 'public'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
    <link rel="stylesheet" href="../css/profil.css">
</head>
<body>
    <div class="container">
        <h1>Modifier Profil</h1>
        <?php if (isset($_SESSION['messages']) && count($_SESSION['messages']) > 0): ?>
    <div class="messages">
        <?php foreach ($_SESSION['messages'] as $message): ?>
            <div class="message <?= htmlspecialchars($message['type']) ?>">
                <?= htmlspecialchars($message['message']) ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php unset($_SESSION['messages']); // Supprimer les messages après les avoir affichés ?>
<?php endif; ?>

        <form action="<?= $router->generate('update_profile'); ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

            <div class="form-group">
                <label for="first_name">Prénom :</label>
                <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($user['last_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse email :</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="shipping_address">Adresse de livraison :</label>
                <input type="text" id="shipping_address" name="shipping_address" value="<?= htmlspecialchars($user['shipping_address']); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Téléphone :</label>
                <input type="text" id="phone_number" name="phone_number" value="<?= htmlspecialchars($user['phone_number']); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit">Mettre à jour</button>
        </form>
        <a class="retour" href="<?= $router->generate('profil'); ?>">Retour au profil</a>
    </div>
</body>
</html>

<style>
    /* ../css/profil.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333333;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333333;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

.retour {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #007BFF;
    text-decoration: none;
}

.retour:hover {
    text-decoration: underline;
}

</style>