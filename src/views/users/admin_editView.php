<?php get_header('Editer un utilisateur', 'admin'); ?>

<h1 class="mb-4">Editer un utilisateur</h1>

<div class="d-flex align-items-center py-4 vertical-center">
    <form action="" class="form-signin w-100 m-auto" method="post" novalidate>
        <div class="mb-4">
            <?php $error = checkEmptyFields('email'); ?>
            <label for="email" class="form-label">Adresse email : *</label>
            <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" class="form-control <?= $error['class']; ?>">
            <?= $error['message']; ?>
            <?= $errorMessage['email']; ?>
        </div>

        <div class="mb-4">
            <?php $error = checkEmptyFields('pwd'); ?>
            <label for="pwd" class="form-label">Mot de Passe : *</label>
            <input type="password" name="pwd" id="pwd" class="form-control <?= $error['class']; ?>">
            <p class="form-text mb-0">La règle des mots de passe</p>
            <?= $error['message']; ?>
            <?= $errorMessage['pwd']; ?>
        </div>

        <div class="mb-4">
            <?php $error = checkEmptyFields('pwd-conf'); ?>
            <label for="pwd-conf" class="form-label">Confirmation du mot de passe : *</label>
            <input type="password" name="pwd-conf" id="pwd-conf" class="form-control <?= $error['class']; ?>">
            <p class="form-text mb-0">Veuillez saisir une nouvelle fois votre mot de passe</p>
            <?= $error['message']; ?>
            <?= $errorMessage['pwd-conf']; ?>
        </div>

        <!-- Champ de sélection pour le rôle de l'utilisateur -->
        <div class="mb-4">
            <label for="role_id" class="form-label">Rôle de l'utilisateur :</label>
            <select name="role_id" id="role_id" class="form-control">
                <?php foreach ($roles as $role) : ?>
                    <option value="<?= $role['id'] ?>" <?= isset($_POST['role_id']) && $_POST['role_id'] == $role['id'] ? 'selected' : '' ?>>
                        <?= $role['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="Sauvegarder">
            <input type="reset" class="btn btn-warning" value="Réinitialiser">
        </div>
    </form>
</div>

<?php get_footer('login'); ?>

<style>
    body {
        background-color: #DCDCDC;
    }
</style>