<?php $title = 'Acceuil'; ?>

<?php ob_start(); ?>

<header>
    <h1>Bienvenu sur le site de Hyacinthe Bres.</h1>
    <img src="" alt="Photo"></img>
    <h2>Développeur PHP.</h2>
</header>

<!-- content -->

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>