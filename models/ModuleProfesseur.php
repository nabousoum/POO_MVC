<?php 

namespace App\Model;

use App\Core\Model;

class ModuleProfesseur extends Model{

    //attributs
    private int $id;
    private int $module_id;
    private int $professeur_id;

    public function __construct(?int $module_id=null,?int $prof_id=null){
        $this->module_id = $module_id;
        $this->prof_id = $prof_id; 
    }

    //getters and setters
      /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of module_id
     */ 
    public function getModule_id()
    {
        return $this->module_id;
    }

    /**
     * Set the value of module_id
     *
     * @return  self
     */ 
    public function setModule_id($module_id)
    {
        $this->module_id = $module_id;

        return $this;
    }

    /**
     * Get the value of professeur_id
     */ 
    public function getProfesseur_id()
    {
        return $this->professeur_id;
    }

    /**
     * Set the value of professeur_id
     *
     * @return  self
     */ 
    public function setProfesseur_id($professeur_id)
    {
        $this->professeur_id = $professeur_id;

        return $this;
    }
    public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO prof_module (`module_id`,`prof_id`) VALUES (?,?);";
        $result =  $db->executeUpdate($sql,[$this->module_id,$this->prof_id]);
        $db->closeConnexion();
        return $result;
    }

    //fonctions
    public  static function filtreProf($prof_idM):array{
        $sql = "select p.* from personne p, module m, prof_module pm
                where p.id = pm.prof_id and
                m.id = pm.module_id
                and m.id = ?";
        return parent::findBy($sql,[$prof_idM]);
    }    
}
