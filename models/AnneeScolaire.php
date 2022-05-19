<?php 

namespace App\Model;

use App\Core\Model;

class AnneeScolaire extends Model{

    //attributs

    private int $id;
    private string $libelle;
    private string $etat;

    public static function table()
    {
        return parent::$table="annee_scolaire";
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
     * Get the value of annee
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    // fonctions

      public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO ".self::table()." (`libelle`,`etat`) VALUES (?,?);";
        $result =  $db->executeUpdate($sql,[$this->libelle,$this->etat]);
        $db->closeConnexion();
        return $result;
      }

    public function inscriptions():array{
        $sql="select i.* from ".self::table()." a, inscription  
            i where  a.id=i.annee_id
            and a.id=?";
        return parent::findBy($sql,[1]);
    }

    public function classeProfesseurs():array{
        $sql="select i.* from ".self::table()." a, prof_classe  
            p where  a.id=p.annee_id
            and a.id=?";
        return parent::findBy($sql,[$this->id]);
    }
 
}