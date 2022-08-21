<?php

require_once('config.php');
session_start();


if (!empty($_POST['name']) && $_POST["submit"]){
    $team_name = $_POST['name'];
    $_SESSION['name']=$team_name;
    
    
    $sql = "CREATE TABLE `$team_name` ( Country VARCHAR(30) ,Player_ID VARCHAR(30) UNIQUE KEY, Points INT(6) ,Ranking int(10) , Name VARCHAR(30) , Position VARCHAR(50))";
    
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:forward.php');
    }
}
?>
