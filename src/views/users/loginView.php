<?php get_header('Se connecter', 'login'); ?>


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Se connecter</div>

                <div class="card-body">
                    <?php if (!empty($error_message)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error_message ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success_message'])) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success_message'] ?>
                        </div>
                        <?php unset($_SESSION['success_message']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['welcome_message'])) : ?>
                        <div class="alert alert-info" role="alert">
                            <?= $_SESSION['welcome_message'] ?>
                        </div>
                        <?php unset($_SESSION['welcome_message']); ?>
                    <?php endif; ?>

                    <?php if ($_SESSION['role'] !== 'admin') : ?>
                    <div class="alert alert-danger" role="alert">
                    Vous n'avez pas les droits requis pour accéder à cette page.
                    </div>
                    <?php endif; ?>

                    <form method="POST" action="<?= $router->generate('login'); ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
            <div class="mt-3">
                <a href="<?= $router->generate('register'); ?>">Pas encore inscrit ? Créer un compte ici</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer('login'); ?>