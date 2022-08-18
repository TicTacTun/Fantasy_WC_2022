<?php
session_start();
require_once('datbasecon.php');


if (isset($_GET['addid'])){
    $id = $_GET['addid'];
    $name = $_SESSION['name'];
    
    $sql = "INSERT INTO  $name (Name, Position) SELECT Name, Position FROM players where Player_ID =$id; ";
    $result = mysqli_query($conn,$sql);
    if ($result ){
        header('location:team_create1.php');
    }
    else{
        mysqli_error($conn);
    }
}



?>
