<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Erreur : <?= htmlspecialchars($error) ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>