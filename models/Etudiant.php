<?php 

namespace App\Model;

class Etudiant extends User{

 private string $matricule;
 private string $adresse;


 public function __construct()
 {
    self::$role="ROLE_ETUDIANT";
 } 
 
 public static function role()
 {
     return self::$role='ROLE_ETUDIANT';
 }
 
 /**
  * Get the value of matricule
  */ 
 public function getMatricule()
 {
  return $this->matricule;
 }

 /**
  * Set the value of matricule
  *
  * @return  self
  */ 
 public function setMatricule($matricule)
 {
  $this->matricule = $matricule;

  return $this;
 }

 
 /**
  * Get the value of adresse
  */ 
    public function getAdresse()
    {
      return $this->adresse;
    }

    /**
      * Set the value of adresse
      *
      * @return  self
      */ 
    public function setAdresse($adresse)
    {
      $this->adresse = $adresse;

      return $this;
    }

    public static function findAll():array{
      $sql="select * from ".parent::table()." where role  like '".self::role()."' ";
      return parent::findBy($sql);
    }

    public function inscriptions():array{
      $sql="select i.* from ".parent::table()." p, inscription  
          i where  p.id=i.etudiant_id
          and p.id=?";
      return parent::findBy($sql,[17]);
  }
    public function insert():int{
      $db = self::database();
      $db->connexionBD();
      $sql="INSERT INTO ".parent::table()." (`nom_complet`,`sexe`,`login`,`password`,`matricule`,`role`,`adresse`) VALUES (?,?,?,?,?,?,?);";
      $result =  $db->executeUpdate($sql,[$this->nomComplet,$this->sexe,$this->login,$this->password,$this->matricule,parent::$role,$this->adresse]);
      $db->closeConnexion();
      echo $sql;
      return $result;
  }

}