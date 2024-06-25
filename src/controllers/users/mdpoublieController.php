<?php

// Générer le jeton CSRF pour cette page
generateCsrfToken();

function handlePasswordResetRequest()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérification du jeton CSRF
        if (!validateCsrfToken($_POST['csrf_token'])) {
            setAndRedirectWithMessage('error', 'Erreur CSRF : Le jeton CSRF est invalide.');
            return;
        }

        $email = $_POST['email'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setAndRedirectWithMessage('error', 'Adresse email invalide.');
            return;
        }

        $user = getUserByEmail($email);

        if ($user) {
            $newPassword = generateRandomPassword();
            if (resetPassword($email, $newPassword)) {
                // Envoyer un email avec le nouveau mot de passe à l'utilisateur
                $subject = "Réinitialisation de votre mot de passe";
                $message = "Votre nouveau mot de passe est : $newPassword";
                $headers = "From: webmaster@example.com" . "\r\n" .
                    "Reply-To: webmaster@example.com" . "\r\n" .
                    "X-Mailer: PHP/" . phpversion();

                mail($email, $subject, $message, $headers);
                setAndRedirectWithMessage('success', 'Un email avec votre nouveau mot de passe a été envoyé.');
            } else {
                setAndRedirectWithMessage('error', 'Erreur lors de la réinitialisation du mot de passe.');
            }
        } else {
            setAndRedirectWithMessage('error', 'Aucun utilisateur trouvé avec cette adresse email.');
        }
    }
}


handlePasswordResetRequest();
