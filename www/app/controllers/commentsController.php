<?php

namespace App\Controllers\CommentsController;

use \PDO;
use \App\Models\CommentsModel;

include_once '../app/models/commentsModel.php';

function storeAction(PDO $connexion, array $commentData)
{
    $postId = (int) $commentData['postId'];

    CommentsModel\insertOneByPostId($connexion, $commentData);

    header('location: ' . PUBLIC_BASE_URL . '?posts=show&id=' . $postId);
}
