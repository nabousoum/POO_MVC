<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\User;
use App\Model\Classe;
use App\Model\Etudiant;
use App\Core\Constantes;
use App\Core\Controller;
use App\Model\Inscription;

class InscriptionController extends Controller{

    public function lister(){
        if($this->request->isGet()){
            if(!Role::isAC()){
                $this->redirectToRoute('login');
            }
            else{
                $etudiants = Inscription::findInscription();
                $this->render('etudiant/liste.html.php',$data=[
                    "etudiants"=>$etudiants,
                    "Controller"=>Controller::class
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
                    "titre" => "Inscrire etudiant",
                    "classes"=>$classes,
                    "action" => Constantes::WEB_ROOT."add-insc",
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

    public function reinscription(){
        if($this->request->isGet()){
            $id =$this->request->query();
            $id = $id[0];
            $id= Controller::decode($id,Constantes::ENCODE_KEY());
            $tabId = explode("=",$id);
            $id = intVal($tabId[1]);
            //dd($id);
            $inscription = Etudiant::findByIdP($id);
            $test = Etudiant::findByIdIns($inscription[0]->id);
            //dd($test);
            $classes = Classe::findAll();
            $this->render('inscription/creer.html.php',$data=[
                "titre" => "Reinscrire l'etudiant",
                "inscription"=>$inscription[0],
                "action" => Constantes::WEB_ROOT."add-insc".$inscription[0]->id,
                "classes"=>$classes,
                "test"=>$test[0]
            ]);
        }
        if($this->request->isPost()){
            $id =$this->request->query();
            $id = $id[0];
            $id= Controller::decode($id,Constantes::ENCODE_KEY());
            $tabId = explode("=",$id);
            $id = intVal($tabId[1]);
           
            $id_last_etu =$id;
            $inscription = $this->instance(Inscription::class,[
                'etudiant_id' =>$id_last_etu,
                'classe_id' => $_POST['classe_id']
            ]);
            $inscription->insert();
            $idIns = $_POST["idIns"];
           // dd($idIns);
            Inscription::updateReinscription($idIns);
            $this->redirectToRoute('liste-insc');
        }
    }
}
