<?php $title = htmlspecialchars($blogPost['title']); ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>
                        <?= htmlspecialchars($blogPost['title']) ?>
                    </h1>
                    <h2 class="subheading">
                        <?= htmlspecialchars($blogPost['header_content']) ?>
                    </h2>
                    <span class="meta">Publié par <?= htmlspecialchars($blogPost['firstname']) ?> <?= htmlspecialchars($blogPost['lastname']) ?>. le <?= htmlspecialchars($blogPost['update_date']) ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <?= htmlspecialchars($blogPost['main_content']) ?>
                </p>
            </div>
        </div>
    </div>
</article>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>