<?php
require_once('datbasecon.php');
if (!empty($_POST['name']) && $_POST["submit"]){
    $team_name = $_POST['name'];
    echo $team_name;
    $sql = "CREATE TABLE $team_name (Points INT(6) ,Ranking int(10) , Name VARCHAR(30) UNIQUE KEY, Position VARCHAR(50))";
    
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:team_create1.php');
    }
    
}



if (isset($_GET['addid']) && $_POST['tname'] ){
    $id = $_GET['addid'];
    $team_name=$_POST['tname'];
     
    $sql = "INSERT INTO  $team_name (Name, Position) SELECT Name, Position FROM players where Player_ID =$id; ";
    $result = mysqli_query($conn,$sql);
    if ($result ){
        header('location:team_create1.php');
    }
    else{
        mysqli_error($conn);
    }
}

?>
