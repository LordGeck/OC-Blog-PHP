<?php
declare(strict_types=1);
require_once 'model/BlogPostManager.php';
require_once 'model/CommentManager.php';

function adminPage(string $message = null, string $type = null): void
{
    $blogPostManager = new BlogPostManager();
    $blogPosts = $blogPostManager->getBlogPosts();

    $commentManager = new CommentManager();
    
    require 'view/adminView.php';
}
