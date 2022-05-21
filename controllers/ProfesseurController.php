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
                $this->render('professeur/creerProf.html.php',$data=[
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
            $this->render('professeur/creerProf.html.php',$data=[
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
                $profs = Professeur::findAll();
                $modules = Module::findAll();
                //dd($data[0]->id);
                //$filtreProfs = ModuleProfesseur::filtreProf(1);
                $this->render('professeur/listerProf.html.php',$data=[
                    "profs"=>$profs,
                    "modules" => $modules
                ]);
            }
        }
        if($this->request->isPost()){
            $profs = Professeur::findAll();
            $modules = Module::findAll();
            //dd($data[0]->id);
            $filtreProfs = ModuleProfesseur::filtreProf($_POST['filtreProf']);
            $this->render('professeur/listerProf.html.php',$data=[
                "filtreProfs" => $filtreProfs,
                "profs"=>$profs,
                "modules" => $modules
            ]);
        }
       
    }
}