<?php

class mainModel extends Model{
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
}
?>