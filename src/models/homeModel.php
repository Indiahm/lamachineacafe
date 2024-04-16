<?php

require_once '/Applications/MAMP/htdocs/lamachineacafe/src/config/database.php';

function listBeanMachines()
{
    $db = getDatabaseInstance();
    $sql = 'SELECT NomProduit, DescriptionProduit, Prix, Modele, ImageProduit, CodeEAN, Origine, Poids, Watts, Dimensions FROM lamachineacafe WHERE IdCategorie = 1';
    $query = $db->prepare($sql);
    $query->execute();

    $beansMachines = $query->fetchAll();
    return $beansMachines;
}
