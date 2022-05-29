<?php 

  namespace App\Model;

use LDAP\Result;
use User;

  class Professeur extends Personne{

    private string $grade;
    
      public function __construct(?string $nomComplet=null, ?string $sexe=null, ?string $grade=null)
      {
          self::$role="ROLE_PROFESSEUR";
          $this->nomComplet = $nomComplet;
          $this->sexe  = $sexe;
          $this->grade = $grade;
      }
        
      public static function role()
      {
          return self::$role='ROLE_PROFESSEUR';
      }
          /**
     * Get the value of grade
     */ 
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */ 
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }
  //Fonctions navigationnelles
  //ManyToMany avec Classe
  public function classes():array{
      return [];
  }
  public static function table()
    {
        return self::$table='professeur';
    }

    public static function delete(int $id):int{
      $db = self::database();
      $db->connexionBD();
      $sql="delete from personne where id=?";
     $result = $db->executeUpdate($sql,[$id]);
     $db->closeConnexion();
     return $result;
  }

  public function insert():int{
    $db = self::database();
    $db->connexionBD();
    $sql="INSERT INTO `personne` (`nom_complet`,`sexe`,`grade`,`role`) VALUES (?,?,?,?);";
    $result =  $db->executeUpdate($sql,[$this->nomComplet,$this->sexe,$this->grade,parent::$role]);
    $db->closeConnexion();
    return $result;
    if($result == -1){
      echo 'error';
    }
    else{}
  }

   //fonctions
   public function rp():RP{
    return new RP();
   }
   public static function findTest(int $offset):array{
     
    $sql="select * from personne where role like 'ROLE_PROFESSEUR' order by id desc LIMIT 5 OFFSET $offset ";
    return self::findBy($sql);
  }
  public static function findByIdP($id)
  {
      $sql="select p.*  from personne p 
      where p.id=?";
      return parent::findBy($sql,[$id]);
  }

}