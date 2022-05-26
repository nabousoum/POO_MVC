<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Core\Constantes;
use App\Core\Controller;
use App\Model\Inscription;
use Digia\InstanceFactory\InstanceFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

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
                $this->render('classe/creer.html.php',$data=[
                    'titre' => "AJOUTER CLASSE",
                    'action' => Constantes::WEB_ROOT."add-classe",
                ]);
            }
        }
        if($this->request->isPost()){
            $classe = $this->instance(Classe::class,$_POST);
            $validator = Validation::createValidator();
            $violations = $validator->validate($_POST['filiere'],[
                new NotBlank(),
            ]);
            if (0 !== count($violations)) {
                foreach ($violations as $violation) {
                    //dd($violation->getMessage());
                    $this->session->setSession('errors', $violation->getMessage());
                    $this->redirectToRoute('add-classe');
                }
            }
            else{
                $classe->insert();
                $this->render('classe/creer.html.php');
            }
        }
    }

    public function delete(){
        if($this->request->isPost()){
            $id =(int) $_POST['id'];
            Classe::delete($id);
            $this->redirectToRoute('classes');
        }
        if($this->request->isPost()){
            
        }
    }

    public function edit(){
        if($this->request->isGet()){
           $id =$this->request->query();
            $id = $id[0];
            $tabId = explode("=",$id);
            $id = intVal($tabId[1]);
            $classe = Classe::findByIdC($id);
            $this->render('classe/creer.html.php',$data=[
                'id'=>$id,
                'classe'=>$classe[0],
                'action' => Constantes::WEB_ROOT."edit-classe/".$classe[0]->id,
                'titre' => "MODIFIER CLASSE"
            ]);
        }
        if($this->request->isPost()){
            $id =$this->request->query();
            $id = $id[0];
            $tabId = explode("=",$id);
            $id = intVal($tabId[1]);
            $classe = $this->instance(Classe::class,$_POST);
            $classe->update($id);
            $this->redirectToRoute('classes');
        }
    }

}