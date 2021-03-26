<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Administration</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<?php require 'message.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2>Commentaires en attente de validation :</h2>
            <?php
            while ($post = $blogPosts->fetch()) {
                $postComments = $commentManager->getPostComments($post['id'], 'PENDING');
                if ($postComments->rowCount() > 0) {
            ?>
            <div class="post-preview">
                <a href="index.php?page=post&amp;id=<?= $post['id'] ?>">
                    <h2 class="post-title">
                        <?= htmlspecialchars($post['title']) ?>
                    </h2>
                </a>
            </div>
            <?php
                    while ($comment = $postComments->fetch()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= htmlspecialchars($comment['firstname']) ?>
                        <?= htmlspecialchars($comment['lastname']) ?>.
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Le <?= htmlspecialchars($comment['update_date']) ?>
                    </h6>
                    <p class="card-text"><?= htmlspecialchars($comment['content']) ?></p>
                    <a class="btn btn-secondary text-center" href="index.php?action=validateComment&amp;id=<?= $comment['id'] ?>" role="button">
                        Valider
                    </a>
                </div>
            </div>
            <?php
                    }
                    $postComments->closeCursor();
                }
            ?>
            <?php
            }
            $blogPosts->closeCursor();
            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>