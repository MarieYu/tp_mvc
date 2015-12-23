<?php 
namespace Imie\Controllers;

use Imie\Models\ProgramDAO;
use Imie\Models\ProgramDTO;
use Imie\Models\DirectorDAO;
use Imie\Models\DirectorDTO;


class ProgramController extends Controller{

	//show all programs in view indexProgram
	public function indexProgAction(){
		$dao = new ProgramDAO();
		$programs = $dao->findAll();
		
		$this->render('indexProgram', array(
			'programs' => $programs
			));
	}

	public function insertAction(){
		if(isset($_POST['programName'],$_POST['duration'],$_POST['directorId'],$_POST['typeId'])){ 
      $_POST['programName'] = strip_tags($_POST['programName']);
      $_POST['duration'] = strip_tags($_POST['duration']);
      $_POST['directorId'] = strip_tags($_POST['directorId']);
      $_POST['typeId'] = strip_tags($_POST['typeId']);

      
      $dto = new ProgramDTO();
      $dao = new ProgramDAO();

      $dto->hydrate($_POST);
      $dao->insert($dto);
    }
    header('Location: index.php?ctrl=program&act=index');
  }

    //show insert form for typing new program
  public function formAction(){

  	$dir = new DirectorDAO();
		$directors = $dir->findAll();

    $this->render('insertProgram', array(
      //'action' => 'insert',
      'program' => new ProgramDTO(),
      'directors' => $directors
      )
    );
  }

  // show update form
  public function modFormAction(){
    $prog = false;
    if(isset($_GET['id'])){
      $dao = new ProgramDAO();
      $prog = $dao->find((int)$_GET['id']);
    }
    //program exists so show view form
    if($prog){
      $this->render('insertProgram', array(
        'program' => $prog
        )
      );
    }
    // Nothing to show, redirect
    else{
      header('Location: index.php?ctrl=program&act=index');
    }
  }

  // process input or update form
  public function processAction(){
  	
    if(isset($_POST['programName'],$_POST['duration'],$_POST['directorId'])){
      $_POST['directorId'] = (int)$_POST['directorId'];
      $_POST['programName'] = strip_tags($_POST['programName']);
      $_POST['duration']  = strip_tags($_POST['duration']);

      $dto = new ProgramDTO();
      $dao = new ProgramDAO();

      $dto->hydrate($_POST);

      // id = -1 if you come from the insert form
      if(-1 == $_POST['id']){

        $dao->insert($dto);

      }
      else{
        $dao->update($dto);
      }
    }
    header('Location: index.php?ctrl=program&act=indexProg');
  }



}

