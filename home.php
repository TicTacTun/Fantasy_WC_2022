<!DOCTYPE html>
<html>
<head>
    <title>Fantasy WC 2022</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="6.png">
            </div>    
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="Players_Info.php">Players</a></li>
                <li><a href="#">Teams</a></li>
                <li><a href="#">Fixtures</a></li>
                <li><a href="#">Leaderboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <div class="title">
            <h1>Fantasy WC 2022</h1>
        </div>
        <div class="button">
            <?php
                require_once 'config.php';
                session_start();
                $uname = $_SESSION['username'];
                
                $sql = "SELECT `status` FROM `users` WHERE username='$uname'";
                $result = $conn->query($sql);
                
                while ($row = $result->fetch_assoc()){
                    $status = $row['status'];
                    if ( $status!='submitted'){
                        echo '<a href="team_name_enter.php" class="btn">Fantasy Team</a>';
                    
                    }
                    else if ( $status=='submitted') {
                        echo '<a href="final_table.php" class="btn">Fantasy Team</a>';
                    }
                }
            ?>
            
                        
            <a href="#" class="btn">Prediction</a>
        </div>
    </header>
</body>
</html>