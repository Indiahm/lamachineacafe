<?php

unset($_SESSION['user']);
alert('Vous êtes déconnecté.', 'success');
header('Location: ' . $router->generate('login'));
die;