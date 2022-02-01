<?php
namespace controller\site;
use classe;
use model\site as ms;

class Accueil {
/*************** AFFICHER TOUS LES ARTICLES ***************/		
	public function AfficherAccueil() {
		
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle();
		
		$view = new classe\View('site', 'accueil', 'Accueil', 'Je suis la desc de l\'accueil', 'clé 1, clé 2');
		$view->AfficherVue(array('articles'=>$articles));
	}
/*************** AFFICHER TOUS LES ARTICLES ***************/
/**********************************************************/


/*************** AFFICHER UN ARTICLE ***************/	
	public function AfficherArticle() {
		
		$manager = new ms\ArticleManager();
		$article = $manager->ReadArticle($_GET['artID']);
		
		$view = new classe\View('site', 'voir-article', $article->getTitre(), $article->getDescription(), $article->getKeywords());
		$view->AfficherVue(array('article'=>$article));
	}
/*************** AFFICHER UN ARTICLE ***************/
/***************************************************/			
}