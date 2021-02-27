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
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            if ($postComments->rowCount() > 0) {
                while ($data = $postComments->fetch())
                {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($data['firstname']) ?> <?= htmlspecialchars($data['lastname']) ?>.</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Le <?= htmlspecialchars($data['update_date']) ?></h6>
                    <p class="card-text"><?= htmlspecialchars($data['content']) ?></p>
                </div>
            </div>
            <?php
                }
                $postComments->closeCursor();
            }
            else {
            ?>
            <p class="text-muted">Aucun commentaire pour cet article.</p>
            <?php
            }
            ?>
            <br>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
            <a class="btn btn-primary text-center" href="#" role="button">Commenter</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>