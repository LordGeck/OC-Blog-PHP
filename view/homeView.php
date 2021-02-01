<?php $title = 'Acceuil'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Hyacinthe Bres</h1>
                    <span class="subheading">Développeur PHP</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Content -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>