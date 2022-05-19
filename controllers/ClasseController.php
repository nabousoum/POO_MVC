<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Core\Controller;
use App\Model\Inscription;
use Digia\InstanceFactory\InstanceFactory;

class ClasseController extends Controller{
    public function listerClasse(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $classes = Classe::findAll();
                //dd($data);
                $this->render('classe/liste.html.php',$data=[
                    "classes"=>$classes
                ]);
            }
        }
        if($this->request->isPost()){
          
        }
    }

    public function creerClasse(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $this->render('classe/creer.html.php');
            }
        }
        if($this->request->isPost()){
            $classe = $this->instance(Classe::class,$_POST);
            $classe->insert();
            $this->render('classe/creer.html.php');
        }
    }

}