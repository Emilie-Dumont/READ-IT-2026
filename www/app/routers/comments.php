<?php

use \App\Controllers\CommentsController;

include_once '../app/controllers/commentsController.php';

switch ($_GET['comments']):
    case 'add':
        CommentsController\storeAction($connexion, $_POST);
        break;
endswitch;
