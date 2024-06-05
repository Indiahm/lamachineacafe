<?php get_header('Inscription', 'public'); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                    <div class="wrapper">
                        <div class="row">
                            <?php if (isset($error_message) && !empty($error_message)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error_message ?>
                                </div>
                            <?php endif; ?>
                            <div class="col text-center">
                                <h1>Inscription</h1>
                            </div>
                        </div>
                        <form method="post">
                            <div class="row align-items-center">
                                <div class="col mt-4">
                                    <label for="email">Email :</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <label for="password">Mot de passe :</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="col">
                                    <label for="confirm_password">Confirmer le mot de passe :</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <label for="shipping_address">Adresse de livraison :</label>
                                    <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <label for="phone_number">Numéro de téléphone :</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col">
                                    <label for="first_name">Prénom :</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="col">
                                    <label for="last_name">Nom :</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="row justify-content-start mt-4 center-button">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mt-4">S'inscrire</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php get_footer('public'); ?>
<?php checkSessionTimeout(); ?>
