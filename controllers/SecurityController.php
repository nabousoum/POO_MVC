<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;
use App\Core\Role;

class SecurityController extends Controller{


    public function authentification(){
        if($this->request->isGet()){
            $this->render('security/login.html.php');
        }
        if($this->request->isPost()){
           $user_connect = User::findUserByLoginAndPassword($_POST["login"],$_POST["password"]); 
           if ($user_connect != NULL){
               $this->session->setSession('user',$user_connect);
              // dd($this->session->getSession('user')->role);
               if(Role::isRP()){
                    dd('page rp');
               }
               elseif(Role::isAC()){
                   dd('page ac');
               }
               elseif(Role::isEtudiant()){
                   dd('page etudiant');
               }
               $this->render('personne/accueil.html.php');
            }
            else{
                dd('erreur');
            }
        }
    }

    public function deconnexion(){
        session_destroy();
        $this->redirectToRoute('login');
        exit();
       
    }
}