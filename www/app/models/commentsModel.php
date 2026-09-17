<?php

namespace App\Models\CommentsModel;

use \PDO;

function findAllByPostId(PDO $connexion, int $postId): array
{
    $sql = "SELECT comments.*
            FROM comments
            WHERE comments.post_id = :postId
            ORDER BY comments.created_at DESC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':postId', $postId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
