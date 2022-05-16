<?php 

namespace App\Model;

use App\Core\Model;

class ModuleProfesseur extends Model{

    //attributs
    private int $id;
    private int $module_id;
    private int $professeur_id;

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

    //fonctions

  
}
