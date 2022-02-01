<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?= $titre; ?></title>
<link rel="stylesheet" href="<?= MEDIA; ?>/css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?= $description; ?>" />
<meta name="keywords" content="<?= $motcle; ?>" />
</head>

<body>

<div id="site">
	<header>
        <a href="#"><img src=" <?= MEDIA; ?>/img/Logo_Les_Magiciens_Du_Fouet.jpg" alt="logo robot patissier"></a>
        <h1>Les Magiciens Du Fouet</h1>
    </header>
    <nav>
    	<ul>
            <!-- <li class="titreAside">Nos Recettes :</li>
            <li><a href="#">Le chausson aux pommes</a></li>               
            <li><a href="#">Le croque-monsieur</a></li>               
            <li><a href="#">Les choux à la crème</a></li>               
            <li><a href="#">La tartiflette</a></li>  -->
            <li><a href="#">Nos chefs fouetteurs :</a></li>
            <li><a href="#">Jean-Pierre Coffre</a></li>             
            <li><a href="#">Maï Thé</a></li>             
            <li><a href="#">Ed Chebest</a></li>             
            <li><a href="#">Joël Dubouchon</a></li>             
            <li><a href="#">Yves CotesdePorc</a></li>             
        </ul>
    </nav>
    <?= $contenu; ?>
    <footer>
        <p><a href="#">Nous contacter</a></p>
        <p>MDF 2022 - Développement Anthony ANDRÉ</p>
    </footer>
</div> 

<script src="<?= MEDIA; ?>/jquery/jquery-3.4.1.min.js"></script>
<script src="<?= MEDIA; ?>/jquery/controle-formulaire.js"></script>
</body>
</html>   