<?php

require_once('datbasecon.php');

if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    
    
    
    $sql = "DELETE FROM $name1 WHERE Name='$id'; ";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:team_create1.php');
    }
    else{
        mysqli_error($conn);
    }
}

?>