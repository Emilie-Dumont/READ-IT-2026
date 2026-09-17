<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion)
{
    $sql = "SELECT *
            FROM categories;";

    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
