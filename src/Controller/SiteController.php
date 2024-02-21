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

    //Receive the Vehicle_ID for further modification from manage_vehicle
    public function modify_vehicle() :void {
        $data = [];
        $VehicleModel =  new Vehicle();
        $id = $_POST['vehicle_id'];
        $data["vehicle"] = $VehicleModel->readOne($id);
        $data["h1"] = " Modify Vehicle Data ";
        $data["title"] = "User Data";
        $data["vehicle_id"] = $id;
        $this->render("update_vehicle" , $data);

        global $router ;
        header("Location:" . $router->generate("manage_vehicle"));
    }

    //Receive the User_ID for further modification from manage_user
    public function modify_user() :void {
        $data = [];
        $userModel =  new User();
        $id = $_POST['user_id'];
        $data["user"] = $userModel->readOne($id);
        $data["h1"] = " Modify user Data ";
        $data["title"] = "User Data";
        $data["user_id"] = $id;
        $this->render("update_user" , $data);

        global $router ;
        header("Location:" . $router->generate("manage_user"));
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

            //if($userRecherche && !password_verify( $password ,password_hash($userRecherche->getPassword(),PASSWORD_DEFAULT) ))
            if($userRecherche && !password_verify( $password , $userRecherche->getPassword() ))
            {
                $erreurs[] = "password n'est pas valide !!";
                // en général on met le même message pour le login et password 
                // identifiants invalides 
            }

            if(empty($erreurs)){
                
                $_SESSION["user"] = $userRecherche ; 
                
                global $router ;
                header("Location: " . $router->generate("home"));
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