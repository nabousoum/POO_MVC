<?php 

namespace App\Core;

interface IModel{
    //Abstraites
    //instances
       public function update(int $id):int;
       public function insert():int;
     //static
     public static function delete(int $id):int;
     public static function findAll():array;
     public static function findById(int $id):object|null;
     public  static function findBy(string $sql,array $data=[],$single=false):object|null|array;
   
}

//Methodes Static => Classe
/**
 * Classe::methode()
 * Classe::delete(1) //Delete from classe where id=1
 * Classe::findAll() //select * from classe
 * Classe::insert(["Classe1","niveau","filiere"])
 * insert into classe (libelle,niveau,filiere) values(classe1,niveau,filiere)
 */

//Methodes Instances=> Methodes Objet
//etat de Objet => valeurs de ses attributs
/**
 * $obj=new Classe()
 * $obj->setId(1)
 * $obj->setLibelle("classe 1")
 * $obj->update() 
 * //update from classe set libelle='classe 1' where id=1
 * 
 * $obj=new Classe()
 * $obj->setId(1)
 * $obj->delete()  //Delete from classe where id=1
 * 
 * 
 */