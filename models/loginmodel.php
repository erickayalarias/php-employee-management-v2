<?php

class loginmodel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function check(){
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
class logoutmodel {
    public $prueba= "echo";
}
?>