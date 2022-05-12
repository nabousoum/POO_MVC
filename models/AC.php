<?php 

namespace App\Model;

use App\Core\Database;

class AC extends User{

   public function inscriptions():array{
       return [];
   }
  public function __construct()
  {
      parent::$role="ROLE_AC";
      $this->inscriptions=[];
  } 
  
  public static function findAll():array{
    $db = self::database();
    $db->connexionBD();
    $sql="select * from ".parent::table()." where role  like 'ROLE_AC' ";
    $results = $db->executeSelect($sql);
    return $results;
  }

  public function insert():int{
    $db = self::database();
    $db->connexionBD();
    $sql="INSERT INTO `personne` (`nom_complet`, `role`) VALUES (?,?);";
    $result =  $db->executeUpdate($sql,[$this->nomComplet,parent::$role]);
    $db->closeConnexion();
    echo $sql;
    return $result;
  }
  
}