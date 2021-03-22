<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Se connecter au site</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<?php require 'message.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form action="index.php?action=login" method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nom d'utilisateur</label>
                        <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>