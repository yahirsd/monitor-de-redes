<?php
    class SQLModel{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "monitor_de_redes";
        private $conn;

        public function __construct(){
            $this->conn=new mysqli($this->host,$this->username,$this->password,$this->dbname);
        }
        public function addItem($POST){
            $nombre=$POST['name'];
            $desc=$POST['desc'];
            $canti=$POST['cant'];
            $query="INSERT INTO inventario(nombre,descripcion,cantidad) values('$nombre','$desc','$canti');";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                return 1;
            }
            return 0;
        }
    }