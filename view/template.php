<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
    </head>
        
    <body>
        <nav>
            <a href="/index.php">Accueil</a>
            <a href="/index.php?page=postList">Liste des posts</a>
        </nav>
        <?= $content ?>
    </body>
</html>