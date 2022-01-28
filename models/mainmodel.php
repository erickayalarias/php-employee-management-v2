<?php

class mainModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function RetDb(){
        try{
            $query= $this->db -> connect() -> prepare("SELECT * FROM admin;");
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