<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/footer.css">

</head>
<body>
    
</body>
</html>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>À propos de nous</h3>
            <p>Description de votre entreprise ici...</p>
        </div>
        <div class="footer-section">
            <h3>Nos produits</h3>
            <ul>
                <li><a href="#">Machine à café à grain</a></li>
                <li><a href="#">Machine à café à expresso</a></li>
                <li><a href="#">Cafetières</a></li>
                <!-- Ajoutez d'autres liens de produits ici -->
            </ul>
        </div>
        <div class="footer-section">
            <h3>Nous contacter</h3>
            <ul>
                <li><a href="#">Adresse</a></li>
                <li><a href="#">Téléphone</a></li>
                <li><a href="#">Email</a></li>
                <li><a href="<?= $router->generate('rgpd') ?>">Politique de Confidentialité</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 La Machine à Café. Tous droits réservés.</p>
    </div>
</footer>

