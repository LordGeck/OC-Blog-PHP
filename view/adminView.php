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

<!-- Content -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>