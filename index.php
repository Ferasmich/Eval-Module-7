<?php 
session_start(); 


require_once __DIR__ . "/vendor/autoload.php"; 
require_once __DIR__ . "/src/Utils/Bdd.php";
require_once __DIR__ . "/src/Model/User.php";
require_once __DIR__ . "/src/Model/Vehicle.php";
require_once __DIR__ . "/src/Controller/AbstractController.php";
require_once __DIR__ . "/src/Controller/AdminController.php";
require_once __DIR__ . "/src/Controller/SiteController.php";
require_once __DIR__ . "/src/Controller/ErreurController.php";

$router = new AltoRouter(); 


$router->setBasePath($_SERVER['BASE_URI']); 

$router->map("GET", "/", [
    "class" => "\App\Controller\SiteController",
    "method" => "home"
] , "home");

$router->map("GET|POST", "/login", [
    "class" => "\App\Controller\SiteController",
    "method" => "login"
] , "login");

$router->map("GET", "/vehicle/[i:id]", [
    "class" => "\App\Controller\SiteController",
    "method" => "vehicle"
] , "vehicle");

$router->map("GET", "/user/[i:id]", [
    "class" => "\App\Controller\SiteController",
    "method" => "user"
] , "user");

$router->map("GET|POST", "/admin/vehicle/new", [
    "class" => "\App\Controller\AdminController",
    "method" => "vehicle_new"
] , "admin_vehicle_new");

$router->map("GET|POST", "/admin/user/new", [
    "class" => "\App\Controller\AdminController",
    "method" => "user_new"
] , "admin_user_new");

$router->map("GET|POST", "/admin/vehicle/manage", [
    "class" => "\App\Controller\AdminController",
    "method" => "manage_vehicle"
] , "admin_manage_vehicle");

$router->map("GET|POST", "/admin/user/manage", [
    "class" => "\App\Controller\AdminController",
    "method" => "manage_user"
] , "admin_manage_user");

$router->map("GET|POST" , "/admin/user/new", [
    "class" => "\App\Controller\AdminController",
    "method" => "open_user_page"
] , "open_user_page");

$router->map("GET|POST" , "/admin/vehicle/new", [
    "class" => "\App\Controller\AdminController",
    "method" => "open_vehicle_page"
] , "open_vehicle_page");

$router->map("GET|POST" , "/admin/vehicle/delete", [
    "class" => "\App\Controller\AdminController",
    "method" => "delete_vehicle"
] , "delete_vehicle");

$router->map("GET|POST" , "/admin/user/delete", [
    "class" => "\App\Controller\AdminController",
    "method" => "delete_user"
] , "delete_user");

// Vehicle Modify ( POST id ) => ( One user Data ) Update User tap - Admin
$router->map("GET|POST" , "/admin/vehicle/modify", [
    "class" => "\App\Controller\SiteController",
    "method" => "modify_vehicle"
] , "modify_vehicle");

// User Modify ( POST id ) => ( One user Data ) Update User tap - Admin
$router->map("GET|POST" , "/admin/user/modify", [
    "class" => "\App\Controller\SiteController",
    "method" => "modify_user"
] , "modify_user");

$router->map("GET|POST" , "/admin/vehicle/update", [
    "class" => "\App\Controller\AdminController",
    "method" => "update_vehicle"
] , "update_vehicle");

$router->map("GET|POST" , "/admin/user/update", [
    "class" => "\App\Controller\AdminController",
    "method" => "update_user"
] , "update_user");

$router->map("GET", "/logout", [
    "class" => "\App\Controller\SiteController",
    "method" => "logout"
] , "logout");

$match = $router->match(); 

//var_dump($match);

if($match){
    $class = $match["target"]["class"];
    $method = $match["target"]["method"];
    $p = new $class();
    $p->$method(); 

}else {
    $p = new App\Controller\ErreurController();
    $p->erreur404(); 
}


