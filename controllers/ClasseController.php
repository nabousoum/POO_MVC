<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\Classe;
use App\Core\Controller;
use App\Model\Inscription;
use Digia\InstanceFactory\InstanceFactory;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

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
        if($this->request->isGet()){
            $id =$this->request->query();
            //$id = intval($id);
            $id = $id[0];
            $tabId = explode("=",$id);
            $id = intVal($tabId[1]);
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
            //dd($classe->libelle);
            $this->render('classe/edit.html.php',$data=[
                'id'=>$id,
                'classe'=>$classe
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