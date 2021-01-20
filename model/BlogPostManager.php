<?php
declare(strict_types=1);
require_once("model/Manager.php");

class BlogPostManager extends Manager
{
    public function getBlogPostList()
    {
        return $this->database->query('SELECT id, title, status, creation_date, update_date, header_content FROM blog_posts');

    }

    public function getBlogPost(int $blogPostId)
    {
        $request = $this->database->prepare('SELECT id, title, status, creation_date, update_date, header_content, main_content FROM blog_posts WHERE id = ?');
        $request->execute([$blogPostId]);

        return $request;
    }
}