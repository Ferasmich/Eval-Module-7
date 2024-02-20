<?php 
namespace App\Controller;
use App\Model\Vehicle ;
use App\Model\User ; 

class AdminController  extends AbstractController{

    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            $data["h1"] = "Page d'erreur 403, vous devez vous connecter pour pouvoir accéder à cette page !";
            $this->render("403", $data); 
            die(); 
        }
    }

    public function vehicle_new(){

        $erreur = []; 
        $vehicleModel = new Vehicle();
        if(!empty($_POST)){
            // fonction sanitize => enlever les caractères injections 
            $name = htmlspecialchars(trim($_POST["name"]));
            $model = htmlspecialchars(trim($_POST["model"]));
            $description = htmlspecialchars(trim($_POST["description"]));
            // $image = trim($_POST["image"]);
            $image = filter_input(INPUT_POST , "image", FILTER_SANITIZE_URL );
            $dt_creation = trim($_POST["dt_creation"]);
            $on_sale = intval($_POST["on_sale"]); // Ensure it's an integer

            if(strlen($name ) < 3 || strlen($name) > 255){
                $erreur[] = "le nom doit contenir entre 3 et 255 lettres";
                // $erreur[] = $name;
            }

            if(strlen($model ) < 3 || strlen($model) > 255){
                $erreur[] = "le model doit contenir entre 3 et 255 lettres";
                // $erreur[] = $model;
            }

            if(strlen($description ) < 3 || strlen($description) > 65000){
                $erreur[] = "le description doit contenir entre 3 et 65000 lettres";
                // $erreur[] = $description;
            }   


            if($image !== "" && !filter_var($image, FILTER_VALIDATE_URL)){
                    $erreur[] = "url de l'image n'est pas valide";
                    // $erreur[] = $image;
            }

            if (strtotime($dt_creation) == false) {
                // $erreur[] = " the date is not valid ";
                $erreur[] = $dt_creation;

            }

            if ($on_sale < 0 || $on_sale > 1) { // The value is false (not available), The value is true (available)
                $erreur[] = "invalid input";
            }
            
            $vehicleModel->setName($name)
                         ->setModel($model)
                         ->setDescription($description)
                         ->setImage($image === "" ? null : $image  )
                         ->setOn_sale($on_sale)
                         ->setDtCreation($dt_creation);
            if(empty($erreur)){
                $vehicleModel->create();
                global $router ;
                // permet d'être redirigé vers la page d'accueil 
                // redirection http 
                header("Location:". $router->generate("home"));
            }
        }
        $data = [];
        $data["h1"] = " Create New Vehicle ";
        $data["title"] = " Create New Vehicle ";
        $data["erreur"] = $erreur;
        $data["vehicle"] = $vehicleModel ; 
        $this->render("vehicle_new", $data); 
    }

    public function user_new(){
        $erreur = [];
        if(!empty($_POST)){
            $email = htmlspecialchars(trim($_POST["email"]));
            $password = htmlspecialchars(trim($_POST["password"]));

            // série de tests 
            // email valide
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $erreur[] = "email invalide"; 
            }

            // password contient 8 lettres avec majuscule et minuscule et un chiffre 
            // regex (?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}
            if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)){
                $erreur[] = "le password doit contenir 8 lettres avec au moins une majuscule et une minuscule et un chiffre ";
            }
             // est ce que il n'y a pas déjà un projet user avec le mail saisi 
            $userModel = new User(); 
            if($userModel->isUnique($email) !== 0){
                $erreur[] = "le mail saisit est déjà utilisé, veuillez choisir une autre email"; 
            }
            
            $passwordHashed = password_hash($password ,  PASSWORD_BCRYPT );

            $userModel->setEmail($email)
                ->setPassword($passwordHashed)
                ->setPseudo("redacteur");
            // si il n'y a pas d'erreur 
            if(empty($erreur)){
                // create 
                $userModel->create();
                global $router ;
                header("Location:" . $router->generate("home"));
            }
        }
        $data = [];
        $data["h1"] = "créer un nouveau profil gestionnaire"; 
        $data["erreur"] = $erreur ; 
        $this->render("user_new" , $data); 
    }

    public function manage_vehicle() :void {
        $data = [];
        $vehicleModel =  new Vehicle();
        $data["vehicle"] = $vehicleModel->readAll();
        $data["h1"] = " The vehicle list ";
        $data["title"] = " Vehicle Data ";
        $this->render("manage_vehicle" , $data);
    }

    public function manage_user() :void {
        $data = [];
        $userModel =  new User();
        $data["user"] = $userModel->readAll();
        $data["h1"] = " The vehicle list ";
        $data["title"] = " User Data ";
        $this->render("manage_user" , $data);
    }

    public function delete_vehicle() :void {
        if (isset($_POST['vehicle_id'])) { 
            $deleteVehicle = new Vehicle(); 
            $id = $_POST['vehicle_id']; 
            $deleteVehicle->delete($id);
            global $router ;
            header("Location:" . $router->generate("home"));
        }
    }
    public function delete_user() :void {
        if (isset($_POST['user_id'])) { 
            $deleteUser = new User(); 
            $id = $_POST['user_id']; 
            $deleteUser->delete($id);
            global $router ;
            header("Location:" . $router->generate("home"));
        }
    }

    public function update_vehicle() :void {
        $data = [];
        $userModel =  new User();
        $data["user"] = $userModel->readAll();
        $data["h1"] = " Modify Vehicle Data ";
        $data["title"] = "vehicle Data";
        $this->render("update_user" , $data);

        global $router ;
        header("Location:" . $router->generate("manage_vehicle"));
    }
    public function update_user() :void {
        $data = [];
        $userModel =  new User();
        $data["user"] = $userModel->readAll();
        $data["h1"] = " Modify user Data ";
        $data["title"] = "User Data";
        $this->render("update_user" , $data);

        global $router ;
        header("Location:" . $router->generate("manage_user"));
    }
}







