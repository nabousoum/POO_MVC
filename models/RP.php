<?php 
namespace App\Model;
use App\Model\User;

class RP extends User{

    public function __construct()
    {
        self::$role="ROLE_RP";
    } 

    public static function role()
    {
        return self::$role='ROLE_RP';
    }

    public function professeurs():array{
        return [];
    }
    public function classes():array{
        $sql="select c.* from ".parent::table()." p, classe  
        c where  p.id=c.rp_id
        and p.id=?";
    return parent::findBy($sql,[14]);
    }

    public function demandes():array{
        $sql="select d.* from ".parent::table()." p, demande  
            d where  p.id=d.rp_id
            and p.id=?";
        return parent::findBy($sql,[8]);
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

}