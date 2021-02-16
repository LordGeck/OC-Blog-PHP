<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function addBlogPostPage(): void
{
    require("view/addBlogPostView.php");
}

function addBlogPost(string $title, string $headerContent, string $mainContent, string $username): void
{
    $blogPostManager = new BlogPostManager();
    $blogPostManager->addBlogPost($title, $headerContent, $mainContent, $username);
    header('Location: index.php');
}