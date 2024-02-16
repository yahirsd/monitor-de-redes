<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../sql/sqlQuery.php");
    $op=new SQLModel();
    if (isset($_POST["edit"])) {
        $result=$op->modify($_POST);
        header("Location: ../inventarioD.php");
    }
    if(isset($_POST['add'])){
        $result=$op->addItem($_POST);
        header("Location: ../inventarioD.php");
    }
    if(isset($_POST['editor'])){
        $id=$_POST['id'];
        include("editar.php");
    }
    if(isset($_POST['deletor'])){
        $id=$_POST['id'];
        $result=$op->delete($id);
        header("Location: ../inventarioD.php");
    }
}