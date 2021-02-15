<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function addBlogPostPage() : void
{
    require("view/addBlogPostView.php");
}

function addBlogPost(string $title, string $header_content, string $main_content, string $username) : void
{
    $blogPostManager = new BlogPostManager();
    $blogPostManager->addBlogPost($title, $header_content, $main_content, $username);
    header('Location: index.php');
}