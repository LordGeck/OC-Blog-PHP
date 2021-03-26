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
                    <span class="meta">
                        Publié par
                        <?= htmlspecialchars($blogPost['firstname']) ?>
                        <?= htmlspecialchars($blogPost['lastname']) . '.' ?>
                        le
                        <?= htmlspecialchars($blogPost['update_date']) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php require 'message.php'; ?>
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
<?php
if (isset($_SESSION['username']) && $_SESSION['role'] === 'ADMIN') {
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a class="btn btn-primary"
                href="index.php?page=editPost&amp;id=<?= $blogPost['id'] ?>" role="button">
                Modifier
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#postDelete">
                Supprimer
            </button>
            <div class="modal fade" id="postDelete" tabindex="-1"
                role="dialog" aria-labelledby="postDelete" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Voulez-vous vraiment supprimer l'article ?
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Non
                            </button>
                            <a class="btn btn-danger"
                                href="index.php?action=deletePost&amp;id=<?= $blogPost['id'] ?>" role="button">
                                Oui
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            if ($postComments->rowCount() > 0) {
                while ($data = $postComments->fetch()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= htmlspecialchars($data['firstname']) ?>
                        <?= htmlspecialchars($data['lastname']) . '.' ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Le
                        <?= htmlspecialchars($data['update_date']) ?>
                    </h6>
                    <p class="card-text">
                        <?= htmlspecialchars($data['content']) ?>
                    </p>
                </div>
            </div>
            <?php
                }
                $postComments->closeCursor();
            } else {
            ?>
            <p class="text-muted">Aucun commentaire pour cet article.</p>
            <?php
            }
            ?>
            <br>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
            <form action="index.php?action=addComment&amp;id=<?= $blogPost['id'] ?>" method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Commenter</label>
                        <textarea class="form-control" placeholder="Commenter" name="content"></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>