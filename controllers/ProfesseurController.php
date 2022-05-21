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
            $prof->insert();
            

            $id_last_prof = $prof->insert();

            $classe_prof = $this->instance(ClasseProfesseur::class,[
                'classe_id' =>$_POST['classe'],
                'prof_id' => $id_last_prof
            ]);
            $classe_prof->insert();

            $module_prof = $this->instance(ModuleProfesseur::class,[
                'module_id' =>$_POST['module'],
                'prof_id' => $id_last_prof
            ]);
            $classe_prof->insert();
            
            $this->render('professeur/creerProf.html.php');
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