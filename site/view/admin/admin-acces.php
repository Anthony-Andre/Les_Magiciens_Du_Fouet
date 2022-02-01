<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Admin <i>(Connecté :: <?= $pseudo; ?>)</i></h1>
    <p><b>Liste des articles</b></p>
    <ol>
    <?php
	foreach($articles as $article) {
	?>
    <li><?= $article->getTitre(); ?> [<a class="lien" href="modifier-article_<?= $article->getArtID(); ?>.html">Modifier</a>] [<a class="lien" href="supprimer-article_<?= $article->getArtID(); ?>.html">Supprimer</a>]</li>
    <?php
	}
	?>
    </ol>
</article>