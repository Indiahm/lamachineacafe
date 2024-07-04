<?php
function handlePasswordResetRequest()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!verifyCsrfToken($_POST['csrf_token'])) {
            setMessage('error', 'Erreur détectée. Veuillez réessayer à nouveau.');
            return;
        }

        $email = $_POST['email'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            setMessage('error', 'L\'adresse email ne respecte pas le bon format.');
            return;
        }

        $user = getUserEmail($email);

        if ($user) {
            $newPassword = generateRandomPassword();
            if (resetPassword($email, $newPassword)) {
                $subject = "Réinitialisation de votre mot de passe";
                $message = "Votre nouveau mot de passe est : $newPassword";
                $headers = "From: webmaster@example.com" . "\r\n" .
                    "Reply-To: webmaster@example.com" . "\r\n" .
                    "X-Mailer: PHP/" . phpversion();

                mail($email, $subject, $message, $headers);
                setMessage('success', 'Un email avec votre nouveau mot de passe a été envoyé.');
            } else {
                setMessage('error', 'Erreur lors de la réinitialisation du mot de passe.');
            }
        } else {
            setMessage('error', 'Aucun utilisateur ne correspond à l\'email indiqué');
        }
    }
}


handlePasswordResetRequest();
