<?php

namespace App\Controllers\PagesController;

use \PDO;

function dashboardAction(PDO $connexion)
{
    global $content, $title;
    $title = "Dashboard";
    ob_start();
    include '../app/views/pages/dashboard.php';
    $content = ob_get_clean();
}
