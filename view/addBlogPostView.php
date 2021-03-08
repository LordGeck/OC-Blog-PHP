<?php $title = 'Nouvelle publication'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Nouvelle publication</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="index.php?action=addPost" method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Titre</label>
                        <input type="text" class="form-control" placeholder="Titre" name="title">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Chapô</label>
                        <textarea class="form-control" placeholder="Chapô" name="header_content"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Article</label>
                        <textarea class="form-control" placeholder="Article" name="main_content"></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Publier</button>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>