<?php

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;
use \App\Models\TagsModel;

function indexAction(PDO $connexion)
{
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($connexion);

    global $content;
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}
function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/tagsModel.php';
    $post = PostsModel\findById($connexion, $id);
    $tags = TagsModel\findAllByPostId($connexion, $id);

    global $content;
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}
