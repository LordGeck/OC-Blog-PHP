<?php
declare(strict_types=1);
require_once 'model/Manager.php';

class CommentManager extends Manager
{
    public function getPostComments(int $blogPostId, string $status): object
    {
        $request = $this->database->prepare('SELECT id, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date, content, firstname, SUBSTRING(lastname, 1, 1) AS lastname FROM post_comments INNER JOIN users ON username = user_username WHERE blog_post_id = ? AND status = ? ORDER BY creation_date DESC');
        $request->execute([$blogPostId, $status]);

        return $request;
    }

    public function addPostComment(string $content, int $blogPostId, string $username): bool
    {
        $request = $this->database->prepare('INSERT INTO post_comments(content, creation_date, update_date, blog_post_id, user_username) VALUES(?, NOW(), NOW(), ?, ?)');

        return $request->execute([$content, $blogPostId, $username]);
    }

    public function setCommentStatus(int $commentId, string $status): bool
    {
        $request = $this->database->prepare('UPDATE post_comments SET status = ? WHERE id = ?');

        return $request->execute([$status, $commentId]);
    }
}