<?php get_header('Liste des produits', 'admin'); ?>

<h2 class="mb-4">Liste des produits</h2>

<a href="<?= $router->generate('addProduct'); ?>" class="mb-4 btn btn-success w-25 py-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="38px" height="38px"><linearGradient id="dyoR47AMqzPbkc_5POASHa" x1="9.858" x2="38.142" y1="-27.858" y2="-56.142" gradientTransform="matrix(1 0 0 -1 0 -18)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#9dffce"/><stop offset="1" stop-color="#50d18d"/></linearGradient><path fill="url(#dyoR47AMqzPbkc_5POASHa)" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"/><path d="M34,21h-7v-7c0-1.105-0.895-2-2-2h-2c-1.105,0-2,0.895-2,2v7h-7	c-1.105,0-2,0.895-2,2v2c0,1.105,0.895,2,2,2h7v7c0,1.105,0.895,2,2,2h2c1.105,0,2-0.895,2-2v-7h7c1.105,0,2-0.895,2-2v-2	C36,21.895,35.105,21,34,21z" opacity=".05"/><path d="M34,21.5h-7.5V14c0-0.828-0.672-1.5-1.5-1.5h-2	c-0.828,0-1.5,0.672-1.5,1.5v7.5H14c-0.828,0-1.5,0.672-1.5,1.5v2c0,0.828,0.672,1.5,1.5,1.5h7.5V34c0,0.828,0.672,1.5,1.5,1.5h2	c0.828,0,1.5-0.672,1.5-1.5v-7.5H34c0.828,0,1.5-0.672,1.5-1.5v-2C35.5,22.172,34.828,21.5,34,21.5z" opacity=".07"/><linearGradient id="dyoR47AMqzPbkc_5POASHb" x1="22" x2="26" y1="24" y2="24" gradientUnits="userSpaceOnUse"><stop offset=".824" stop-color="#135d36"/><stop offset=".931" stop-color="#125933"/><stop offset="1" stop-color="#11522f"/></linearGradient><path fill="url(#dyoR47AMqzPbkc_5POASHb)" d="M23,13h2c0.552,0,1,0.448,1,1v20c0,0.552-0.448,1-1,1h-2c-0.552,0-1-0.448-1-1V14	C22,13.448,22.448,13,23,13z"/><linearGradient id="dyoR47AMqzPbkc_5POASHc" x1="13" x2="35" y1="24" y2="24" gradientUnits="userSpaceOnUse"><stop offset=".824" stop-color="#135d36"/><stop offset=".931" stop-color="#125933"/><stop offset="1" stop-color="#11522f"/></linearGradient><path fill="url(#dyoR47AMqzPbkc_5POASHc)" d="M35,23v2c0,0.552-0.448,1-1,1H14c-0.552,0-1-0.448-1-1v-2c0-0.552,0.448-1,1-1h20	C34.552,22,35,22.448,35,23z"/></svg>  Ajouter</a>

<table class="table table-striped table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center">Nom</th>
            <th scope="col" class="text-center">Description</th>
            <th scope="col" class="text-center">Prix</th>
            <th scope="col" class="text-center">Modèle</th>
            <th scope="col" class="text-center">Stock</th>
            <th scope="col" class="text-center">Code EAN</th>
            <th scope="col" class="text-center">Origine</th>
            <th scope="col" class="text-center">Poids</th>
            <th scope="col" class="text-center">Watts</th>
            <th scope="col" class="text-center">Dimensions</th>
            <th scope="col" class="text-center">Modifier/Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td class="table-light text-center align-middle"><?= htmlentities($product->nom); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->description); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->prix); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->modele); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->stock); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->code_ean); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->origine); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->poids); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->watts); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($product->dimensions); ?></td>
                <td class="table-secondary text-center align-middle">
                    
                <a  href="<?= $router->generate('deleteProduct', ['id' =>  $product->id]); ?>">
    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 100 100" width="50px" height="50px"><path fill="#8b8bc1" d="M73,30L73,30H27h-5v5l5,5l0,36.308C27,83.288,32.295,87,38.766,87h22.269C67.616,87,73,83.288,73,76.308 V39.917L78,35v-5H73z"/><path fill="#1f212b" d="M61.035,88H38.766C31.13,88,26,83.301,26,76.308V40.414l-4.707-4.707C21.105,35.52,21,35.265,21,35v-5 c0-0.552,0.448-1,1-1h56c0.552,0,1,0.448,1,1v5c0,0.268-0.108,0.525-0.299,0.713L74,40.336v35.972C74,83.301,68.79,88,61.035,88 z M23,34.586l4.707,4.707C27.895,39.48,28,39.735,28,40v36.308C28,83.461,33.8,86,38.766,86h22.269 C66.093,86,72,83.461,72,76.308V39.917c0-0.268,0.108-0.525,0.299-0.713L77,34.581V31H23V34.586z"/><path fill="#6869ad" d="M32.5,60.5l0-19.583c0-1.375,1.125-2.5,2.5-2.5h0c1.375,0,2.5,1.125,2.5,2.5v18.75v15.25 c0,1.375-1.125,2.5-2.5,2.5h0c-1.375,0-2.5-1.125-2.5-2.5l0-3.417"/><path fill="#1f212b" d="M35,77.917c-1.654,0-3-1.346-3-3V71.5c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v3.417 c0,1.103,0.897,2,2,2s2-0.897,2-2v-34c0-1.103-0.897-2-2-2s-2,0.897-2,2V60.5c0,0.276-0.224,0.5-0.5,0.5S32,60.776,32,60.5 V40.917c0-1.654,1.346-3,3-3s3,1.346,3,3v34C38,76.571,36.654,77.917,35,77.917z"/><path fill="#1f212b" d="M32.5,66c-0.276,0-0.5-0.224-0.5-0.5v-3c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v3 C33,65.776,32.776,66,32.5,66z"/><path fill="#6869ad" d="M45,77.5L45,77.5c-1.375,0-2.5-1.125-2.5-2.5V41c0-1.375,1.125-2.5,2.5-2.5h0c1.375,0,2.5,1.125,2.5,2.5v34 C47.5,76.375,46.375,77.5,45,77.5z"/><path fill="#1f212b" d="M45,78c-1.654,0-3-1.346-3-3V41c0-1.654,1.346-3,3-3s3,1.346,3,3v34C48,76.654,46.654,78,45,78z M45,39 c-1.103,0-2,0.897-2,2v34c0,1.103,0.897,2,2,2s2-0.897,2-2V41C47,39.897,46.103,39,45,39z"/><path fill="#6869ad" d="M55,77.5L55,77.5c-1.375,0-2.5-1.125-2.5-2.5V41c0-1.375,1.125-2.5,2.5-2.5h0c1.375,0,2.5,1.125,2.5,2.5v34 C57.5,76.375,56.375,77.5,55,77.5z"/><path fill="#1f212b" d="M55,78c-1.654,0-3-1.346-3-3V41c0-1.654,1.346-3,3-3s3,1.346,3,3v34C58,76.654,56.654,78,55,78z M55,39 c-1.103,0-2,0.897-2,2v34c0,1.103,0.897,2,2,2s2-0.897,2-2V41C57,39.897,56.103,39,55,39z"/><path fill="#6869ad" d="M65,77.5L65,77.5c-1.375,0-2.5-1.125-2.5-2.5V41c0-1.375,1.125-2.5,2.5-2.5l0,0c1.375,0,2.5,1.125,2.5,2.5 v34C67.5,76.375,66.375,77.5,65,77.5z"/><path fill="#1f212b" d="M65,78c-1.654,0-3-1.346-3-3V41c0-1.654,1.346-3,3-3s3,1.346,3,3v34C68,76.654,66.654,78,65,78z M65,39 c-1.103,0-2,0.897-2,2v34c0,1.103,0.897,2,2,2s2-0.897,2-2V41C67,39.897,66.103,39,65,39z"/><path fill="#a3a3cd" d="M78,30v-0.237C78,22.749,75.127,19,66.727,19H33.273C24.873,19,22,22.749,22,29.763V30H78z"/><path fill="#1f212b" d="M78 31H22c-.552 0-1-.448-1-1v-.237C21 21.628 24.785 18 33.272 18h33.455C75.215 18 79 21.628 79 29.763V30C79 30.552 78.552 31 78 31zM23.013 29h53.975c-.216-6.38-3.237-9-10.26-9H33.272C26.25 20 23.229 22.62 23.013 29zM78.5 34h-55c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h55c.276 0 .5.224.5.5S78.776 34 78.5 34zM71.5 83h-42c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h42c.276 0 .5.224.5.5S71.776 83 71.5 83z"/><path fill="#1f212b" d="M60 20H40c-.552 0-1-.448-1-1v-2.646C39 13.401 41.309 11 44.146 11h11.708C58.691 11 61 13.401 61 16.354V19C61 19.552 60.552 20 60 20zM41 18h18v-1.646C59 14.504 57.589 13 55.854 13H44.146C42.411 13 41 14.504 41 16.354V18zM68.5 27h-46c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h46c.276 0 .5.224.5.5S68.776 27 68.5 27zM73 58.917c-.552 0-1-.448-1-1v-14c0-.552.448-1 1-1 2.757 0 5 2.243 5 5v6C78 56.673 75.757 58.917 73 58.917zM74 45.088v11.657c1.164-.413 2-1.525 2-2.829v-6C76 46.613 75.164 45.5 74 45.088zM27 58.917c-2.757 0-5-2.243-5-5v-6c0-2.757 2.243-5 5-5 .552 0 1 .448 1 1v14C28 58.469 27.552 58.917 27 58.917zM26 45.088c-1.164.413-2 1.525-2 2.829v6c0 1.304.836 2.416 2 2.829V45.088zM74.5 27h-3c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h3c.276 0 .5.224.5.5S74.776 27 74.5 27z"/></svg>
</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<?php get_footer('admin'); ?>