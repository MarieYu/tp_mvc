<?php 
namespace Imie\Models;

use PDO;

class DirectorDAO{
	private $pdo;

	public function __construct(){
		$this->pdo = MyPdo::getPdo();
	}

	public function insert(DirectorDTO $dir){
		$stmt = $this->pdo->prepare("INSERT INTO realisateur(nom_realisateur) VALUES (?);");
		$stmt->bindValue(1,$dir->getDirectorName());
		$stmt->execute();

		$dir->setId(intval($this->pdo->lastInsertId()));
		return $dir;
	}

}