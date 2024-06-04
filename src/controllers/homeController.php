<?php

// define('SRC', __DIR__ . '/../');

require_once '/Applications/MAMP/htdocs/lamachineacafe/src/models/homeModel.php';

$produits = getProduits();

require '/Applications/MAMP/htdocs/lamachineacafe/src/views/homeView.php';
