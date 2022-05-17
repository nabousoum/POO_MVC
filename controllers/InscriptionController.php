<?php
namespace App\Controller;

use App\Model\User;
use App\Core\Controller;
use App\Core\Role;
use App\Model\Inscription;

class InscriptionController extends Controller{

    public function lister(){
        if($this->request->isGet()){
            if(!Role::isAC()){
                $this->redirectToRoute('login');
            }
            else{
                $data = Inscription::findInscription();
                $this->render('inscription/liste.html.php',$data);
            }
        }
        if($this->request->isPost()){
            
        }
    }
}
