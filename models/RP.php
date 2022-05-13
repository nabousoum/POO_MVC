<?php 
namespace App\Model;
use App\Model\User;

class RP extends User{
    public function __construct()
    {
        self::$role="ROLE_RP";
    } 

    public static function findAll():array{
        $sql="select * from ".parent::table()." where role  like 'ROLE_RP' ";
        return parent::findBy($sql);
      }
}