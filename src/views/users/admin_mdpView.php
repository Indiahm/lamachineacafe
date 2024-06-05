<?php get_header('Editer un utilisateur', 'admin'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer un utilisateur</title>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Editer un utilisateur</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" class="form-signin" method="post" novalidate>
                <div class="mb-3">
                    <?php $error = checkEmptyFields('email'); ?>
                    <label for="email" class="form-label">Adresse email : *</label>
                    <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" class="form-control <?= $error['class']; ?>">
                    <div class="invalid-feedback"><?= $error['message']; ?></div>
                    <div class="text-danger"><?= $errorMessage['email']; ?></div>
                </div>

                <div class="mb-3">
                    <?php $error = checkEmptyFields('password'); ?>
                    <label for="password" class="form-label">Nouveau mot de passe : *</label>
                    <input type="password" name="password" id="password" class="form-control <?= $error['class']; ?>">
                    <div class="invalid-feedback"><?= $error['message']; ?></div>
                    <div class="text-danger"><?= $errorMessage['password']; ?></div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe : *</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="Sauvegarder">
                    <input type="reset" class="btn btn-warning" value="Réinitialiser">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php get_footer('login'); ?>

<style>
    body {
        background-color: #DCDCDC;
    }
</style>

<?php checkSessionTimeout(); ?>

<style>
  .ligne {
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    margin: 20px 0;
  }
</style>
