<?php 

namespace App\Model ;

use PDO ;
use App\Utils\Bdd ; 

class Vehicle{
    private int|null $id = null  ;
    private string $name = "";
    private string $model = "";
    private string|null $description = null;
    private string|null $image = null;
    private string|null  $date_creation = null; 
    private bool|null $on_sale = null;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of titre
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getUrlImg(){
        if($this->image === null){
            return "https://via.placeholder.com/400x200?text=no image";
        }
        return $this->image;
    }

    /**
     * Get the value of img
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of dt_creation
     */ 
    public function getDtCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of dt_creation
     *
     * @return  self
     */ 
    public function setDtCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    
    /**
     * Get the value of on_sale
     */ 
    public function getOn_sale()
    {
        return $this->on_sale;
    }

    /**
     * Set the value of on_sale
     *
     * @return  self
     */ 
    public function setOn_sale($on_sale)
    {
        $this->on_sale = $on_sale;

        return $this;
    }

    public function readAll(){
        $connexion = Bdd::getInstance();
        $sql = "SELECT * FROM Vehicle WHERE on_sale = 1";
        $stmt = $connexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Vehicle::class);
    }

    public function readOne($id){
        $connexion = Bdd::getInstance();
        $sql = "SELECT * FROM Vehicle WHERE id = $id";
        //$stmt = $connexion->prepare($sql);
        //$stmt->execute([":id" => $id]);
        //return $stmt->fetchObject(User::class);
        $stmt = $connexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Vehicle::class);
    }

    public function create(){
        $connexion = Bdd::getInstance();
        $sql = "INSERT INTO Vehicle
                (name, model , description , image , date_creation , on_sale)
                VALUES
                (:name , :model , :description , :image, :date_creation, :on_sale)
            ";
        $stmt = $connexion->prepare($sql );
        $stmt->execute([
            ":name" => $this->name ,
            ":model" => $this->model ,
            ":description" => $this->description ,
            ":image" => $this->image,
            ":date_creation" => $this->date_creation,
            ":on_sale" => $this->on_sale
        ]);
        return $stmt->rowCount(); 
    }
    public function update($id){
        $connexion = Bdd::getInstance();
        $sql = "UPDATE Vehicle 
                SET name = :name , model = :model , description = :description , image = :image, date_creation = :date_creation, on_sale = :on_sale
                WHERE id = :id";
        $stmt = $connexion->prepare($sql);

        $stmt->execute([
            ":id" => $id ,
            ":name" => $this->name ,
            ":model" => $this->model ,
            ":description" => $this->description ,
            ":image" => $this->image,
            ":date_creation" => $this->date_creation,
            ":on_sale" => $this->on_sale
            
        ]);
        
        return $stmt->rowCount(); 

}

    // Destroy the data from Vehicle Table  
    public function delete($id){
        $connexion = Bdd::getInstance();
        $sql = "DELETE FROM Vehicle WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            ":id" => $id 
        ]);
        return $stmt->rowCount(); 
    }

}
