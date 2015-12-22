<?php
namespace Imie\Controllers;

use Imie\Models\DirectorDAO;
use Imie\Models\DirectorDTO;

class DirectorController extends Controller{

  // Show all directors
  // public function indexAction(){
  //   $dao = new DirectorDAO();
  //   $directors = $dao->findAll();
  //   // First argument : the view ;
  //   // Second argument : associative array. key is the name
  //   // of the variable, value is it's value
  //   $this->render('index', array(
  //     'director' => $directors
  //   ));
  // }

  //redirection to insertDir.php for typing new director
  public function formAction(){
    $this->render('insertDir', array(
      'action' => 'insert',
      'director' => new DirectorDTO()
      )
    );

  }
  //
  public function insertAction(){
  	if(isset($_POST['directorName'])){
      $_POST['directorName'] = strip_tags($_POST['directorName']);

      $dto = new DirectorDTO();
      $dao = new DirectorDAO();

      $dto->hydrate($_POST);
      $dao->insert($dto);
    }
    header('Location: index.php?ctrl=director&act=index');
  }

}