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
        public function getList(){
            $query="SELECT * FROM inventario";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<form action='crud/menu.php' method='post'>";
                        echo "<tr>";
                            echo "<td>".$row['nombre']."</td>";
                            echo "<td>".$row['descripcion']."</td>";
                            echo "<td>".$row['cantidad']."</td>";
                            echo "<td colspan='2' class='lowSpace'>";
                                echo "<input type='submit' class='input-submiter1' name='deletor'></input> ";
                                echo "<input type='submit' class='input-submiter2' name='edit'></input> ";
                            echo "</td>";
                        echo "</tr>";
                    echo "</form>";
                }
            }
        }
    }