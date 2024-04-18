<?php get_header('Se connecter', 'login'); ?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Se connecter</div>

                <div class="card-body">
                    <?php if (!empty($error_message)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $error_message ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success_message'])) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['success_message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['success_message']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['welcome_message'])) : ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <?= $_SESSION['welcome_message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['welcome_message']); ?>
                    <?php endif; ?>

                    <?php if (isset($_GET['success_message'])) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($_GET['success_message']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

<script>
    // Sélectionne tous les messages d'erreur avec la classe alert-dismissible
    const errorMessages = document.querySelectorAll('.alert-dismissible');

    // Pour chaque message d'erreur, ajoute une temporisation pour le cacher après 5 secondes
    errorMessages.forEach(message => {
        setTimeout(() => {
            message.style.display = 'none';
        }, 5000); // 5000 millisecondes = 5 secondes
    });
</script>
