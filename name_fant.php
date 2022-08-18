<?php

require_once('datbasecon.php');
session_start();


if (!empty($_POST['name']) && $_POST["submit"]){
    $team_name = $_POST['name'];
    $_SESSION['name']=$team_name;
    
    
    $sql = "CREATE TABLE $team_name (Points INT(6) ,Ranking int(10) , Name VARCHAR(30) UNIQUE KEY, Position VARCHAR(50))";
    
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:team_create1.php');
    }
}
?>