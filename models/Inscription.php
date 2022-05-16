<?php 

namespace App\Model;

use App\Core\Model;

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
    public function __construct()
    {

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

    public function demandes():array{
        $sql="select d.* from ".self::table()." i, demande  
            d where  i.id=d.inscription_id
            and i.id=?";
        return parent::findBy($sql,[2]);
    }

    public function insert():int{
        $db = self::database();
        $db->connexionBD();
        $sql="INSERT INTO ".self::table()." (`etat_ins`,`ac_id`,`etudiant_id`,`classe_id`,`annee_id`) VALUES (?,?,?,?,?);";
        $result =  $db->executeUpdate($sql,[$this->etat,10,17,2,2]);
        $db->closeConnexion();
        echo $sql;
        return $result;
    }

    public static function findAll():array{
        $sql="select * from ".self::table();
        return parent::findBy($sql);
    }
}