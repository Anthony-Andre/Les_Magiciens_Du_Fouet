<?php
if(isset($_SESSION['pseudo'])) {
	$pseudo = $_SESSION['pseudo'];
} else {
	header('location: admin.html');
}
?>
<article>
	<h1>Créer un article</h1>
    <div class="box">
		<?= $message; ?>
        <form method="post" action="">
        	<b>Article :</b>
            <p><input type="text" name="titre" placeholder="Titre" /></p>
            <p><textarea name="article" placeholder="Article"></textarea></p>
            <b>Meta :</b>
            <p><textarea name="description" placeholder="Description"></textarea></p>
            <p><input type="text" name="keywords" placeholder="Keywords" /></p>
            <p><input id="soumission" type="submit" value="Créer l'article" /></p>
        </form>
    </div>
</article>