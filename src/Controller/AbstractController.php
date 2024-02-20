<?php 
namespace App\Controller ; 

class AbstractController{
    protected function render(string $template , array $data):void{
        global $router ; // va récupérer la variable $router qui a été créée dans le contexte global 
        require_once __DIR__ . "/../Vues/header.tpl.php";
        require_once __DIR__ . "/../Vues/$template.tpl.php";
        require_once __DIR__ . "/../Vues/footer.tpl.php";
    }
}