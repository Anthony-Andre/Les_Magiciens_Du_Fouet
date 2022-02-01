<?php
namespace model\site;

class Article {
	private $artID;
	private $titre;
	private $article;
	private $description;
	private $keywords;
	
	public function getArtID() {
		return $this->artID;
	}
	public function getTitre() {
		return $this->titre;
	}
	public function getArticle() {
		return $this->article;
	}
	public function getDescription() {
		return $this->description;
	}
	public function getKeywords() {
		return $this->keywords;
	}
	
	public function setArtID($artID) {
		if($artID > 0) {
			$this->artID = $artID;
		}
	}
	public function setTitre($titre) {
		if(is_string($titre)) {
			$this->titre = $titre;
		}
	}
	public function setArticle($article) {
		if(is_string($article)) {
			$this->article = $article;
		}
	}
	public function setDescription($description) {
		if(is_string($description)) {
			$this->description = $description;
		}
	}
	public function setKeywords($keywords) {
		if(is_string($keywords)) {
			$this->keywords = $keywords;
		}
	}
}