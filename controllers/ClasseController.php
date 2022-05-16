<?php
namespace App\Controller;

use App\Core\Controller;
use App\Model\Classe;
use Digia\InstanceFactory\InstanceFactory;

class ClasseController extends Controller{
    public function listerClasse(){
        dd("je suis dans le controller classe dans l action lister classe");
    }

    public function creerClasse(){
        if($this->request->isGet()){
            $this->render('classe/creer.html.php');
        }
        if($this->request->isPost()){
            $classe = $this->instance(Classe::class,$_POST);
            $classe->insert();
        }
    }

}