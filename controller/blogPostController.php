<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function blogPostList()
{
    $blogPostManager = new BlogPostManager();
    $blogPosts = $blogPostManager->getBlogPosts();

    require("view/blogPostListView.php");
}

function blogPost()
{
    $blogPostManager = new BlogPostManager();
    $blogPost = $blogPostManager->getBlogPost((int)$_GET['id']);

    require("view/blogPostView.php");
}