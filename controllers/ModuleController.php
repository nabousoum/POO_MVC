<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Model\Module;
use App\Core\Controller;
use App\Model\Professeur;
use App\Model\ModuleProfesseur;
use Digia\InstanceFactory\InstanceFactory;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class ModuleController extends Controller{
    public function ajouterModule(){
        if($this->request->isPost()){
             
            $module = $this->instance(Module::class,$_POST);$validator = Validation::createValidator();
            $violations = $validator->validate($_POST['libelle'], [
                new NotBlank(),
            ]);
            if (0 !== count($violations)) {
                foreach ($violations as $violation) {
                    //dd($violation->getMessage());
                     $this->session->setSession('errors', $violation->getMessage());
                     $this->redirectToRoute('liste-module');
                }
            }
            else{
                $module->insert();
                $this->redirectToRoute('liste-module');
            }
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
                $this->render('module/liste.html.php',$data=[
                    "modules"=>$modules,
                    "profs" =>$profs
                ]);
            }
        }
        if($this->request->isPost()){
            $profs = Professeur::findAll();
            //$modules = Module::findAll();
            //dd($data[0]->id);
            $modules = ModuleProfesseur::filtreModule($_POST['filtreModule']);
            $this->render('module/liste.html.php',$data=[
                "modules" => $modules,
                "profs"=>$profs,
                "modules" => $modules
            ]);
        }
    }
}