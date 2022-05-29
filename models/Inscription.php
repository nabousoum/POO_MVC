<?php 

namespace App\Model;

use App\Core\Model;
use LDAP\Result;

class Inscription extends Model{

    //attributs
    private int $id;
    private string $etat;

    public static function table()
    {
        return parent::$table="inscription";
    }
   
    //getters and setters
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


    //fonctions
    public function __construct(?string $etat=null,?int $etudiant_id=null,?int $classe_id=null)
    {
        $this->etat = "en cours";
        $this->etudiant_id=$etudiant_id;
        $this->classe_id=$classe_id;

    }

   public function ac():object{
       $sql="select p.* from ".self::table()." i,personne 
                      p where  p.id=i.ac_id
                      and p.role like 'ROLE_AC'
                      and p.id=?";
        return parent::findBy($sql,[10],true);
   }
    //ManyToOne => AnneeScolaire
    public function anneeScolaire():object{
         $sql="select a.* from annee_scolaire a,inscription i 
                       where  a.id=i.annee_id
                      and a.id=?";
        return parent::findBy($sql,[2],true) ;
    }

    public function etudiant():object{
        $sql="select p.* from ".self::table()." i,personne 
        p where  p.id=i.etudiant_id
        and p.role like 'ROLE_ETUDIANT'
        and p.id=?";
        return parent::findBy($sql,[17],true);
    }

    public function classe():object{
        $sql="select c.* from ".self::table()." i,classe 
        c where  c.id=i.classe_id
        and c.id=?";
        return parent::findBy($sql,[2],true);
    }

    public static function demandes():array{
        $sql="select d.libelle,d.etat_demande from ".self::table()." i, demande  
            d ,personne p
             where i.id=d.inscription_id
             and p.id = i.etudiant_id
            and p.id=?";
        return parent::findBy($sql,[$_SESSION['user']->id]);
    }

    public static function demandeAll():array{
        $sql="select p.nom_complet,p.matricule,c.libelle,d.libelle as 'libelledemande',d.etat_demande from ".self::table()." i, demande  
            d ,personne p, classe c
             where  i.id=d.inscription_id
             and i.etudiant_id=p.id
             and i.classe_id=c.id";
        return parent::findBy($sql);
    }
    public static function demandeAllRP():array{
        $sql="select d.id,i.id as idIns,p.nom_complet,p.matricule,c.libelle,d.libelle as 'libelledemande',d.etat_demande from ".self::table()." i, demande  
            d ,personne p, classe c
             where  i.id=d.inscription_id
             and i.etudiant_id=p.id
             and i.classe_id=c.id
             and d.etat_demande like 'en cours'
             order by id desc";
        return parent::findBy($sql);
    }
    public static function demandeAnnule():array{
        $sql="select d.id, p.nom_complet,p.matricule,c.libelle,d.libelle as 'libelledemande',d.etat_demande from ".self::table()." i, demande  
            d ,personne p, classe c
             where  i.id=d.inscription_id
             and i.etudiant_id=p.id
             and i.classe_id=c.id
             and d.etat_demande like 'annule'
             order by d.id desc";
        return parent::findBy($sql);
    }
    public static function demandeValide():array{
        $sql="select d.id,p.nom_complet,p.matricule,c.libelle,d.libelle as 'libelledemande',d.etat_demande from ".self::table()." i, demande  
            d ,personne p, classe c
             where  i.id=d.inscription_id
             and i.etudiant_id=p.id
             and i.classe_id=c.id
             and d.etat_demande like 'valide' 
             order by d.id desc";
        return parent::findBy($sql);
    }


    public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO ".self::table()." (`etat_ins`,`ac_id`,`etudiant_id`,`classe_id`,`annee_id`) VALUES (?,?,?,?,?);";
        $result =  $db->executeUpdate($sql,[$this->etat,$_SESSION['user']->id,$this->etudiant_id,$this->classe_id,1]);
        $db->closeConnexion();
        return $result;
    }

    public static function findInscription(){
        $sql = "select p.id, i.id as 'idIns',p.adresse,i.etat_ins,p.nom_complet, p.matricule,p.sexe,c.libelle as 'libelleClasse',a.libelle
               from personne p, classe c, annee_scolaire a, inscription i
               where i.etudiant_id=p.id
               and i.classe_id=c.id
               and i.annee_id=a.id
               and p.role='ROLE_ETUDIANT'";
        return parent::findBy($sql);
    }

    public static function findEtat($etat){
        $sql="select d.libelle,d.etat_demande from ".self::table()." i, demande  
            d ,personne p
             where i.id=d.inscription_id
             and p.id = i.etudiant_id
            and p.id=? 
            and d.etat_demande like ?";
            return parent::findBy($sql,[$_SESSION['user']->id,$etat]);
    }

    public static function updateReinscription($id){
        $sql="UPDATE `inscription` SET `etat_ins` = 'termine' WHERE `inscription`.`id` = ?";
        return parent::findBy($sql,[$id]);
    }
}