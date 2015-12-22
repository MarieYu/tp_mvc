<?php
namespace Imie\Controllers;

use Imie\Models\DirectorDAO;
use Imie\Models\DirectorDTO;

class DirectorController extends Controller{

  //Show all directors
  public function indexDirAction(){
    $dao = new DirectorDAO();
    $directors = $dao->findAll();
    // First argument : the view ;
    // Second argument : associative array. key is the name
    // of the variable, value is it's value
    $this->render('indexDir', array(
      'directors' => $directors
    ));
  }

  //show insert form for typing new director
  public function formAction(){
    $this->render('insertDir', array(
      //'action' => 'insert',
      'director' => new DirectorDTO()
      )
    );
  }

  // show update form
  public function modFormAction(){
    $dir = false;
    if(isset($_GET['id'])){
      $dao = new DirectorDAO();
      $dir = $dao->find((int)$_GET['id']);
    }
    //director exists so show view form
    if($dir){
      $this->render('insertDir', array(
          'director' => $dir
        )
      );
    }
    // Nothing to show, redirect
    else{
      header('Location: index.php?ctrl=director&act=index');
    }
  }

  // process input or update form
  public function processAction(){
    if(isset($_POST['directorName'])){
      $_POST['id'] = (int)$_POST['id'];
      $_POST['directorName'] = strip_tags($_POST['directorName']);

      $dto = new DirectorDTO();
      $dao = new DirectorDAO();

      $dto->hydrate($_POST);
      // id = -1 if you come from the insert form
      if(-1 === $_POST['id']){
        $dao->insert($dto);
      }
      else{
        $dao->update($dto);
      }
    }
    header('Location: index.php?ctrl=director&act=index');
  }


  //Insert function on director
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


  //Delete function on director
  public function deleteAction(){
    if(isset($_GET['id'])){
      $dao = new DirectorDAO();
      $id = intval($_GET['id']);

      $dao->delete($id);
    }
    header('Location: index.php?ctrl=director&act=index');
  }

  //Update function on director
  // public function updateAction(){
  //   if(isset($_POST['id'],$_POST['directorName'])){
  //     $_POST['directorName'] = strip_tags($_POST['directorName']);
  //     $_POST['id'] = strip_tags($_POST['id']);

  //     $dto = new DirectorDTO();
  //     $dao = new DirectorDAO();

  //     $dto->hydrateSQL($_POST);
  //     $dao->update($dto);
  //   }
  //   header('Location:index.php?ctrl=director&act=insertDir');
  // }



}