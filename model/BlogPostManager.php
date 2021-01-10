<?php
require_once("model/Manager.php");

class BlogPostManager extends Manager
{
    public function getBlogPostList()
    {
        $database = $this->databaseConnect();
        $request = $database->query('SELECT id, title, status, creation_date, update_date, header_content FROM blog_posts');
        return $request;
    }

    public function getBlogPost($blogPostId)
    {
        $database = $this->databaseConnect();
        $request = $database->prepare('SELECT id, title, status, creation_date, update_date, header_content, main_content FROM blog_posts WHERE id = ?');
        $request->execute(array($blogPostId));
        return $request;
    }
}