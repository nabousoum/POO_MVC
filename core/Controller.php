<?php

namespace App\Core;
use App\Core\Role;
use App\Core\Request;

class Controller{

    protected string $layout = "base";
    protected Session $session;
    protected Request $request;
    public function __construct(Request $request){
        $this->request = $request;
        $this->session = new Session;
    }

    public function render(string $path, array $data=[] ){
        $data["Constantes"]=Constantes::class;
        $data["Role"]=Role::class;
       // $data["request"]=$this->request;
        ob_start();
        extract($data);
        require_once(Constantes::ROOT()."templates/".$path);
        $contents_for_views=ob_get_clean();
        require_once(Constantes::ROOT()."templates/layout/".$this->layout.".html.php");
    }

    public function redirectToRoute($uri){
        header("location:".Constantes::WEB_ROOT.$uri);
    }

    public function instance(string $class, array $data){
       return $classe = \Digia\InstanceFactory\InstanceFactory::fromProperties($class, $data);
    }

    public function paginer(string $classe){
        $currentPage = (int) ($_GET['page'] ?? 1);
        if($currentPage <= 0){
           $currentPage = 1;
        } 
        $totalPages = count($classe::findAll());
       
        //dd($currentPage);
        $perPage = 5;
        $pages = ceil($totalPages / $perPage);
        if($currentPage > $pages || $currentPage<=0){
            $currentPage = 1;
        } 
        $offset = $perPage * ($currentPage - 1);
        $classes = $classe::findTest($offset);
    }

    public  static function encode($string,$key) {
        $key = sha1($key);
        $strLen = strlen($string);
        $keyLen = strlen($key);
        $j = 0;
        $hash = '';
        for ($i = 0; $i < $strLen; $i++) {
          $ordStr = ord(substr($string,$i,1));
          if ($j == $keyLen) { $j = 0; }
          $ordKey = ord(substr($key,$j,1));
          $j++;
          $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
        }
        return $hash;
      }
      public static function decode($string,$key) {
        $key = sha1($key);
        $strLen = strlen($string);
        $keyLen = strlen($key);
        $j = 0;
        $hash = '';
        for ($i = 0; $i < $strLen; $i+=2) {
          $ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
          if ($j == $keyLen) { $j = 0; }
          $ordKey = ord(substr($key,$j,1));
          $j++;
          $hash .= chr($ordStr - $ordKey);
        }
        return $hash;
      }
}