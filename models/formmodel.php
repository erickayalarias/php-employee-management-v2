<?php

class formModel extends Model{

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
    public function  updateEmployee($formU, $id){
        // print_r($formU);
            $name=$formU["name"];
            $lastName=$formU["lastName"];
            $email=$formU["email"];
            $gender=$formU["radio"];
            $city=$formU["city"];
            $streetAddress=$formU["streetAddress"];
            $state=$formU["state"];
            $age=$formU["age"];
            $postalCode=$formU["postalCode"];
            $phoneNumber=$formU["phoneNumber"];

        try{
            $query= $this->db -> connect() -> prepare("UPDATE employees SET name='$name', lastName='$lastName', email='$email', gender='$gender', city='$city', streetAddress=$streetAddress, state='$state', age=$age, postalCode=$postalCode, phoneNumber =$phoneNumber  WHERE id=$id;");
             $query ->execute();
             $data= $query->fetchAll();
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function checkEmail($post){
        try{
            $query= $this->db -> connect() -> prepare("SELECT * from employees;");
             $query ->execute();
             $data= $query->fetchAll();
             foreach ($data as $selects) {
                if($selects["email"] == $post["email"]){
                    // return $selects["id"];
                    // break;
                    return $selects;
                }
            }
            // return $data;
        }
        catch(PDOException $e){
            return false;
        }
    }
}



?>