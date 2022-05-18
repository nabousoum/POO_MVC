<?php

namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;
use App\Model\Professeur;

class ProfesseurController extends Controller{
    public function affecterClasse(){
        
    }
    public function listerProf(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $profs = Professeur::findAll();
                //dd($data[0]->id);
                $this->render('professeur/listerProf.html.php',$data=[
                    "profs"=>$profs
                ]);
            }
        }
        if($this->request->isPost()){
            
        }
       
    }
}