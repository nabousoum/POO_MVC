<?php

namespace App\Controller;

use App\Core\Role;
use App\Model\Module;
use App\Core\Controller;
use App\Model\Classe;
use App\Model\ClasseProfesseur;
use App\Model\ModuleProfesseur;
use App\Model\Professeur;

class ProfesseurController extends Controller{

    public function affecterClasse(){
        
    }

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
                    "modules"=>$modules
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
                    "pages" => $pages
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
}