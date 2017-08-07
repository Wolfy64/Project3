<?php $title ='Jean Forteroche\'s Blog'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue: <?= $msgError ?>></p>
<?php $contents = ob_get_clean(); ?>

<?php require_once('Views/Template/layout.php');