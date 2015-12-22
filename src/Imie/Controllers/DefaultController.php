<?php
namespace Imie\Controllers;

class DefaultController extends Controller{

  // Show all persons
  public function indexAction(){

    // First argument : the view ;
    // Second argument : associative array. key is the name
    // of the variable, value is it's value
    $this->render('index', array(
      'target' => 'à définir'
    ));
  }

}











;
