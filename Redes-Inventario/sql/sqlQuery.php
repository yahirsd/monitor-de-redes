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
        public function modify($POST){
            $nombre=$POST['name'];
            $desc=$POST['desc'];
            $canti=$POST['cant'];
            $id=$POST['id'];
            $query="UPDATE inventario SET nombre='$nombre',descripcion='$desc',cantidad='$canti' WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            if($result){
                return 1;
            }
            return 0;
        }
        public function modifyB($POST){
            $nombre=$POST['name'];
            $prod=$POST['prod'];
            $prodO=$POST['idP'];
            $canti=(int)$POST['cant'];
            $canti2=(int)$this->getAmount($prod);
            $canti3=(int)$this->getAmount($prodO);
            $cantiO=(int)$POST['cant2'];
            $id=$POST['id'];
            $total=$cantiO+$canti2;
            if($prod!=$prodO){
                $total=$canti2;
                $total2=$canti3+$cantiO;
                $query2="UPDATE inventario SET cantidad='$total2' WHERE id_inventario='$prodO'";
                $result2=$this->conn->query($query2);
                if($total<$canti){
                    return "amount";
                }
                $total=$total-$canti;
                $query3="UPDATE inventario SET cantidad='$total' WHERE id_inventario='$prod'";
                $result3=$this->conn->query($query3);
            }else{
                if($total<$canti){
                    return "amount";
                }
                $total=$total-$canti;
                $query2="UPDATE inventario SET cantidad='$total' WHERE id_inventario='$prodO'";
                $result2=$this->conn->query($query2);
            }
            $query="UPDATE prestadores SET nombre='$nombre',cantidad='$canti',id_inventario='$prod' WHERE id_prestador='$id'";
            $result=$this->conn->query($query);
            if($result){
                return "yes";
            }
            return "no";
        }
        public function delete($id){
            $query="DELETE FROM inventario WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            if($result){
                return 1;
            }
            return 0;
        }
        public function deleteB($id,$id2,$cant){
            $query="DELETE FROM prestadores WHERE id_prestador='$id2'";
            $cant2=(int)($this->getAmount($id));
            $total=$cant2+$cant;
            $query2="UPDATE inventario SET cantidad='$total' WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            $result2=$this->conn->query($query2);
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
                            echo "<input type='submit' class='input-submiter2' name='editor'></input> ";
                            echo "<input type='hidden' name='id' value='".$row['id_inventario']."'></input>";
                        echo "</td>";
                    echo "</tr>";
                echo "</form>";
                }
            }else{
                echo "<tr>";
                    echo "<td colspan='3'>No hay dispositivos disponibles</td>";
                echo "</tr>";
            }
        }
        public function getList2(){
            $query="SELECT * FROM prestadores";
            $result=$this->conn->query($query);
            
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<form action='crud/menu.php' method='post'>";
                    echo "<tr>";
                        echo "<td>".$row['nombre']."</td>";
                        echo "<td>".$row['cantidad']."</td>";
                        echo "<td>".$this->getItem($row['id_inventario'])."</td>";
                        echo "<td colspan='2' class='lowSpace'>";
                            echo "<input type='submit' name='deletorB' value='Regresado' class='styled-submit'></input>";
                            echo "<input type='submit' class='styled-submit' value='Editar' name='editorB'></input> ";
                            //echo "<input type='submit' class='input-submiter1' name='deletor'></input> ";
                            echo "<input type='hidden' name='id' value='".$row['id_inventario']."'></input>";
                            echo "<input type='hidden' name='id2' value='".$row['id_prestador']."'></input>";
                            echo "<input type='hidden' name='cant' value='".$row['cantidad']."'></input>";
                        echo "</td>";
                    echo "</tr>";
                echo "</form>";
                }
            }else{
                echo "<tr>";
                    echo "<td colspan='3'>No hay prestadores</td>";
                echo "</tr>";
            }
        }
        private function getItem($id){
            $query="SELECT nombre FROM inventario WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            if($result){
                $row = $result->fetch_assoc();
                $value=$row['nombre'];
                return "$value";
            }
        }
        private function getAmount($id){
            $query="SELECT cantidad FROM inventario WHERE id_inventario='$id'";
            $result=$this->conn->query($query);
            if($result){
                $row = $result->fetch_assoc();
                $value=$row['cantidad'];
                return "$value";
            }
        }
        public function getViewerList(){
            $query="SELECT * FROM inventario";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $nombre=$row['nombre'];
                    $desc=$row['descripcion'];
                    $cant=$row['cantidad'];
                    $id=$row['id_inventario'];
                    echo "
                    <tr>
                    <td>
                      <div class='container'>
                      <form action='crud/menu.php' method='post'>
                          <ol>
                              <li><a href='inventarioD.php'>$nombre</a></li>
                              <li>$desc</li> 
                              <li>Cantidad Disponible: $cant</li>
                            <input type='hidden' name='cant' value='$cant'>
                            <input type='hidden' name='id' value='$id'></input>
                            <ol class='list-look'>
                                <li>
                                    <label >Nombre del prestador: </label>
                                    <input type='text' name='name' required></input>
                                </li>
                                <li>
                                    <label>Inserte la cantidad: </label>
                                    <input type='number' name='cant2' required></input>
                                </li>
                            </ol>
                            <input type='submit' class='styled-submit' name='borrow' value='Tomar Prestado'></input>
                          </ol>
                        </form>
                      </div>
                  </td>
                  </tr>";
                }
            }
        }
        
        public function getEdit($cond){
            $query="SELECT * FROM inventario WHERE id_inventario='$cond'";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $name=$row['nombre'];
                    $desc=$row['descripcion'];
                    $cant=$row['cantidad'];
                    $id=$row['id_inventario'];
                    echo "<form action='menu.php' method='post'>";
                        echo"<label for='name'>Nombre del producto:</label>
                        <input type='text' id='name' name='name' value='$name' required>";
                        echo"<label for='desc'>Nombre del producto:</label>
                        <input type='text' id='desc' name='desc' value='$desc' required>";
                        echo"<label for='cant'>Nombre del producto:</label>
                        <input type='number' id='cant' name='cant' value='$cant' required>";
                        echo "<input type='hidden' name='id' id='id' value='$id'>";
                        echo "<input type='submit' class='styled-submit' name='edit' id='edit' value='Guardar Cambios?''>";
                    echo "</form>";
                }
            }
        }
        public function getEditB($id){
            $query="SELECT * FROM prestadores WHERE id_prestador='$id'";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                $row=$result->fetch_assoc();
                $name=$row['nombre'];
                $cant=$row['cantidad'];
                $oldP=$row['id_inventario'];
                $id=$row['id_prestador'];
                echo "<div class='formContent'>
            <form action='menu.php' method='post' >
                <label for='name'>Nombre del prestador:</label>
                <input type='text' id='name' value='$name' name='name' required>
            
                <label for='cant'>Cantidad prestada:</label>
                <input type='number' id='cant' value='$cant' name='cant' required>
            
                <label for='prod'>Producto:</label>";
                echo "<select class='optionFormat' name='prod' id='prod' required>";
                  $this->getAvailableItems($row['id_inventario']);
                echo "</select>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='hidden' name='idP' value='$oldP'>";
                echo "<input type='hidden' name='cant2' value='$cant'>";

                echo "<input type='submit' class='styled-submit' name='editB' id='editB' value='Guardar Cambios?'>
            </form>
        </div>";
        }
        }
        private function getAvailableItems($id){
            $query="SELECT * FROM inventario";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $id2=$row['id_inventario'];
                    $name=$row['nombre'];
                    if($id2==$id){
                        echo "<option value='$id2' selected>$name</option>";
                    }else{
                        echo "<option value='$id2'>$name</option>";
                    }
                }
            }
        }
        public function borrowItem($cnd,$POST){
            $cant=(int)$POST['cant2'];
            $cant2=(int)$POST['cant'];
            $total=$cant2-$cant;
            $query="UPDATE inventario SET cantidad='$total' WHERE id_inventario='$cnd'";
            $result=$this->conn->query($query);
            $name=$POST['name'];
            $query2="INSERT INTO prestadores(nombre,cantidad,id_inventario)
            values('$name','$cant','$cnd')";
            $result2=$this->conn->query($query2);
            if($result2){
                return 0;
            }
            return 1;
        }
        public function noRepeat($name){
            $query="SELECT nombre FROM prestadores";
            $result=$this->conn->query($query);
            if($result && $result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    if($row['nombre']==$name){
                        return 0;
                    }
                }
            }
            return 1;
        }
    }