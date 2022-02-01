<?php
namespace controller\admin;
use classe;
use model\admin as ma;
use model\site as ms;
class Admin {

/****************** ACCES A LA ZONE ADMIN ******************/
	public function voirAdmin() {
		if( (empty($_POST['pseudo'])) || (empty($_POST['password'])) ) {
			$manager = new ma\MembreManager();
			$message = $manager->getMsg();
			$view = new classe\View('admin', 'admin', 'Admin', 'Je suis la desc de l\'admin', 'clé admin 1, clé admin 2');
			$view->AfficherVue(array('message'=>$message));
		} else {
			
			$manager = new ma\MembreManager();
			$membre = $manager->ReadMembre($_POST['pseudo'], $_POST['password']);
			
			if( ($membre->getPseudo() == $_POST['pseudo']) AND ($membre->getPassword() == $_POST['password']) ) {
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$this->AfficherTousLesArticles();

			} else {
				$manager = new ma\MembreManager();
				$message = $manager->getMsgErreur();
				$view = new classe\View('admin', 'admin', 'Admin', 'Je suis la desc de l\'admin', 'clé admin 1, clé admin 2');
				$view->AfficherVue(array('message'=>$message));
			}
		}
	}
/****************** ACCES A LA ZONE ADMIN ******************/
/***********************************************************/


/*************** CREATION D'UN ARTICLE ***************/
	public function CreerArticle() {
		if( (empty($_POST['titre'])) && (empty($_POST['article'])) && (empty($_POST['description'])) && (empty($_POST['keywords'])) ) {
			$manager = new ms\ArticleManager();
			$message = $manager->getMsgCreateArticle();

		} elseif( (empty($_POST['titre'])) || (empty($_POST['article'])) || (empty($_POST['description'])) || (empty($_POST['keywords'])) ) {
			$manager = new ms\ArticleManager();
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$article = new ms\Article();
			$article->setTitre($_POST['titre']);
			$article->setArticle($_POST['article']);
			$article->setDescription($_POST['description']);
			$article->setKeywords($_POST['keywords']);
			
			$manager = new ms\ArticleManager();
			$manager->CreateArticle($article);
			$message = $manager->getMsgSuccesCreateArticle();
		}
		
	    $view = new classe\View('admin', 'article-create', 'Créer un article', 'Créer un article', 'clé 1, clé 2');
		$view->AfficherVue(array('message'=>$message));
	}
/*************** CREATION D'UN ARTICLE ***************/
/*****************************************************/


/****************** ACCES ACCUEIL ADMIN ******************/
	public function AfficherTousLesArticles() {
		$manager = new ms\ArticleManager();
		$articles = $manager->ReadAllArticle();
		
		$view = new classe\View('admin', 'admin-acces', 'Zone Admin', 'Je suis la desc de la zone admin', 'clé zone admin 1, clé zone admin 2');
		$view->AfficherVue(array('pseudo' => $_SESSION['pseudo'],
										 'articles'=>$articles));
	}

/****************** ACCES ACCUEIL ADMIN ******************/
/*********************************************************/


/*************** MODIFICATION D'UN ARTICLE ***************/
	public function ModifierArticle() {
		$manager = new ms\ArticleManager();
		$article = $manager->ReadArticle($_GET['artID']);
		if( (empty($_POST['titre'])) && (empty($_POST['article'])) && (empty($_POST['description'])) && (empty($_POST['keywords'])) ) {
			$message = $manager->getMsgCreateArticle();
		} elseif( (empty($_POST['titre'])) || (empty($_POST['article'])) || (empty($_POST['description'])) || (empty($_POST['keywords'])) ) {
			$message = $manager->getMsgErreurCreateArticle();
		} else {
			$article = new ms\Article();
			$article->setArtID($_POST['artID']);
			$article->setTitre($_POST['titre']);
			$article->setArticle($_POST['article']);
			$article->setDescription($_POST['description']);
			$article->setKeywords($_POST['keywords']);
			
			$manager->UpdateArticle($article);
			
			$message = $manager->getMsgSuccesUpdateArticle();
		}
		
			$view = new classe\View('admin', 'article-update', 'Modifier un article', 'Modifier un article', 'clé 1, clé 2');
			$view->AfficherVue(array('message' =>$message,
									 'article' => $article));
	}
/*************** MODIFICATION D'UN ARTICLE ***************/
/*********************************************************/


/*************** SUPPRESSION D'UN ARTICLE ***************/
	public function SupprimerArticle() {
		if( (empty($_POST['oui'])) && (empty($_POST['non'])) ) {
			$manager = new ms\ArticleManager();
			$article = $manager->ReadArticle($_GET['artID']);
			
			$view = new classe\View('admin', 'article-delete', 'Supprimer un article', 'Supprimer un article', 'clé 1, clé 2');
			$view->AfficherVue(array('article' => $article));
		} elseif(isset($_POST['non'])) {
			$this->AfficherTousLesArticles();
		} elseif(isset($_POST['oui'])) {
			$article = new ms\Article();
			$article->setArtID($_POST['artID']);
			
			$manager = new ms\ArticleManager();
			$manager->DeleteArticle($article);
			$message = $manager->getMsgSuccesDeleteArticle();
			$view = new classe\View('admin', 'article-delete', 'Supprimer un article', 'Supprimer un article', 'clé 1, clé 2');
			$view->AfficherVue(array('article' => $article,
									 'message' => $message));
		}
	}
/*************** SUPPRESSION D'UN ARTICLE ***************/
/********************************************************/



	public function seDeconnecter() {
		$view = new classe\View('admin', 'deconnexion', 'Se déconnecter', 'Déconnexion de la zone admin', 'clé déconnecter 1, clé déconnecter 2');
		$view->AfficherVue();
	}
	
}