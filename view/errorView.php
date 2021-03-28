<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Le site a rencotré un problème.</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="alert alert-danger" role="alert">
                Erreur : <?= htmlspecialchars($error) ?>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>