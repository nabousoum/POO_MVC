<?php 

namespace App\Model;

use App\Core\Model;

class Module extends Model{

    //attributs 
    private int $id;
    private string $libelle;

    public static function table()
    {
        return parent::$table="module";
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
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    //fonctions
    public function rp():object{
        $sql="select p.* from ".self::table()." m,personne 
        p where  p.id=m.rp_id
        and p.role like 'ROLE_RP'
        and p.id=?";
        return parent::findBy($sql,[$this->id],true);
    }

    public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO ".self::table()." (`libelle`) VALUES (?);";
        $result =  $db->executeUpdate($sql,[$this->libelle]);
        $db->closeConnexion();
        echo $sql;
        return $result;
    }

    public static function findAll():array{
        $sql="select * from ".self::table();
        return parent::findBy($sql);
    }

}