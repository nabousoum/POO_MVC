<?php

namespace App\Core;

use App\Exception\RouteNotFoundException;

class Router{

    private Request $request;

    public function __construct(){
        $this->request = new Request;
    }
    

    private array $routes=[];

    public function route(string $uri,array $action){
        $this->routes[$uri]=$action;
    }

    public function resolve(){
        $uri = "/".$this->request->getUri()[0];
        //dd($uri);
        if (isset($this->routes[$uri])){
            dd("route existe");
        }
        else{
            throw new RouteNotFoundException();
        }
    }
}