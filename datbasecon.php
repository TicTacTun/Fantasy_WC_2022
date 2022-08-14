<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "football";

$conn = new mysqli($servername,$username,$password);


if ($conn-> connect_error){
    die("Connetion Faild".$conn->connect_error);
}
else{
    mysqli_select_db($conn,$dbname);
    #echo "Connection successfull";
}
?>