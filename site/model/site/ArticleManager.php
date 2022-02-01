<?php
namespace model\site;
use PDO;
class ArticleManager {

/*************** CREATION D'UN ARTICLE ***************/		
	public function CreateArticle(Article $article) {
		$cnx = $this->Connexion();
		$sql = 'INSERT INTO article
			   (titre,article,description,keywords) VALUES (:titre,:article,:description,:keywords)';
		$rs_createArticle = $cnx->prepare($sql);
		$rs_createArticle->bindValue(':titre', $article->getTitre(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':article', $article->getArticle(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
		$rs_createArticle->bindValue(':keywords', $article->getKeywords(), PDO::PARAM_STR);	
		$rs_createArticle->execute();
	}
/*************** CREATION D'UN ARTICLE ***************/	

	public function getMsgCreateArticle() {
		$msg = '<p><i>* Tous les champs sont obligatoires</i></p>';
		return $msg;
	}

	public function getMsgErreurCreateArticle() {
		$msg = '<p class="red">Merci de remplir tous les champs</p>';
		return $msg;
	}

	public function getMsgSuccesCreateArticle() {
		$msg = '<p class="green">Félicitations : Le nouvel article a bien été inséré !</p>';
		return $msg;
	}

/*****************************************************/


/*************** AFFICHER L'ARTICLE DEMANDE ***************/	
	public function ReadArticle($artID) {
		$cnx = $this->Connexion();
		$sql = 'SELECT * FROM article
				WHERE artID = :artID';
		$rs_readArticle = $cnx->prepare($sql);	
		$rs_readArticle->bindValue(':artID', $artID, PDO::PARAM_INT);
		$rs_readArticle->execute();
		$data = $rs_readArticle->fetch(PDO::FETCH_ASSOC);
		
		$article = new Article();
		$article->setTitre($data['titre']);
		$article->setArticle($data['article']);
		$article->setDescription($data['description']);
		$article->setKeywords($data['keywords']);
		
		return $article;
	}
/*************** AFFICHER L'ARTICLE DEMANDE ***************/
/**********************************************************/


/*************** AFFICHER TOUS LES ARTICLES ***************/	
	public function ReadAllArticle() {
		$cnx = $this->Connexion();
		$rs_readAllArticle = $cnx->prepare('SELECT * FROM article');
		$rs_readAllArticle->execute();
		
		while($data = $rs_readAllArticle->fetch(PDO::FETCH_ASSOC)) {
			$article = new Article();
			$article->setArtID($data['artID']);
			$article->setTitre($data['titre']);
			$article->setArticle($data['article']);
			$articles[] = $article;
		}
		return $articles;
	}
/*************** AFFICHER TOUS LES ARTICLES ***************/
/**********************************************************/


/*************** MODIFICATION D'UN ARTICLE ***************/	
	public function UpdateArticle(Article $article) {
		$cnx = $this->Connexion();
		$sql = 'UPDATE article SET titre = :titre, article = :article, description = :description, keywords = :keywords
			    WHERE artID = :artID';
		$rs_updateArticle = $cnx->prepare($sql);
		$rs_updateArticle->bindValue(':artID', $article->getArtID(), PDO::PARAM_INT);
		$rs_updateArticle->bindValue(':titre', $article->getTitre(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':article', $article->getArticle(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':description', $article->getDescription(), PDO::PARAM_STR);
		$rs_updateArticle->bindValue(':keywords', $article->getKeywords(), PDO::PARAM_STR);	
		
		$rs_updateArticle->execute();
	}
/*************** MODIFICATION D'UN ARTICLE ***************/	

	public function getMsgSuccesUpdateArticle() {
		$msg = '<p class="green">Félicitations : Le nouvel article a bien été modifié !</p>';
		return $msg;
	}

/*********************************************************/	


/*************** SUPPRESSION D'UN ARTICLE ***************/	
	public function DeleteArticle(Article $article) {
		$cnx = $this->Connexion();
		$sql = 'DELETE FROM article
				WHERE artID = :artID';
		$rs_deleteArticle = $cnx->prepare($sql);
		$rs_deleteArticle->bindValue(':artID', $article->getArtID(), PDO::PARAM_INT);
		$rs_deleteArticle->execute();		
	}
/*************** SUPPRESSION D'UN ARTICLE ***************/
	public function getMsgSuccesDeleteArticle() {
		$msg = '<p class="green">Félicitations : L\'article a bien été supprimé !</p>';
		return $msg;
	}
/********************************************************/


/*************** CONNEXION A LA BDD ***************/	
	private function Connexion() {
		$cnx = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', ''.CNX_LOGIN.'', ''.CNX_PASS.'');
		return $cnx;
	}
/*************** CONNEXION A LA BDD ***************/
/**************************************************/	
}