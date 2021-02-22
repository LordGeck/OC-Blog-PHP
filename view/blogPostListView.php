<?php $title = 'Liste des publications'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Blog</h1>
                    <span class="subheading">Liste des publications</span>
                    <br>
                    <?php 
                    if (isset($_SESSION['username']) && $_SESSION['role'] === 'ADMIN') {
                    ?>
                    <a class="btn btn-secondary" href="/index.php?page=addPost" role="button">Nouvelle publication</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            while ($data = $blogPosts->fetch())
            {
            ?>
            <div class="post-preview">
                <a href="index.php?page=post&amp;id=<?= $data['id'] ?>">
                    <h2 class="post-title">
                        <?= htmlspecialchars($data['title']) ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?= htmlspecialchars($data['header_content']) ?>
                    </h3>
                </a>
                <p class="post-meta">Publié le <?= htmlspecialchars($data['update_date']) ?>
            </div>
            <hr>
            <?php
            }
            $blogPosts->closeCursor();
            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>