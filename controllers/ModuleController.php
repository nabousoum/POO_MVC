<?php
namespace App\Controller;

use App\Core\Controller;
use App\Core\Role;
use App\Model\Classe;
use App\Model\Module;
use App\Model\Professeur;
use Digia\InstanceFactory\InstanceFactory;

class ModuleController extends Controller{
    public function ajouterModule(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $this->render('module/creer.html.php');
            }
        }
        if($this->request->isPost()){
            // $module = $this->instance(Module::class,$_POST);
            // $module->insert();
            // $this->render('module/creer.html.php');
        }
    }

    public function listerProf(){
        
    }

    public function listerModule(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
                $modules = Module::findAll();
                $profs = Professeur::findAll();
                $this->render('module/listeModule.html.php',$data=[
                    "modules"=>$modules,
                    "profs" =>$profs
                ]);
            }
        }
        if($this->request->isPost()){
            $module = $this->instance(Module::class,$_POST);
            $module->insert();
            $this->redirectToRoute('liste-module');
        }
    }
}