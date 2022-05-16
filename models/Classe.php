<?php 

namespace App\Model;

use App\Core\Model;

class Classe extends Model{

    //attributs

    private int $id;
    private string $libelle;
    private string $filiere;
    private string $niveau;

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

    /**
     * Get the value of filiere
     */ 
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set the value of filiere
     *
     * @return  self
     */ 
    public function setFiliere($filiere)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get the value of niveau
     */ 
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set the value of niveau
     *
     * @return  self
     */ 
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    //fonctions

    public function __construct()
    {
        
    }
    public static function table()
    {
        return parent::$table="classe";
    }
    //Fonctions navigationnelles
//ManyToMany avec Professeur
  
    public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO ".self::table()." (`libelle`,`filiere`,`niveau`,`rp_id`) VALUES (?,?,?,?);";
        $result =  $db->executeUpdate($sql,[$this->libelle,$this->filiere,$this->niveau,8]);
        $db->closeConnexion();
        echo $sql;
        return $result;
    }

    public static function findAll():array{
        $sql="select * from ".self::table();
        return parent::findBy($sql);
    }

    public static function delete(int $id):int{
        $sql="delete from '".self::table()."' where id=$id";
        echo $sql;
      return 0;
    }
    public static function findById(int $id):object|null{
        $sql="select * from '".self::table()."' where id=$id";
        echo $sql;
      return null;
    }

    public function rp():object{
        $sql="select p.* from ".self::table()." c,personne 
            p where  p.id=c.rp_id
            and p.role like 'ROLE_RP'
            and p.id=?";
        return parent::findBy($sql,[8],true);
    }

    public function inscriptions():array{
        $sql="select i.* from ".self::table()." c, inscription  
            i where  c.id=i.classe_id
            and c.id=?";
        return parent::findBy($sql,[1]);
    }
}