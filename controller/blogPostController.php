<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function blogPostList() : void
{
    $blogPostManager = new BlogPostManager();
    $blogPosts = $blogPostManager->getBlogPosts();

    require("view/blogPostListView.php");
}

function blogPost() : void
{
    $blogPostManager = new BlogPostManager();
    $blogPost = $blogPostManager->getBlogPost((int)$_GET['id']);
    if ($blogPost) {
        require("view/blogPostView.php");
    }
    else {
        throw new Exception('Ce post n\'existe pas.');
    }
}