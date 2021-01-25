<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function blogPostList()
{
    $blogPostManager = new BlogPostManager();
    $blogPosts = $blogPostManager->getBlogPosts();

    require("view/blogPostListView.php");
}