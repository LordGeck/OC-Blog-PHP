<?php
declare(strict_types=1);
require_once 'model/Manager.php';

class BlogPostManager extends Manager
{
    public function getBlogPosts(): object
    {
        return $this->database->query('SELECT id, title, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date, header_content FROM blog_posts ORDER BY creation_date DESC');

    }

    public function getBlogPost(int $blogPostId): array|false
    {
        $request = $this->database->prepare('SELECT id, title, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date, header_content, main_content, firstname, SUBSTRING(lastname, 1, 1) AS lastname FROM blog_posts INNER JOIN users ON username = user_username WHERE id = ?');
        $request->execute([$blogPostId]);

        return $request->fetch();
    }

    public function addBlogPost(string $title, string $headerContent, string $mainContent, string $username): bool
    {
        $request = $this->database->prepare('INSERT INTO blog_posts(title, creation_date, update_date, header_content, main_content, user_username) VALUES(?, NOW(), NOW(), ?, ?, ?)');

        return $request->execute([$title, $headerContent, $mainContent, $username]);
    }

    public function setBlogPost(int $blogPostId, string $title, string $headerContent, string $mainContent): bool
    {
        $request = $this->database->prepare('UPDATE blog_posts SET title = ? , update_date = NOW() , header_content = ? , main_content = ? WHERE id = ?');

        return $request->execute([$title, $headerContent, $mainContent, $blogPostId]);
    }
}
