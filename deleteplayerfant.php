<?php
require_once('datbasecon.php');

if (isset($_GET['deleteid'])){
    $name = $_GET['deleteid'];
    
    $name1 = 'abraca';

    $sql = "DELETE FROM $name1  WHERE Name='$name'; ";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:team_create1.php');
    }
    else{
        mysqli_error($conn);
    }
}
?>