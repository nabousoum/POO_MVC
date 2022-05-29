<?php

namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Model\Module;
use App\Core\Constantes;
use App\Core\Controller;
use App\Model\Professeur;
use App\Model\ClasseProfesseur;
use App\Model\Etudiant;
use App\Model\ModuleProfesseur;

class ProfesseurController extends Controller{


    public function ajouterProf(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $classes = Classe::findAll();
                $modules = Module::findAll();
                $this->render('professeur/creer.html.php',$data=[
                    "classes"=>$classes,
                    "modules"=>$modules,
                    "titre"=>"Ajouter Professeur",
                    "action" => Constantes::WEB_ROOT."add-prof",
                ]);
            }
        }
        if($this->request->isPost()){

         
            $prof = $this->instance(Professeur::class,$_POST);
            $id_last_prof = $prof->insert();
            
            foreach($_POST['classe_id'] as $classe_id){
                $classe_prof = $this->instance(ClasseProfesseur::class,[
                    'classe_id' => $classe_id,
                    'prof_id' => $id_last_prof
                ]);
                $classe_prof->insert();
            }

            foreach($_POST['module_id'] as $module_id){
                $module_prof = $this->instance(ModuleProfesseur::class,[
                    'module_id' => $module_id,
                    'prof_id' => $id_last_prof
                ]);
                $module_prof->insert();
            }   
            $classes = Classe::findAll();
                $modules = Module::findAll();
            $this->render('professeur/creer.html.php',$data=[
                "classes"=>$classes,
                "modules"=>$modules
            ]);
        }
    }

    public function listerProf(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $currentPage = (int) ($_GET['page'] ?? 1);
                if($currentPage <= 0){
                   $currentPage = 1;
                } 
                $totalPages = count(Professeur::findAll());
               
                //dd($currentPage);
                $perPage = 5;
                $pages = ceil($totalPages / $perPage);
                if($currentPage > $pages || $currentPage<=0){
                    $currentPage = 1;
                } 
                $offset = $perPage * ($currentPage - 1);
                //$classes = Classe::findTest($offset);
                $profs = Professeur::findTest($offset);
                $modules = Module::findAll();
                //dd($data[0]->id);
                //$filtreProfs = ModuleProfesseur::filtreProf(1);
                $this->render('professeur/liste.html.php',$data=[
                    "profs"=>$profs,
                    "modules" => $modules,
                    "currentPage"=>$currentPage,
                    "pages" => $pages,
                    "Controller"=> Controller::class
                ]);
            }
        }
        if($this->request->isPost()){
            $profs = Professeur::findAll();
            $modules = Module::findAll();
            //dd($data[0]->id);
            $profs = ModuleProfesseur::filtreProf($_POST['filtreProf']);
            $this->render('professeur/liste.html.php',$data=[
                "modules" => $modules,
                "profs"=>$profs,
                "modules" => $modules
            ]);
        }
       
    }


    public function affecterClasse(){
        if($this->request->isGet()){
            $id =$this->request->query();
            $id = $id[0];
            $id= Controller::decode($id,Constantes::ENCODE_KEY());
            $tabId = explode("=",$id);
            $id = intVal($tabId[1]);
            $professeur = Professeur::findByIdP($id);
            $classes = Classe::findAll();
            $modules = Module::findAll();
            //dd($professeur[0]->id);
           $this->render('professeur/creer.html.php',$data=[
               "titre"=>"Affecter classes",
               "professeur"=>$professeur[0],
               "classes"=>$classes,
               "modules"=>$modules,
               "action" => Constantes::WEB_ROOT."add-prof".$professeur[0]->id,
           ]);
        }
        if($this->request->isPost()){
            $id=$_POST['idProf'];
            $id_last_prof = $id;
            
            foreach($_POST['classe_id'] as $classe_id){
                $classe_prof = $this->instance(ClasseProfesseur::class,[
                    'classe_id' => $classe_id,
                    'prof_id' => $id_last_prof
                ]);
                $classe_prof->insert();
            }

            foreach($_POST['module_id'] as $module_id){
                $module_prof = $this->instance(ModuleProfesseur::class,[
                    'module_id' => $module_id,
                    'prof_id' => $id_last_prof
                ]);
                $module_prof->insert();
            } 
            $this->redirectToRoute('liste-prof');
        }
    }
}