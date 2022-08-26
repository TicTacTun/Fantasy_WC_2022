<?php
  require_once 'config.php';
  session_start();
  $uname = $_SESSION['username'];
  $email = $_SESSION['email-log'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fantasy WC 2022 Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styleadminhome.css">
</head>
<body>
    <header>
        <div class="main">    
            <ul>
                <li class="active"><a href="#">Admin Home</a></li>
                <li><a href="usertest.php">Users</a></li>
                <li><a href="fantasyadmin.php">Fantasy Teams</a></li>
                <li><a href="control_player.php">Players</a></li>
                <li><a href="#">Points</a></li>
            </ul>
        </div>
        <div class="title">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="button">    
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </header>
</body>
</html>