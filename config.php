<?php 

$servername = "localhost";
$uname = "root";
$pass = "";
$dbname = "fantasy_wc_2022";

//connection creation

$conn = new mysqli($servername, $uname, $pass, $dbname);

//check connection

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}


?>