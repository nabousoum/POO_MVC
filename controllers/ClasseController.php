<?php
namespace App\Controller;

use App\Core\Controller;

class ClasseController extends Controller{
    public function listerClasse(){
        dd("je suis dans le controller classe dans l action lister classe");
    }

    public function creerClasse(){
        if($this->request->isGet()){
            $this->render('classe/creer.html.php');
        }
        if($this->request->isPost()){
          
      }
    }

}