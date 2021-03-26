<?php
declare(strict_types=1);
require_once 'model/BlogPostManager.php';
require_once 'model/CommentManager.php';

function addComment(string $content, string $blogPostId, string $username): void
{
    $commentManager = new CommentManager();
    $commentManager->addPostComment($content, (int)$blogPostId, $username);
    blogPost('Commentaire ajouté et en attente de validation.', 'success');
}

function validateComment(string $commentId): void
{
    $commentManager = new CommentManager();
    $commentManager->setCommentStatus((int)$commentId, 'PUBLISHED');
    adminPage('Commentaire validé.', 'success');
}
