<?php 
namespace Imie\Models;

use PDO;

class ProgramDAO{
	private $pdo;

	public function __construct(){
		$this->pdo = MyPdo::getPdo();
	}

	public function insert(ProgramDTO $program){
		$stmt = $this->pdo->prepare("INSERT INTO programme (realisateur_id, type_id, duree, nom_programme)
			VALUES (?,?,?,?);");
		$stmt->bindValue(1,$program->getDirectorId());
		$stmt->bindValue(2,1, PDO::PARAM_INT);   /// provisoire, type_id=1 à enlever qd type_diffusion DAO/DTO réalisés
		$stmt->bindValue(3,$program->getDuration());
		$stmt->bindValue(4,$program->getProgramName());
		$stmt->execute();

		$program->setProgramId(intval($this->pdo->lastInsertId()));
		return $program;
	}

	public function findAll(){
		$programs = [];

		$stmt = $this->pdo->prepare("SELECT * FROM programme ORDER BY nom_programme;");
		$stmt->execute();

		$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($results as $res){
			$dto = new ProgramDTO();
			$dto->hydrateSQL($res);
			$programs[] = $dto;
		}
		return $programs;
	}

	public function find($id){
		$id = (int)$id;
		$prog = false;

		$stmt = $this->pdo->prepare("SELECT * FROM programme WHERE programme_id=?;");
		$stmt->bindValue(1, $id);
		$stmt->execute();

		$res = $stmt->fetch(\PDO::FETCH_ASSOC);

		if($res){
			$prog = new ProgramDTO();
			$prog->hydrateSQL($res);
		}
		return $prog;
	}

	// update one ProgramDTO in database
  public function update(ProgramDTO $prog){
    // if id = -1, there is nothing to do
    if (-1 === $prog->getProgramId()) return;

    $stmt = $this->pdo->prepare("UPDATE programme SET nom_programme = ?, duree = ?, realisateur_id = ?,type_id = ? WHERE programme_id = ?;");

    $stmt->bindValue(1, $prog->getProgramName());
    $stmt->bindValue(2,$prog->getDuration());
    $stmt->bindValue(3,$prog->getDirectorId());
    $stmt->bindValue(4,$prog->getTypeId());
    $stmt->bindValue(5, $prog->getProgramId());
    $stmt->execute();
  }

  public function delete($id){
	  if (-1 === $id) return;

	  $stmt=$this->pdo->prepare("DELETE FROM programme WHERE programme_id=?;");

	  $stmt->bindValue(1, $id);
	  $stmt->execute(); 
	}




}
