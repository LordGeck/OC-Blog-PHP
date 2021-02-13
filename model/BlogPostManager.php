<?php
declare(strict_types=1);
require_once("model/Manager.php");

class BlogPostManager extends Manager
{
    public function getBlogPosts()
    {
        return $this->database->query('SELECT id, title, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date, header_content FROM blog_posts ORDER BY creation_date DESC');

    }

    public function getBlogPost(int $blogPostId)
    {
        $request = $this->database->prepare('SELECT id, title, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date, header_content, main_content, firstname, SUBSTRING(lastname, 1, 1) AS lastname FROM blog_posts INNER JOIN users ON username = user_username WHERE id = ?');
        $request->execute([$blogPostId]);

        return $request->fetch();
    }
}
