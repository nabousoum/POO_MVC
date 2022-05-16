<?php 

namespace App\Model;

use App\Core\Database;

class AC extends User{

 
  public function __construct()
  {
      parent::$role="ROLE_AC";
  } 
  
  public static function role()
  {
      return self::$role='ROLE_AC';
  }
  public static function findAll():array{
    $sql="select * from ".parent::table()." where role  like '".self::role()."' ";
    return parent::findBy($sql);
  }

  public function insert():int{
    $db = self::database();
    $db->connexionBD();
    $sql="INSERT INTO `personne` (`nom_complet`,`sexe`,`login`,`password`,`role`) VALUES (?,?,?,?,?);";
    $result =  $db->executeUpdate($sql,[$this->nomComplet,$this->sexe,$this->login,$this->password,parent::$role]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }

  public function inscriptions():array{
    $sql="select i.* from ".parent::table()." p, inscription  
                   i where  p.id=i.ac_id
                   and p.role like 'ROLE_AC'
                   and p.id=?";
     return parent::findBy($sql,[10]);
  }

}