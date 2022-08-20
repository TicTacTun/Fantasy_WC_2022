<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once('config.php');

if (isset($_GET['deleteid']) && $_GET['pos']){
    $id = $_GET['deleteid'];
    $pos = $_GET['pos'];
    
    $name1 = $_SESSION['name'];
    
    $sql = "DELETE FROM $name1 WHERE Player_ID='$id'; ";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header('location:team_create1.php');
    }
    else{
        mysqli_error($conn);
    }

    if ($pos == 'Forward'){
        header('location:forward.php');
    }
    else if($pos == 'MidFielder'){
        header('location:mid_fielder.php');

    }
    else if ($pos == 'Defender'){
        header('location:defender.php');
    }
    else if($pos == 'GoalKeeper'){ 
        header('location:goalkeeper.php');
    }
     
}

?>