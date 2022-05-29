<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;
use App\Core\Role;
use App\Model\Inscription;
use App\Model\Etudiant;

class EtudiantController extends Controller{

    public function lister(){
        if($this->request->isGet()){
            if(!Role::isAC()){
                $this->redirectToRoute('login');
            }
            else{
                // $etudiants = Etudiant::findAll();
                // $this->render('etudiant/liste.html.php',$data=[
                //     "etudiants"=>$etudiants
                // ]);
            }
        }
        if($this->request->isPost()){
        }
    }
}