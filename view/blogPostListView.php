<?php $title = 'Liste des post de blog'; ?>

<?php ob_start(); ?>

<?php
while ($data = $blogPosts->fetch())
{
?>
<div>
    <h3>
        <?= htmlspecialchars($data['title']) ?>
    </h3>
    <p>
        <?= htmlspecialchars($data['header_content']) ?>
    </p>
    <p>Posté le <?= $data['creation_date'] ?></p>
    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Consulter l'article</a>
</div>
<?php
}
$blogPosts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>