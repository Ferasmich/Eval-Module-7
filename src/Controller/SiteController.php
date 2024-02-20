<?php 
namespace App\Controller ;
use App\Model\Vehicle;
use App\Model\User ;
use App\Utils\Bdd;

class SiteController extends AbstractController{
    public function home() :void {
        $data = [];
        $vehicleModel =  new Vehicle();
        $data["vehicle"] = $vehicleModel->readAll();
        $data["h1"] = " The vehicle list ";
        $data["title"] = " Vehicle Data ";
        $this->render("home" , $data);
    }

    public function login() :void{
        $erreurs = [];
        if(!empty($_POST)){
            $email = htmlspecialchars(trim($_POST["email"]));
            $password = htmlspecialchars(trim($_POST["password"]));

            if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
                $erreurs[] = "email invalide"; 
            }

            if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)){
                $erreurs[] = "le password doit contenir 8 lettres avec au moins une majuscule et une minuscule et un chiffre ";
            }

            $userModel = new User(); 
            $userRecherche = $userModel->readOneByEmail($email);
            if($userRecherche === false ){
                $erreurs[] = "email saisit n'existe pas !!";
            }

            if($userRecherche && !password_verify( $password ,password_hash($userRecherche->getPassword(),PASSWORD_DEFAULT) )){
                $erreurs[] = "password n'est pas valide !!";
                // en général on met le même message pour le login et password 
                // identifiants invalides 
            }

            if(empty($erreurs)){
                
                $_SESSION["user"] = $userRecherche ; 
                
                global $router ;
                header("Location: " . $router->generate("admin_vehicle_new"));
            }
        }
        $data = [];
        $data["erreur"] = $erreurs ; 
        $data["h1"] = "Access Admin site ";
        $this->render("login" , $data);
    }

    public function logout()  :void{
        $_SESSION = [];
        session_destroy();
        global $router ;
        header("Location:" . $router->generate("login"));
    }
}