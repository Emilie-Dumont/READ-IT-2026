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

function insertOneByPostId(PDO $connexion, array $commentData): int
{
    $sql = "INSERT INTO comments (post_id, pseudo, content, created_at)
            VALUES (:postId, :pseudo, :content, NOW());";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':postId', $commentData['postId'], PDO::PARAM_INT);
    $rs->bindValue(':pseudo', $commentData['pseudo'], PDO::PARAM_STR);
    $rs->bindValue(':content', $commentData['content'], PDO::PARAM_STR);
    $rs->execute();
    return (int) $connexion->lastInsertId();
}
