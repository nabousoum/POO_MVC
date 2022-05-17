<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;
use App\Core\Role;
use App\Model\Inscription;

class DemandeController extends Controller{

    public function lister(){
        if($this->request->isGet()){
            if(!Role::isEtudiant()){
                $this->redirectToRoute('login');
            }
            else{
              
                //dd($data);
               $data = Inscription::demandes($this->session->getSession('user')->id);
                //$data = $this->session->getSession('user')->nom_complet;
                //dd($data);
                $this->render('demande/liste.html.php',$data);
            }
        }
        if($this->request->isPost()){
          
        }
    }
}