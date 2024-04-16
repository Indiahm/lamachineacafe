<?php get_header('Créer un Produit', 'ADMIN'); ?>

<div class="formulaire">
    <div class="d-flex align-items-center py-4 vertical-center">
    <form action="" class="form-signin w-100 m-auto" method="post" enctype="multipart/form-data" novalidate>

            <h1 class="h3 mb-4 display-6 fw-normal text-center">Créer un Produit:</h1>

            <div class="form-floating">
                <?php $error = checkEmptyFields('nom'); ?>

                <input type="text" name="nom" id="nom" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('nom'); ?>" placeholder="Nom du Produit">
                <label for="nom" class="form-label">Nom du Produit</label>
                <?= $errorMessage['nom']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('description'); ?>
                <textarea name="description" id="description" class="mb-2 form-control <?= $error['class']; ?>" placeholder="Description du Produit"><?= getValue('description'); ?></textarea>
                <label for="description" class="form-label">Description du Produit</label>
                <?= $errorMessage['description']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('prix'); ?>
                <input type="number" step="0.01" name="prix" id="prix" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('prix'); ?>" placeholder="Prix">
                <label for="prix" class="form-label">Prix</label>
                <?= $errorMessage['prix']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('modele'); ?>
                <input type="text" name="modele" id="modele" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('modele'); ?>" placeholder="Modèle">
                <label for="modele" class="form-label">Modèle</label>
                <?= $errorMessage['modele']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('stock'); ?>
                <input type="number" name="stock" id="stock" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('stock'); ?>" placeholder="Stock">
                <label for="stock" class="form-label">Stock</label>
                <?= $errorMessage['stock']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('code_ean'); ?>
                <input type="text" name="code_ean" id="code_ean" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('code_ean'); ?>" placeholder="Code EAN">
                <label for="code_ean" class="form-label">Code EAN</label>
                <?= $errorMessage['code_ean']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('origine'); ?>
                <input type="text" name="origine" id="origine" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('origine'); ?>" placeholder="Origine">
                <label for="origine" class="form-label">Origine</label>
                <?= $errorMessage['origine']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('poids'); ?>
                <input type="number" step="0.01" name="poids" id="poids" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('poids'); ?>" placeholder="Poids">
                <label for="poids" class="form-label">Poids</label>
                <?= $errorMessage['poids']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('watts'); ?>
                <input type="number" name="watts" id="watts" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('watts'); ?>" placeholder="Watts">
                <label for="watts" class="form-label">Watts</label>
                <?= $errorMessage['watts']; ?>
            </div>

            <div class="form-floating">
                <?php $error = checkEmptyFields('dimensions'); ?>
                <input type="text" name="dimensions" id="dimensions" class="mb-2 form-control <?= $error['class']; ?>" value="<?= getValue('dimensions'); ?>" placeholder="Dimensions">
                <label for="dimensions" class="form-label">Dimensions</label>
                <?= $errorMessage['dimensions']; ?>
            </div>
            
                       <!-- Champ de sélection pour la catégorie -->
                       <div class="form-floating">
                <select name="categorie_id" id="categorie_id" class="mb-2 form-select">
                    <option value="" selected disabled>Sélectionner une catégorie</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id']; ?>"><?= $category['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="categorie_id" class="form-label">Catégorie</label>
            </div>

            <input type="submit" value="Envoyer" class="mb-3 btn btn-success w-100 py-2" value="Valider">
            <input type="reset" class="btn btn-warning w-100 py-2 " value="Réinitialiser">

        </form>
    </div>
</div>

<?php get_footer('login'); ?>

<style>
    html,
    body,
    .formulaire{
        background-color: #DCDCDC;
    }
    .vertical-center {
        height: 100%;
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
    .form-signin input[type="number"],
    .form-signin textarea {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="text"],
    .form-signin input[type="number"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
</body>
</html>
