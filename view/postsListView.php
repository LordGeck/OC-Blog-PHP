<?php $title = 'Liste des articles du blog'; ?>

<?php ob_start(); ?>

<h1>Test</h1>

<?php
while ($data = $postsList->fetch())
{
?>
    <div>
        <h3>
            <?= htmlspecialchars($data['title']) ?>
        </h3>
        <p>
            <?= htmlspecialchars($data['header_content']) ?>
        </p>
    </div>
<?php
}

$postsList->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>