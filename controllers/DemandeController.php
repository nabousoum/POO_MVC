<?php
namespace App\Controller;

use App\Core\Role;
use App\Model\User;
use App\Model\Demande;
use App\Core\Controller;
use App\Model\Inscription;

class DemandeController extends Controller{

    public function lister(){
        if($this->request->isGet()){
            if(!Role::isEtudiant()){
                $this->redirectToRoute('login');
            }
            else{
              
                //dd($data);
               $demandes = Inscription::demandes();
                //$data = $this->session->getSession('user')->nom_complet;
                //dd($data);
                $this->render('demande/liste.html.php',$data=[
                    "demandes"=>$demandes
                ]);
            }
        }
        if($this->request->isPost()){
          
        }
    }
    public function listerAll(){
        if($this->request->isGet()){
            if(!Role::isAC()){
                $this->redirectToRoute('login');
            }
            else{
               $demandes = Inscription::demandeAll();
                $this->render('demande/listeAll.html.php',$data=[
                    "demandes"=>$demandes
                ]);
            }
        }
        if($this->request->isPost()){
          
        }
    }
    public function listerAllRP(){
        if($this->request->isGet()){
            if(!Role::isRP()){
                $this->redirectToRoute('login');
            }
            else{
               $demandes = Inscription::demandeAllRP();
               $demandesValide = Inscription::demandeValide();
               $demandesAnnule = Inscription::demandeAnnule();
                $this->render('demande/listeAllRP.html.php',$data=[
                    "demandes"=>$demandes,
                    "demandesValide"=>$demandesValide,
                    "demandesAnnule"=>$demandesAnnule
                ]);
            }
        }
        if($this->request->isPost()){
            $id =(int) $_POST['id'];
            //dd($id);
            Demande::updateDemande("annule",$_SESSION['user']->id,$id);
            $this->redirectToRoute('liste-all-demandeR');
        }
    }
    public function creer(){
        if($this->request->isGet()){
            if(!Role::isEtudiant()){
                $this->redirectToRoute('login');
            }
            else{
                $this->render('demande/creer.html.php');
            }
        }
        if($this->request->isPost()){
            $inscription = Demande::findEtudiant();
            $inscription = (int)$inscription[0]->id;
            $demande = $this->instance(Demande::class,$_POST);
            $demande->insertDemande($inscription);
            $this->redirectToRoute('add-demande');
        }
    }
}