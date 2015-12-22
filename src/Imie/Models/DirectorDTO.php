<?php 
namespace Imie\Models;

class DirectorDTO{
	private $id = -1;
	private $directorName;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id=$id;
		return $this;
	}

	public function getDirectorName(){
		return $this->directorName;
	}

	public function setDirectorName($directorName){
		$this->directorName=$directorName;
		return $this;
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

}

