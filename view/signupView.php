<?php session_start(); ?>

<?php $title = 'Enregistrement'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>S'eregistrer sur le site</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="index.php?action=signup" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Nom d'utilisateur</label>
                            <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Adresse email</label>
                            <input type="email" class="form-control" placeholder="Adresse email" name="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Prénom</label>
                            <input type="text" class="form-control" placeholder="Prénom" name="first_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Nom de famille</label>
                            <input type="text" class="form-control" placeholder="Nom de famille" name="last_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password_1">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Confirmer mot de passe</label>
                            <input type="password" class="form-control" placeholder="Confirmer mot de passe" name="password_2">
                        </div>
                    </div>                    
                    <br>
                    <button type="submit" class="btn btn-primary">S'enregistrer</button>
                </form>
            </div>
        </div>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>