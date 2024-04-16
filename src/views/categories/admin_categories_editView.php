<?php get_header('Modifier une categorie', 'admin'); ?>

<div class="formulaire">
    <div class="d-flex align-items-center py-4 vertical-center">
        <form action="" class="form-signin w-100 m-auto" method="post" novalidate> 
            <h1 class="h3 mb-4 display-6 fw-normal text-center">Créer une Catégorie:</h1>
            
            <div class="form-floating">
                <?php $error = checkEmptyFields('nom'); ?>
                <input type="text" name="nom" id="nom" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('nom'); ?>" placeholder="Nom de la catégorie">
                <label for="nom" class="form-label">Nom de la catégorie</label>
                <?= $errorMessage['nom']; ?>
            </div>

            <input type="submit" class="mb-3 btn btn-success w-100 py-2" value="Valider">
            <input type="reset" class="btn btn-warning w-100 py-2" value="Réinitialiser">
        </form>
    </div>
</div>

<?php get_footer('admin'); ?>

<style>
    html,
    body,

    .formulaire{

        background-color: #DCDCDC;

    }
    .vertical-center {
        height: 50%;
    }

    .form-signin {
        max-width: 450px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="text"],
    .form-signin input[type="date"],
    .form-signin textarea {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="text"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
</body>
</html>

