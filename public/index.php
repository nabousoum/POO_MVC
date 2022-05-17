<?php

use App\Controller\SecurityController;
use App\Model\User;
use App\Core\Router;
use App\Core\Request;
use App\Exception\RouteNotFoundException;

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
  require("../vendor/autoload.php");  

  require_once("../core/Fonctions.php");

  require_once("../routes/Route.web.php");

 

/*    $request = new Request;
  dd($request->getUri());
    dd($request->isGet()); */


  use App\Model\Professeur;
  use App\Model\AC;
use App\Model\AnneeScolaire;
use App\Model\Classe;
use App\Model\Demande;
use App\Model\Etudiant;
use App\Model\Inscription;
use App\Model\Module;
use App\Model\RP;

    //$rp = new RP();
  // $rp->setNomComplet('mimi thiam');
  // $rp->setSexe('feminin');
  // $rp->setLogin('mimithiam');
  // $rp->setPassword('passer1233');
  // $rp->setGrade('ingenieur');
  // $rp->setAdresse('ouakam');
  // $rp->insert();

//dd($rp->demandes());
//dd(Professeur::findAll());
// $as = new AnneeScolaire();
// dd($as->inscriptions());
  // $prof = new Professeur();
  // Professeur::delete(6); 

  // Professeur::findAll();
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

  // $userConnect = User::findUserByLoginAndPassword("ac","ac");
  // dd($userConnect); 
