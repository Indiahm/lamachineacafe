<?php
define('SRC', __DIR__ . '/../');

require_once '/Applications/MAMP/htdocs/lamachineacafe/src/models/homeModel.php';

$beansMachines = listBeanMachines();
// var_dump($beansMachines);


require(SRC . 'views/homeView.php');
