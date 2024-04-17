<?php

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

// Movies
// $router->map('GET', '/', '/home', 'home');
$router->map('GET', '/recherche', 'search');
$router->map('GET', '/film/[slug:slug]','movies/detailsMovie', 'details');

// Pages
$router->map( 'GET', '/politique-confidentialite', 'privacy');
$router->map( 'GET', '/mentions-legales', 'legalNotice');