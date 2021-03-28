<?php $title = 'Acceuil'; ?>

<?php ob_start(); ?>

<header class="masthead" style="">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <img src="public/img/photo.jpg" class="col-lg-6 col-md-8 col-sm-7 img-fluid photo" alt="Photo">
                    <h1>Hyacinthe Bres</h1>
                    <span class="subheading">Développeur d'applications PHP</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php require 'message.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a href="https://drive.google.com/file/d/1PzBgUxw2GWNgOGE-2ssFYtass3l12DCL/view" target="_blank">
                <h3 class="text-center">Mon CV</h3>
                <img src="public/img/HB_CV.jpg" class="col-lg-4 col-md-6 img-thumbnail mx-auto d-block" alt="CV">
            </a>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="text-center">Me contacter :</h2>
            <form action="index.php?action=sendMail" method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom" name="name">
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
                        <label>Message</label>
                        <textarea class="form-control" placeholder="Message" name="message"></textarea>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>