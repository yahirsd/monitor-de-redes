<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../sql/sqlQuery.php");
    $op=new SQLModel();
    if (isset($_POST["edit"])) {
        echo("This is edit");
    }
    if(isset($_POST['add'])){
        $result=$op->addItem($_POST);
        header("Location: ../inventarioD.html");
    }
    if(isset($_POST['editor'])){
        $id=$_POST['id'];
        include("editar.php");
    }
}