<?php 

function getProduits() {
    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=localhost;dbname=lamachineacafe", "root", "root");
        
        // Préparation de la requête SQL
        $query = "SELECT * FROM produits";
        $statement = $pdo->prepare($query);
        
        // Exécution de la requête
        $statement->execute();
        
        // Récupération des résultats
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Fermeture de la connexion à la base de données
        $pdo = null;
        
        return $result;
    } catch (PDOException $e) {
        // En cas d'erreur, affichage du message d'erreur
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}


