<?php 

use App\Model\User;
//phpinfo();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require("../vendor/autoload.php");  
  require_once("../core/Fonctions.php");
  use App\Model\Professeur;
  use App\Model\AC;


  //$prof = new Professeur();
  //Professeur::delete(4 ); 

  //Professeur::findAll();
  // $profs = Professeur::findAll();

  // echo '<pre>';
  // var_dump($profs);
  // echo '</pre>';
  // echo "ok";
   //AC::findAll();
  // $test = User::findAll();
  //  echo '<pre>';
  // var_dump($test);
  //  echo '</pre>';

  $userConnect = User::findUserByLoginAndPassword("ac","ac");
  dd($userConnect);