<?php
declare(strict_types=1);
require_once('model/Manager.php');

class CommentManager extends Manager
{
    public function getPostComments(int $blogPostId): array
    {
        $request = $this->database->prepare('SELECT id, status, creation_date, update_date, content, blog_post_id, user_username FROM post_comments WHERE blog_post_id = ?');
        $request->execute([$blogPostId]);

        return $request;
    }
}