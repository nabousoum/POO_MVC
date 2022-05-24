<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;
use App\Core\Role;

class SecurityController extends Controller{


    public function authentification(){
        if($this->request->isGet()){
            $this->layout = "connexion";
            $this->render('security/login.html.php');
        }
        if($this->request->isPost()){
            
           $user_connect = User::findUserByLoginAndPassword($_POST["login"]);
           //dd($user_connect->password); 
           if ($user_connect != NULL && password_verify($_POST["password"],$user_connect->password)){
               $this->session->setSession('user',$user_connect);
              // dd($this->session->getSession('user')->role);
               if(Role::isRP()){
                  $this->redirectToRoute('liste-prof');
               }
               elseif(Role::isAC()){
                $this->redirectToRoute('liste-insc');
               }
               elseif(Role::isEtudiant()){
                $this->redirectToRoute('liste-demande');
               }
              // $this->render('personne/accueil.html.php');
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