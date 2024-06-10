<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 La Machine à Café. Tous droits réservés.</p>
    </div>
</footer>

<style>

footer {
    background-color: #fff6e0;
    color: #000000; /* Change text color to black */
    padding: 20px 0;
    margin-top: 250px;
    margin-left: auto;
    margin-right: auto;
}
.footer-container {
    display: flex;
    justify-content: space-around;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-section {
    flex: 1;
    margin-right: 20px;
}

.footer-section h3 {
    font-size: 20px;
    margin-bottom: 10px;
    
}

.footer-section p,
.footer-section ul {
    margin: 0;
    padding: 0;

}

.footer-section ul li {
    list-style: none;
    margin-bottom: 5px;
    color: #000000; /* Change text color to black */


}

.footer-section ul li a {
    text-decoration: none;
    color: #000000; /* Change text color to black */

}

.footer-bottom {
    text-align: center;
    margin-top: 20px;
    color: #ffffff; 

}

.footer-bottom p {
    font-size: 14px;
    color: #000000; /* Change text color to black */

}

</style>