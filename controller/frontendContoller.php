<?php
declare(strict_types=1);
require_once("model/BlogPostManager.php");

function home()
{
    require("view/homeView.php");
}

function postsList()
{
    $blogPostManager = new BlogPostManager();
    $postsList = $blogPostManager->getBlogPostList();

    require("view/postsListView.php");
}

function post()
{
    require("view/postView.php");
}
