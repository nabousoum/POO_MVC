<?php 

namespace App\Model;

use App\Core\Model;

class Module extends Model{

    //attributs 
    private int $id;
    private string $libelle;


    public function __construct(?string $libelle=null)
    {
        $this->libelle = $libelle;
    }

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
        $sql="INSERT INTO ".self::table()." (`libelle`,`rp_id`) VALUES (?,?);";
        $result =  $db->executeUpdate($sql,[$this->libelle,$_SESSION['user']->id]);
        $db->closeConnexion();
        echo $sql;
        return $result;
    }

}