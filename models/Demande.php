<?php
namespace App\Model;

use App\Core\Model;

class Demande extends Model{

    //attributs
    private int $id;
    private string $libelle;
    private string $etat;

    public function __construct(?string $libelle=null,?string $etat=null)
    {
        $this->libelle =$libelle;
        $this->etat = "en cours";
    }
    public static function table()
    {
        return parent::$table="demande";
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

    public function rp():object{
        $sql="select p.* from ".self::table()." d,personne 
        p where  p.id=d.rp_id
        and p.role like 'ROLE_RP'
        and p.id=?";
        return parent::findBy($sql,[8],true);
    }

    public function inscription():object{
        $sql="select i.* from ".self::table()." d,inscription 
        i where  i.id=d.inscription_id
        and i.id=?";
        return parent::findBy($sql,[2],true);
    }
    
    public static function findEtudiant(){
        $sql = "select distinct i.id 
                from demande d , inscription i, personne p
                where etudiant_id = ?";
        return parent::findBy($sql,[$_SESSION['user']->id]);
    }
    public function insertDemande($inscription):int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO ".self::table()." (`libelle`,`etat_demande`,`inscription_id`,`rp_id`) VALUES (?,?,?,?);";
        $result =  $db->executeUpdate($sql,[$this->libelle,$this->etat,$inscription,null]);
        $db->closeConnexion();
        return $result;
    }
    public static  function updateDemande($etat,$rp,$id){
        $sql = " UPDATE `demande` SET `etat_demande` = ?, `rp_id` = ? WHERE `demande`.`id` = ?";
        return parent::findBy($sql,[$etat,$rp,$id]);
    }

    public static function updateInscription($id){
        $sql="UPDATE `inscription` SET `etat_ins` = 'annule' WHERE `inscription`.`id` = ?";
        return parent::findBy($sql,[$id]);
    }
 
}