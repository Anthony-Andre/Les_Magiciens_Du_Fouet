<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Modifier un article</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
        	<b>Article :</b>
            <p><input type="text" name="titre" value="<?= $article->getTitre(); ?>" /></p>
            <p><textarea name="article"><?= $article->getArticle(); ?></textarea></p>
            <b>Meta :</b>
            <p><textarea name="description"><?= $article->getDescription(); ?></textarea></p>
            <p><input type="text" name="keywords" value="<?= $article->getKeywords(); ?>" /></p>
            <input type="hidden" name="artID" value="<?= $_GET['artID']; ?>" />
            <p><input id="soumission" type="submit" value="Modifier l'article" /></p>
        </form>
    </div>
</article>