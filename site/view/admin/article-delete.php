<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Supprimer l'article #<?= $_GET['artID']; ?></h1>
    <div class="box">
    <?php
	if(!isset($message)) {
	?>
		<p>Etes-vous certain de vouloir supprimer cet article ?</p>
        <form method="post" action="">
        <p><input type="submit" name="non" value="NON" /></p>
        <input type="hidden" name="artID" value="<?= $_GET['artID']; ?>" />
        <p><input type="submit" name="oui" value="OUI" /></p>
        </form>
        <hr />
        <p><?= $article->getTitre(); ?></p>
        <p><?= $article->getArticle(); ?></p>
    <?php
	} else { echo $message; } ?>
    </div>
</article>