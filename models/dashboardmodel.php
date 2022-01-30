<?php

class dashboardModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function RetDb(){
        try{
            $query= $this->db -> connect() -> prepare("SELECT * FROM employees;");
             $query ->execute();
             $data= $query->fetchAll();
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function DeletEmployee($id){
        try{
            $query= $this->db -> connect() -> prepare("DELETE FROM employees WHERE id=${id};");
             $query ->execute();
             $data= $query->fetchAll();
            return $data;
        }
        catch(PDOException $e){
            return false;
        }
    }
    public function addEmployee($post){
        try{
            $name=$post["name"];
            $email=$post["email"];
            $city=$post["city"];
            $streetAddress=$post["streetAddress"];
            $state=$post["state"];
            $age=$post["age"];
            $postalCode=$post["postalCode"];
            $phoneNumber=$post["phoneNumber"];
            $query= $this->db -> connect() -> prepare("INSERT INTO employees (name, email, city, streetAddress, state, age, postalCode, phoneNumber) VALUES
            ('$name', '$email', '$city',$streetAddress, '$state', $age, $postalCode, $phoneNumber);");
            $query ->execute();
        }
        catch(PDOException $e){
            return false;
        }
    }
}
?>