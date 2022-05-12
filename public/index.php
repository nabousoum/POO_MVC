<?php

use App\Controller\SecurityController;
use App\Model\User;
use App\Core\Router;
use App\Core\Request;
use App\Exception\RouteNotFoundException;

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require("../vendor/autoload.php");  

  require_once("../core/Fonctions.php");

  $router = new Router;
  $router->route('/login',[SecurityController::class,"authentification"]);
  $router->route('/logout',[SecurityController::class,"deconnexion"]);
  $router->route('/classes',[ClasseController::class,"listerClasse"]);
  $router->route('/classes/add',[ClasseController::class,"creerClasse"]);


  try {
    $router->resolve();
  } catch (RouteNotFoundException $ex) {
    echo $ex->message; 
  }

 











/*    $request = new Request;
  dd($request->getUri());
    dd($request->isGet()); */






  /* use App\Model\Professeur;
  use App\Model\AC;


  $prof = new Professeur();
  Professeur::delete(6); 

  Professeur::findAll();
  $profs = Professeur::findAll();

  echo '<pre>';
  var_dump($profs);
  echo '</pre>';
  echo "ok";
   AC::findAll();
  $test = User::findAll();
   echo '<pre>';
  var_dump($test);
   echo '</pre>';

  $userConnect = User::findUserByLoginAndPassword("ac","ac");
  dd($userConnect); */
