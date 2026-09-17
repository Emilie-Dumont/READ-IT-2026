<?php

namespace App\Models\TagsModel;

use \PDO;

function findAllByPostId(PDO $connexion, int $postId): array
{
    $sql = "SELECT tags.*
            FROM tags
            INNER JOIN posts_has_tags ON tags.id = posts_has_tags.tag_id
            WHERE posts_has_tags.post_id = :postId;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':postId', $postId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
function findAll(PDO $connexion): array
{
    $sql = "SELECT *
            FROM tags;";
    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
