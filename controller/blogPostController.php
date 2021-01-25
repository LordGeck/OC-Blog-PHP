<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function blogPostList()
{
    $blogPostManager = new BlogPostManager();
    $blogPosts = $blogPostManager->getBlogPostList();

    require("view/blogPostListView.php");
}