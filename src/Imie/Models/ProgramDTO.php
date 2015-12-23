<?php 
namespace Imie\Models;

class ProgramDTO{
	private $programId = -1;
	private $directorId;
	private $typeId;
	private $duration;
	private $programName;


	public function setProgramId($programId){
		$this->programId=$programId;
		return $this;
	}

	public function getProgramId(){
		return $this->programId;
	}

	public function setDirectorId($directorId){
		$this->directorId=$directorId;
		return $this;
	}

	public function getDirectorId(){
		return $this->directorId;
	}

	public function setTypeId($typeId){
		$this->typeId=$typeId;
		return $this;
	}

	public function getTypeId(){
		return $this->typeId;
	}

	public function setDuration($duration){
		$this->duration=$duration;
		return $this;
	}

	public function getDuration(){
		return $this->duration;
	}

	public function setProgramName($programName){
		$this->programName=$programName;
		return $this;
	}

	public function getProgramName(){
		return $this->programName;
	}

	public function hydrate($donnees){
    foreach ($donnees as $key => $value){
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
    return $this;
  }

	
	public function hydrateSQL($res){
		$this->setProgramId($res['programme_id'])
				 ->setDirectorId($res['realisateur_id'])
				 ->setTypeId($res['type_id'])
				 ->setDuration($res['duree'])
				 ->setProgramName($res['nom_programme']);
		return $this;
	}

}
