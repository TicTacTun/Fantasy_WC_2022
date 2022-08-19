<?php
session_start();
require_once('datbasecon.php');


if (isset($_GET['addid'])){
    $id = $_GET['addid'];
    $name = $_SESSION['name'];
    $sqlF = "Select * FROM $name where Position='Forward'";
    $sqlM = "Select * FROM $name where Position='MidFielder'";
    $sqlG = "Select * FROM $name where Position='GoalKeeper'";
    $sqlD = "Select * FROM $name where Position='Defender'";
    $resultF = mysqli_query($conn,$sqlF);
    $resultM = mysqli_query($conn,$sqlM);
    $resultG = mysqli_query($conn,$sqlG);
    $resultD = mysqli_query($conn,$sqlD);
    
    function insert($conn,$sql){
        
        $result = mysqli_query($conn,$sql);
        if ($result ){
            
            header('location:team_create1.php');
        }
        else{
            mysqli_error($conn);
        }
    }
    
    if ((mysqli_num_rows($resultF)<4) && (mysqli_num_rows($resultG)<2) ){
        $sql = "INSERT INTO  $name (Name, Position) SELECT Name, Position FROM players where Player_ID =$id;";
        insert($conn,$sql);
        echo mysqli_num_rows($resultF);
    
    }
}
    /*if(mysqli_num_rows($resultM)<=4){
        $sql = "INSERT INTO  $name (Name, Position) SELECT Name, Position FROM players where Player_ID =$id; ";
        insert($conn,$sql);
    }
    
    if (mysqli_num_rows($resultG)<=1){
        $sql = "INSERT INTO  $name (Name, Position) SELECT Name, Position FROM players where Player_ID =$id; ";
        insert($conn,$sql);

    } 
    if (mysqli_num_rows($resultD)<=4 ) {
        $sql = "INSERT INTO  $name (Name, Position) SELECT Name, Position  FROM players where Player_ID =$id; ";
        insert($conn,$sql);
    }
    
}*/

?>

