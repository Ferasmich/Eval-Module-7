<?php 

namespace App\Utils ; 

use PDO ;
use Exception ; 

class Bdd {
    private $connexion ;
    private static $instance = null;
    private function __construct()
    {
        // essayer de faire ce qui est écrit dans les { } du try 
        // si tout est ok pas de soucis 
        // si erreur qui entraine ne bandeau orange dans l'écran
        // afficher un message personnalisé dans le catch(){} 
        try{
            $params = parse_ini_file(__DIR__ ."/../param.ini");
            $dsn="mysql://host={$params["BDD_HOST"]};dbname={$params["BDD_NAME"]};charset=utf8";
            $login = $params["BDD_LOGIN"];
            $password = $params["BDD_PASSWORD"]; 
            $this->connexion = new PDO($dsn , $login , $password);
        }catch( Exception $e ){
            echo "erreur 500 pb lors de la connexion à la bdd" . $e->getMessage();
            die();
        }
    }
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Bdd();
        }
        return self::$instance->connexion ; 
    }
}