<?php

use App\Core\Router;
use App\Controller\ClasseController;
use App\Controller\ModuleController;
use App\Controller\DemandeController;
use App\Controller\PersonneController;
use App\Controller\SecurityController;
use App\Controller\ProfesseurController;
use App\Controller\InscriptionController;
use App\Exception\RouteNotFoundException;


$router = new Router;
$router->route('/login',[SecurityController::class,"authentification"]);
$router->route('/logout',[SecurityController::class,"deconnexion"]);
$router->route('/classes',[ClasseController::class,"listerClasse"]);
$router->route('/add-classe',[ClasseController::class,"creerClasse"]);
$router->route('/personnes',[PersonneController::class,"lister"]);
$router->route('/liste-prof',[ProfesseurController::class,"listerProf"]);
$router->route('/liste-insc',[InscriptionController::class,"lister"]);
$router->route('/liste-demande',[DemandeController::class,"lister"]);
$router->route('/liste-module',[ModuleController::class,"listerModule"]);
$router->route('/add-module',[ModuleController::class,"ajouterModule"]);
$router->route('/add-prof',[ProfesseurController::class,"ajouterProf"]);




try {
  $router->resolve();
} catch (RouteNotFoundException $ex) {
  echo $ex->message; 
}