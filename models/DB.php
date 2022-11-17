<?php

class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "recipes_many_to_many";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }
}


?>