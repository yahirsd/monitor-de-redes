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
    if(isset($_POST['deletorB'])){
        $id=$_POST['id'];
        $id2=$_POST['id2'];
        $cant=(int)$_POST['cant'];
        $op->deleteB($id,$id2,$cant);
        header("Location: ../inventarioD.php");
    }
    if(isset($_POST['borrow'])){
        $id=$_POST['id'];
        $cant=(int)$_POST['cant2'];
        $cant2=(int)$_POST['cant'];
        $name=trim($_POST['name']);
        $cant2=trim($_POST['cant']);
        $no=0;
        if($name=="" || $cant=="" || $cant=="0"){
            session_start();
            $_SESSION['error']="missing";
            $no=1;
            header("Location: ../inventarioG.php");
        }
        
        if( ( $op->noRepeat($_POST['name']) ) == 0){
            session_start();
            $_SESSION['error']="repeat";
            $no=1;
            header("Location: ../inventarioG.php");
        }
        if($cant>$cant2){
            session_start();
            $_SESSION['error']="number";
            $no=1;
            header("Location: ../inventarioG.php");
        }
        if($no==0){
            $result=$op->borrowItem($id,$_POST);
            header("Location: ../inventarioG.php");
        }
    }
}