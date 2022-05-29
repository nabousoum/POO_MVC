<?php 
namespace App\Core;

class constantes{


    public const WEB_ROOT = "http://localhost:8000/";
    
    public static function ROOT(){
        return str_replace("public","",$_SERVER["DOCUMENT_ROOT"]);
    }
    public static function ENCODE_KEY(){
        return '~nu!j_EBK,:XE2e{kQ!bhuQ9j]%SlF]z3L^Qy.Q[Gn?NCe&lt;BBy&gt;^LHv~1P]nq~&amp;;';
    }
}