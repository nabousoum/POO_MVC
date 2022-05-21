<?php
namespace App\Model;

use App\Core\Model;

class ClasseProfesseur extends Model{

    //attributs

    private int $id;
    private int $professeur_id;
    private int $classe_id;
    

    public function __construct(?int $classe_id=null,?int $prof_id=null){
        $this->classe_id = $classe_id;
        $this->prof_id = $prof_id; 
    }


    public static function table()
    {
        return parent::$table="prof_classe";
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

    /**
     * Get the value of classe_id
     */ 
    public function getClasse_id()
    {
        return $this->classe_id;
    }

    /**
     * Set the value of classe_id
     *
     * @return  self
     */ 
    public function setClasse_id($classe_id)
    {
        $this->classe_id = $classe_id;

        return $this;
    }

    //fonctions
      
    public function anneeScolaire():AnneeScolaire{
        $sql="select  a.* from ".self::table()." c,annee_scolaire 
         a where  a.id=c.annee_id
        and c.id=?";
         return parent::findBy($sql,[$this->id],true);
    }

    public function professeurs():array|null{
        $sql="select ...";
        $result = parent::findBy($sql,[$this->id]);
        return $result;
    }

    public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO prof_classe (`classe_id`,`prof_id`) VALUES (?,?);";
        $result =  $db->executeUpdate($sql,[$this->classe_id,$this->prof_id]);
        $db->closeConnexion();
        return $result;
    }
    
    public  static function filtreModule($module_idProf):array{
        $sql = "select m.* from personne p, module m, prof_module pm
                where p.id = pm.prof_id and
                m.id = pm.module_id
                and p.id = ?";
        return parent::findBy($sql,[$module_idProf]);
    } 
}