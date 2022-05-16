<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;

class SecurityController extends Controller{


    public function authentification(){
        if($this->request->isGet()){
            $this->render('security/login.html.php');
        }
        if($this->request->isPost()){
           $user_connect = User::findUserByLoginAndPassword($_POST["login"],$_POST["password"]); 
           if ($user_connect != NULL){
               $this->session->setSession('user',$user_connect);
               //dd($$_SESSION);
               $this->render('personne/accueil.html.php');
            }
            else{
                dd('erreur');
            }
        }
    }

    public function deconnexion(){
       $this->redirectToRoute('login');
    }
}