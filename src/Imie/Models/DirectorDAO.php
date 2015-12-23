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

		$dir->setDirectorId(intval($this->pdo->lastInsertId()));
		return $dir;
	}

	// update one DirectorDTO in database
  public function update(DirectorDTO $dir){
    // if id = -1, there is nothing to do
    if (-1 === $dir->getDirectorId()) return;

    $stmt = $this->pdo->prepare("UPDATE realisateur SET nom_realisateur = ? WHERE realisateur_id = ?;");

    $stmt->bindValue(1, $dir->getDirectorName());
    $stmt->bindValue(2, $dir->getDirectorId());
    $stmt->execute();
  }

  public function delete($id){
	  if (-1 === $id) return;

	  $stmt=$this->pdo->prepare("DELETE FROM realisateur WHERE realisateur_id=?;");

	  $stmt->bindValue(1, $id);
	  $stmt->execute(); 
	}

	// Find All directors in database, return an array of DirectorDTO
  public function findAll(){
    // we will return this array
    $directors = [];

    $stmt = $this->pdo->prepare('SELECT realisateur_id, nom_realisateur FROM realisateur ORDER BY nom_realisateur;');
    $stmt->execute();

    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($results as $res) {
      // new Director instance
      $dir = new DirectorDTO();
      $dir->hydrateSQL($res);

      $directors[] = $dir;
    }
    return $directors;
  }

  public function find($id){
  	$id = (int)$id;
  	$dir = false;

  	$stmt = $this->pdo->prepare("SELECT realisateur_id, nom_realisateur FROM realisateur WHERE realisateur_id=?;");
  	$stmt->bindValue(1, $id);
  	$stmt->execute(); 

  	$res = $stmt->fetch(PDO::FETCH_ASSOC);
  	
  	if ($res){
  		$dir = new DirectorDTO();
  		$dir->hydrateSQL($res);
  	}
  	return $dir;  	
  }




}