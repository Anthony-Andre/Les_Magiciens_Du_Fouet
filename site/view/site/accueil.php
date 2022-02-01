<article>
	<h1>Accueil</h1>
    <ol>
    <?php
	foreach($articles as $article) {
	?>
    <li><a class="lien" href="voir-article_<?= $article->getartID(); ?>.html"><?= $article->getTitre(); ?></a></li>
    <?php
	}
	?>
    </ol>
</article>