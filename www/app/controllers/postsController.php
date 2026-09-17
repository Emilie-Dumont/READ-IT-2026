<?php

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;
use \App\Models\TagsModel;
use \App\Models\AuthorsModel;

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
    include_once '../app/models/authorsModel.php';
    include_once '../app/models/tagsModel.php';
    $post = PostsModel\findById($connexion, $id);
    $tags = TagsModel\findAllByPostId($connexion, $id);
    $author = AuthorsModel\findOneById($connexion, $post['author_id']);

    global $content, $title;
    $title = $post['title'];
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}
