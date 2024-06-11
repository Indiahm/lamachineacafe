<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../config');
$dotenv->load();
\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['stripeToken'];
    $totalPrice = $_SESSION['total_price']; // Assurez-vous que le prix total est défini dans la session

    try {
        $charge = \Stripe\Charge::create([
            'amount' => $totalPrice * 100, // Convertir en centimes
            'currency' => 'eur',
            'description' => 'Description de votre achat',
            'source' => $token,
        ]);

        // Traiter la commande dans votre base de données
        // ...

        // Afficher un message de succès et rediriger l'utilisateur
        $_SESSION['success_message'] = "Paiement effectué avec succès!";
        header('Location: /confirmation');
        exit();
    } catch (\Stripe\Exception\CardException $e) {
        $_SESSION['error_message'] = $e->getMessage();
        header('Location: /checkout');
        exit();
    }
}
?>
