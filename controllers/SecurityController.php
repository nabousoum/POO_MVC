<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;
use App\Core\Role;

class SecurityController extends Controller{


    public function authentification(){
        if($this->request->isGet()){
            $test = 0;
            $this->layout = "connexion";
            $this->render('security/login.html.php',$data=[
                "test"=>$test
            ]);
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
                $this->redirectToRoute('liste-etu');
               }
               elseif(Role::isEtudiant()){
                $this->redirectToRoute('liste-demande');
               }
              // $this->render('personne/accueil.html.php');
            }
            else{
                $this->layout = "connexion";
                $test=1;
                $this->render('security/login.html.php',$data=[
                    "user_connect"=>$user_connect,
                    "test"=>$test
                ]);
            }
        }
    }

    public function deconnexion(){
        session_destroy();
        $this->redirectToRoute('login');
        exit();
       
    }
    public function error(){
        $this->layout = "connexion";
        $this->render('errors/pageErreur.html.php');
    }
}