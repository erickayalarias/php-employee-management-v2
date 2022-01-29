<?php

class NuevoModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function insert($datos){
        // Insertar datos en la BD
        try{
            $name=$datos["name"];
            $lastName=$datos["lastName"];
            $email=$datos["email"];
            $gender=$datos["radio"];
            $city=$datos["city"];
            $streetAddress=$datos["streetAddress"];
            $state=$datos["state"];
            $age=$datos["age"];
            $postalCode=$datos["postalCode"];
            $phoneNumber=$datos["phoneNumber"];
            $query= $this->db -> connect() -> prepare("INSERT INTO employees (name, lastName, email, gender, city, streetAddress, state, age, postalCode, phoneNumber) VALUES
            ('$name', '$lastName', '$email', '$gender', '$city',$streetAddress, '$state', $age, $postalCode, $phoneNumber);");
            $query ->execute();
            
            // echo "Insertar datos";
            return true;
        }
        catch(PDOException $e){
            // echo $e->getMessage();
            // echo "Ya existe esa matricula";
            return false;
        }

    }
    
    public function dbCheck($id){
        try{
            $query= $this->db -> connect() -> prepare(" Select * from employees where id=$id;");
             $query ->execute();
             $data= $query->fetchAll();
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
    }
}



?>