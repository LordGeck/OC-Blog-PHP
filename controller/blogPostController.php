<?php
declare(strict_types=1);
require_once 'model/BlogPostManager.php';
require_once 'model/CommentManager.php';

function blogPostList(string $message = null, string $type = null): void
{
    $blogPostManager = new BlogPostManager();
    $blogPosts = $blogPostManager->getBlogPosts();

    require 'view/blogPostListView.php';
}

function blogPost(string $message = null, string $type = null): void
{
    $blogPostManager = new BlogPostManager();
    $blogPost = $blogPostManager->getBlogPost((int)$_GET['id']);
    if ($blogPost) {
        $commentManager = new CommentManager();
        $postComments = $commentManager->getPostComments((int)$_GET['id'], 'PUBLISHED');
        require 'view/blogPostView.php';
    }
    else {
        throw new Exception('Ce post n\'existe pas.');
    }
}

function addBlogPostPage(string $message = null, string $type = null): void
{
    require 'view/addBlogPostView.php' ;
}

function addBlogPost(string $title, string $headerContent, string $mainContent, string $username): void
{
    $blogPostManager = new BlogPostManager();
    $blogPostManager->addBlogPost($title, $headerContent, $mainContent, $username);
    blogPostList('Article créé avec succès', 'success');
}

function editBlogPostPage(string $message = null, string $type = null): void
{
    $blogPostManager = new BlogPostManager();
    $blogPost = $blogPostManager->getBlogPost((int)$_GET['id']);
    require 'view/editBlogPostView.php' ;
}

function editBlogPost(string $blogPostId, string $title, string $headerContent, string $mainContent): void
{
    $blogPostManager = new BlogPostManager();
    $blogPostManager->setBlogPost((int)$blogPostId, $title, $headerContent, $mainContent);
    blogPost('Article modifié avec succès', 'success');
}

function deleteBlogPost(string $blogPostId): void
{
    $commentManager = new CommentManager();
    $commentManager->deletePostComments((int)$blogPostId);
    $blogPostManager = new BlogPostManager();
    $blogPostManager->deleteBlogPost((int)$blogPostId);
    blogPostList('Article supprimé avec succès', 'success');
}
