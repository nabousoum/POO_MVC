<?php

use App\Core\Router;
use App\Controller\ClasseController;
use App\Controller\ModuleController;
use App\Controller\DemandeController;
use App\Controller\EtudiantController;
use App\Controller\PersonneController;
use App\Controller\SecurityController;
use App\Controller\ProfesseurController;
use App\Controller\InscriptionController;
use App\Exception\RouteNotFoundException;


$router = new Router;
$router->route('/',[SecurityController::class,"authentification"]);
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
$router->route('/liste-etu',[EtudiantController::class,"lister"]);
$router->route('/add-insc',[InscriptionController::class,"creer"]);
$router->route('/add-demande',[DemandeController::class,"creer"]);
$router->route('/liste-all-demande',[DemandeController::class,"listerAll"]);
$router->route('/liste-all-demandeR',[DemandeController::class,"listerAllRP"]);
$router->route('/delete-classe',[ClasseController::class,"delete"]);
$router->route('/edit-classe',[ClasseController::class,"edit"]);
$router->route('/page-error',[SecurityController::class,"error"]);









try {
  $router->resolve();
} catch (RouteNotFoundException $ex) {
  echo $ex->message; 
}