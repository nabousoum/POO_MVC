<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\User;
use App\Model\Classe;
use App\Core\Controller;
use App\Model\Etudiant;
use App\Model\Inscription;

class InscriptionController extends Controller{

    public function lister(){
        if($this->request->isGet()){
            if(!Role::isAC()){
                $this->redirectToRoute('login');
            }
            else{
                $inscriptions = Inscription::findInscription();
                $this->render('inscription/liste.html.php',$data=[
                    "inscriptions"=>$inscriptions
                ]);
            }
        }
        if($this->request->isPost()){
            
            
        }
    }
    
    public function creer(){
        if($this->request->isGet()){
            if(!Role::isAC()){
                $this->redirectToRoute('login');
            }
            else{
                $classes = Classe::findAll();
                $this->render('inscription/creer.html.php',$data=[
                    "classes"=>$classes
                ]);
            }
        }
        if($this->request->isPost()){


            $etu = $this->instance(Etudiant::class,[
                'nomComplet' => $_POST['nomComplet'],
                'adresse' => $_POST['adresse'],
                'sexe' => $_POST['sexe']
            ]);
            $id_last_etu = $etu->insert();

            $inscription = $this->instance(Inscription::class,[
                'etudiant_id' =>$id_last_etu,
                'classe_id' => $_POST['classe_id']
            ]);
            $inscription->insert();
            $this->render('inscription/creer.html.php');

        }
    }
}
