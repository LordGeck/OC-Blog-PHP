<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getPostComments($blogPostId)
    {
        $database = $this->databaseConnect();
        $request = $database->prepare('SELECT id, status, creation_date, update_date, content, blog_post_id, user_username FROM post_comments WHERE blog_post_id = ?');
        $request->execute(array($blogPostId));
        return $request;
    }
}