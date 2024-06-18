<?php get_header('Créer un Produit', 'ADMIN'); ?>

<div class="formulaire">
    <div class="d-flex align-items-center py-4 vertical-center">
        <form action="" class="form-signin w-100 m-auto" method="post" enctype="multipart/form-data" novalidate>

            <h1 class="h3 mb-4 display-6 fw-normal text-center">Créer un Produit:</h1>

            <div class="form-floating mb-3">
                <?php $error = checkEmptyFields('nom'); ?>
                <input type="text" name="nom" id="nom" class="form-control <?= $error['class']; ?>" value="<?= getValue('nom'); ?>" placeholder="Nom du Produit">
                <label for="nom">Nom du Produit</label>
                <?= $errorMessage['nom']; ?>
            </div>

            <div class="form-floating mb-3">
                <?php $error = checkEmptyFields('description'); ?>
                <textarea name="description" id="description" class="form-control <?= $error['class']; ?>" placeholder="Description du Produit"><?= getValue('description'); ?></textarea>
                <label for="description">Description du Produit</label>
                <?= $errorMessage['description']; ?>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('prix'); ?>
                        <input type="number" step="0.01" name="prix" id="prix" class="form-control <?= $error['class']; ?>" value="<?= getValue('prix'); ?>" placeholder="Prix">
                        <label for="prix">Prix</label>
                        <?= $errorMessage['prix']; ?>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('modele'); ?>
                        <input type="text" name="modele" id="modele" class="form-control <?= $error['class']; ?>" value="<?= getValue('modele'); ?>" placeholder="Modèle">
                        <label for="modele">Modèle</label>
                        <?= $errorMessage['modele']; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('stock'); ?>
                        <input type="number" name="stock" id="stock" class="form-control <?= $error['class']; ?>" value="<?= getValue('stock'); ?>" placeholder="Stock">
                        <label for="stock">Stock</label>
                        <?= $errorMessage['stock']; ?>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('code_ean'); ?>
                        <input type="text" name="code_ean" id="code_ean" class="form-control <?= $error['class']; ?>" value="<?= getValue('code_ean'); ?>" placeholder="Code EAN">
                        <label for="code_ean">Code EAN</label>
                        <?= $errorMessage['code_ean']; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('origine'); ?>
                        <input type="text" name="origine" id="origine" class="form-control <?= $error['class']; ?>" value="<?= getValue('origine'); ?>" placeholder="Origine">
                        <label for="origine">Origine</label>
                        <?= $errorMessage['origine']; ?>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('poids'); ?>
                        <input type="number" step="0.01" name="poids" id="poids" class="form-control <?= $error['class']; ?>" value="<?= getValue('poids'); ?>" placeholder="Poids">
                        <label for="poids">Poids</label>
                        <?= $errorMessage['poids']; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('watts'); ?>
                        <input type="text" name="watts" id="watts" class="form-control <?= $error['class']; ?>" value="<?= getValue('watts'); ?>" placeholder="Watts">
                        <label for="watts">Watts</label>
                        <?= $errorMessage['watts']; ?>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <?php $error = checkEmptyFields('dimensions'); ?>
                        <input type="text" name="dimensions" id="dimensions" class="form-control <?= $error['class']; ?>" value="<?= getValue('dimensions'); ?>" placeholder="Dimensions">
                        <label for="dimensions">Dimensions</label>
                        <?= $errorMessage['dimensions']; ?>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">

                <select name="marque_id" id="marque_id" class="form-select">
                    <option value="" selected disabled>Sélectionner une marque</option>
                    <?php foreach ($marques as $marque) : ?>
                        <option value="<?= $marque['id']; ?>"><?= $marque['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="marque_id">Marque</label>
                <?= $errorMessage['marque_id']; ?>

            </div>

            <div class="form-floating mb-3">
                <select name="categorie_id" id="categorie_id" class="form-select">
                    <option value="" selected disabled>Sélectionner une catégorie</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id']; ?>"><?= $category['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="categorie_id">Catégorie</label>
                <?= $errorMessage['categorie_id']; ?>
            </div>

            <div class="form-floating mb-3">
                <input type="file" name="image" id="image" class="form-control">
                <label for="image">Image du produit</label>
                <?= $errorMessage['image']; ?>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="submit" value="Envoyer" class="btn btn-success w-100 py-2">
                </div>
                <div class="col-md-6">
                    <input type="reset" class="btn btn-warning w-100 py-2 " value="Réinitialiser">
                </div>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

        </form>
    </div>
</div>

<?php get_footer('login'); ?>

<style>
    html,
    body,
    .formulaire {
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