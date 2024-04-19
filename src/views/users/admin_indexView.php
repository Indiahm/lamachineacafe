<?php get_header('Liste des utilisateurs', 'admin'); ?>

<h2 class="mb-4">Liste des utilisateurs</h2>

<a href="<?= $router->generate('addUser'); ?>" class="mb-4 btn btn-success w-25 py-2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="38px" height="38px">
        <linearGradient id="dyoR47AMqzPbkc_5POASHa" x1="9.858" x2="38.142" y1="-27.858" y2="-56.142" gradientTransform="matrix(1 0 0 -1 0 -18)" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#9dffce" />
            <stop offset="1" stop-color="#50d18d" />
        </linearGradient>
        <path fill="url(#dyoR47AMqzPbkc_5POASHa)" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z" />
        <path d="M34,21h-7v-7c0-1.105-0.895-2-2-2h-2c-1.105,0-2,0.895-2,2v7h-7	c-1.105,0-2,0.895-2,2v2c0,1.105,0.895,2,2,2h7v7c0,1.105,0.895,2,2,2h2c1.105,0,2-0.895,2-2v-7h7c1.105,0,2-0.895,2-2v-2	C36,21.895,35.105,21,34,21z" opacity=".05" />
        <path d="M34,21.5h-7.5V14c0-0.828-0.672-1.5-1.5-1.5h-2	c-0.828,0-1.5,0.672-1.5,1.5v7.5H14c-0.828,0-1.5,0.672-1.5,1.5v2c0,0.828,0.672,1.5,1.5,1.5h7.5V34c0,0.828,0.672,1.5,1.5,1.5h2	c0.828,0,1.5-0.672,1.5-1.5v-7.5H34c0.828,0,1.5-0.672,1.5-1.5v-2C35.5,22.172,34.828,21.5,34,21.5z" opacity=".07" />
        <linearGradient id="dyoR47AMqzPbkc_5POASHb" x1="22" x2="26" y1="24" y2="24" gradientUnits="userSpaceOnUse">
            <stop offset=".824" stop-color="#135d36" />
            <stop offset=".931" stop-color="#125933" />
            <stop offset="1" stop-color="#11522f" />
        </linearGradient>
        <path fill="url(#dyoR47AMqzPbkc_5POASHb)" d="M23,13h2c0.552,0,1,0.448,1,1v20c0,0.552-0.448,1-1,1h-2c-0.552,0-1-0.448-1-1V14	C22,13.448,22.448,13,23,13z" />
        <linearGradient id="dyoR47AMqzPbkc_5POASHc" x1="13" x2="35" y1="24" y2="24" gradientUnits="userSpaceOnUse">
            <stop offset=".824" stop-color="#135d36" />
            <stop offset=".931" stop-color="#125933" />
            <stop offset="1" stop-color="#11522f" />
        </linearGradient>
        <path fill="url(#dyoR47AMqzPbkc_5POASHc)" d="M35,23v2c0,0.552-0.448,1-1,1H14c-0.552,0-1-0.448-1-1v-2c0-0.552,0.448-1,1-1h20	C34.552,22,35,22.448,35,23z" />
    </svg> Ajouter</a>

<table class="table table-striped table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Rôle</th>
            <th scope="col" class="text-center">Créé</th>
            <th scope="col" class="text-center">Modifié</th>
            <th scope="col" class="text-center">Dernière connexion</th>
            <th scope="col" class="text-center">Adresse de livraison</th>
            <th scope="col" class="text-center">Numéro de téléphone</th>
            <th scope="col" class="text-center">Prénom</th>
            <th scope="col" class="text-center">Nom</th>
            <th scope="col" class="text-center">Modifier/Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td class="table-light text-center align-middle"><?= htmlentities($user->email); ?></td>
                <td class="table-light text-center align-middle"><?= getRoleName($user->role_id); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->created); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->modified); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->lastLogin); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->shipping_address); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->phone_number); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->first_name); ?></td>
                <td class="table-light text-center align-middle"><?= htmlentities($user->last_name); ?></td>
                <td class="table-secondary text-center align-middle">
                    <!-- Modifier -->
                    <a href="<?= $router->generate('editUser', ['id' =>  $user->id]); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" zoomAndPan="magnify" viewBox="0 0 375 374.999991" height="100" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="b11ed501ba"><path d="M 122.71875 204 L 232 204 L 232 249 L 122.71875 249 Z M 122.71875 204 " clip-rule="nonzero"/></clipPath><clipPath id="4166661430"><path d="M 143 112.5 L 212 112.5 L 212 164 L 143 164 Z M 143 112.5 " clip-rule="nonzero"/></clipPath><clipPath id="10087e61db"><path d="M 231 187 L 252.46875 187 L 252.46875 208 L 231 208 Z M 231 187 " clip-rule="nonzero"/></clipPath><clipPath id="c208e4418c"><path d="M 177 242 L 198 242 L 198 262.5 L 177 262.5 Z M 177 242 " clip-rule="nonzero"/></clipPath><clipPath id="f29d02a5d2"><path d="M 177 252 L 188 252 L 188 262.5 L 177 262.5 Z M 177 252 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#b11ed501ba)"><path fill="#4fc3f7" d="M 194.234375 204.503906 C 194.234375 204.503906 190.828125 218.105469 177.207031 218.105469 C 163.585938 218.105469 160.179688 204.503906 160.179688 204.503906 C 160.179688 204.503906 122.71875 211.257812 122.71875 248.710938 L 231.695312 248.710938 C 231.695312 211.390625 194.234375 204.503906 194.234375 204.503906 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#ff9800" d="M 177.207031 224.90625 C 160.179688 224.90625 160.179688 204.503906 160.179688 204.503906 L 160.179688 184.097656 L 194.234375 184.097656 L 194.234375 204.503906 C 194.234375 204.503906 194.234375 224.90625 177.207031 224.90625 Z M 177.207031 224.90625 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffa726" d="M 214.667969 163.695312 C 214.667969 167.457031 211.617188 170.496094 207.855469 170.496094 C 204.089844 170.496094 201.046875 167.457031 201.046875 163.695312 C 201.046875 159.9375 204.09375 156.894531 207.855469 156.894531 C 211.621094 156.894531 214.667969 159.9375 214.667969 163.695312 M 153.367188 163.695312 C 153.367188 159.9375 150.316406 156.894531 146.558594 156.894531 C 142.789062 156.894531 139.746094 159.9375 139.746094 163.695312 C 139.746094 167.457031 142.789062 170.496094 146.558594 170.496094 C 150.320312 170.496094 153.367188 167.457031 153.367188 163.695312 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffb74d" d="M 207.855469 143.292969 C 207.855469 117.328125 146.558594 126.386719 146.558594 143.292969 L 146.558594 167.097656 C 146.558594 184 160.273438 197.703125 177.207031 197.703125 C 194.136719 197.703125 207.855469 184 207.855469 167.097656 Z M 207.855469 143.292969 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#4166661430)"><path fill="#424242" d="M 177.207031 112.6875 C 156.519531 112.6875 143.152344 129.4375 143.152344 150.09375 L 143.152344 157.867188 L 149.960938 163.695312 L 149.960938 146.691406 L 190.828125 133.089844 L 204.449219 146.691406 L 204.449219 163.695312 L 211.261719 157.773438 L 211.261719 150.09375 C 211.261719 136.40625 207.726562 122.835938 190.828125 119.488281 L 187.421875 112.6875 Z M 177.207031 112.6875 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#784719" d="M 187.421875 163.695312 C 187.421875 161.820312 188.949219 160.296875 190.828125 160.296875 C 192.707031 160.296875 194.234375 161.820312 194.234375 163.695312 C 194.234375 165.570312 192.707031 167.097656 190.828125 167.097656 C 188.949219 167.097656 187.421875 165.570312 187.421875 163.695312 M 160.179688 163.695312 C 160.179688 165.570312 161.703125 167.097656 163.585938 167.097656 C 165.464844 167.097656 166.992188 165.570312 166.992188 163.695312 C 166.992188 161.820312 165.464844 160.296875 163.585938 160.296875 C 161.703125 160.296875 160.179688 161.820312 160.179688 163.695312 " fill-opacity="1" fill-rule="nonzero"/><path fill="#01579b" d="M 177.207031 224.90625 C 194.234375 224.90625 200.175781 211.542969 200.875 206.449219 C 196.9375 205.007812 194.234375 204.503906 194.234375 204.503906 C 194.234375 204.503906 190.828125 218.105469 177.207031 218.105469 C 163.585938 218.105469 160.179688 204.503906 160.179688 204.503906 C 160.179688 204.503906 157.472656 204.996094 153.53125 206.425781 C 154.226562 211.511719 160.179688 224.90625 177.207031 224.90625 Z M 177.207031 224.90625 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#10087e61db)"><path fill="#e57373" d="M 251.03125 198.179688 L 241.429688 188.597656 C 239.96875 187.136719 237.59375 187.136719 236.132812 188.597656 L 231.609375 193.113281 L 246.511719 207.992188 L 251.03125 203.476562 C 252.492188 202.015625 252.492188 199.648438 251.03125 198.179688 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#ff9800" d="M 182.21875 242.433594 L 224.160156 200.550781 L 239.0625 215.433594 L 197.121094 257.3125 Z M 182.21875 242.433594 " fill-opacity="1" fill-rule="nonzero"/><path fill="#b0bec5" d="M 246.511719 207.984375 L 239.0625 215.425781 L 224.15625 200.542969 L 231.609375 193.101562 Z M 246.511719 207.984375 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#c208e4418c)"><path fill="#ffc107" d="M 182.222656 242.425781 L 177.207031 262.3125 L 197.121094 257.304688 Z M 182.222656 242.425781 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#f29d02a5d2)"><path fill="#37474f" d="M 179.742188 252.253906 L 177.207031 262.3125 L 187.273438 259.78125 Z M 179.742188 252.253906 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#01579b" d="M 177.207031 224.90625 C 194.234375 224.90625 200.175781 211.542969 200.875 206.449219 C 196.9375 205.007812 194.234375 204.503906 194.234375 204.503906 C 194.234375 204.503906 190.828125 218.105469 177.207031 218.105469 C 163.585938 218.105469 160.179688 204.503906 160.179688 204.503906 C 160.179688 204.503906 157.472656 204.996094 153.53125 206.425781 C 154.226562 211.511719 160.179688 224.90625 177.207031 224.90625 Z M 177.207031 224.90625 " fill-opacity="1" fill-rule="nonzero"/></svg></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('login'); ?>