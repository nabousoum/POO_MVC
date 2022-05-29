<?php 

namespace App\Model;

class Etudiant extends User{

 private string $matricule;
 private string $adresse;
 //public string $password = "pinkie@cademy";

 //$db = self::database();

 public function genererMatricule()
 {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAleatoire = '';
    for ($i = 0; $i <10; $i++)
    {
      $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
    }
    return $chaineAleatoire;
 }

 public function genererLogin(){
      $chaine = str_replace(" ","",$this->nomComplet);
      $login = $chaine."@gmail.com";
      return $login;
 }
 public function __construct(?string $nomComplet=null, ?string $sexe=null, ?string $adresse=null)
 {
     self::$role="ROLE_ETUDIANT";
     $this->nomComplet = $nomComplet;
     $this->sexe  = $sexe;
     $this->adresse = $adresse;
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
      $result =  $db->executeUpdate($sql,[$this->nomComplet,$this->sexe,$this->genererLogin(),password_hash("pinkie@cademy", PASSWORD_BCRYPT),$this->genererMatricule(),parent::$role,$this->adresse]);
      $db->closeConnexion();
      return $result;
  }

    public static function findByIdP($id)
    {
        $sql="select p.*  from personne p 
        where p.id=?";
        return parent::findBy($sql,[$id]);
    }
    public static function findByIdIns($id)
    {
        $sql="select i.*  from inscription i 
        where etudiant_id=?";
        return parent::findBy($sql,[$id]);
    }
}