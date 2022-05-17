<?php

namespace App\Controller;

use App\Model\Professeur;
use App\Core\Controller;

class ProfesseurController extends Controller{
    public function affecterClasse(){
        
    }
    public function listerProf(){
        if($this->request->isGet()){
            $data = Professeur::findAll();
            $this->render('professeur/listerProf.html.php',$data);
        }
        if($this->request->isPost()){
            
        }
       
    }
}