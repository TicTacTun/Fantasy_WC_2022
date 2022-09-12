
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Fixture</title>
    <link rel="stylesheet" href="css/matches.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1000px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        table { background-color: aliceblue;
        
        
        }
        
        body{
        background-image: url(8.png);
        font-family:'myFirstFont';
        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(bg/8.png);
        height: 100%;
        background-size: fill;
        background-position: center;

        }
        ul{
        float: right;
        list-style-type: none;
        margin-top: 25px;

        }
        ul li{
        display: inline-block;
        }
        ul li a{
        text-decoration: none;
        color: #fff;
        padding: 5px 20px;
        border: 3px solid transparent;
        transition: 0.6s ease;

        }
        ul li a:hover{
        background-color: #fff;
        color: #000;
        }
        ul li.active a{
        background-color: #fff;
        color: #000;
        }
        .main{
        max-width: 1400px;
        margin: auto;
        padding-top: 1.5%;
        text-decoration: none;
        

        }
        
        
        
        
    </style>
    <body style="height:130%">
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row" >
                
                <div class="col-md-12">
                    <div class="main">    
                        <ul>
                            <li ><a href="adminhome.php">Admin Home</a></li>
                            <li><a href="usertest.php">Users</a></li>
                            <li><a href="fantasyadmin.php">Fantasy Teams</a></li>
                            <li><a href="control_player.php">Players</a></li>
                            <li class="active"><a href="admin_fixture.php">Fixture</a></li>
                            <li><a href="Points_Room.php">Points</a></li>
                        </ul>
                    </div>
                    <div class="mt-5 mb-3 clearfix" style="margin-top: 15%;">
                        <h2 class="pull-center" style="color:#fff; margin-top:13%;">Fixtures of Qatar World Cup 2022</h2>
                        <br>
                        <a href="adding_fixture.php" class="btn btn-success pull-right" style="margin-top:3%; color:#fff;"><i class="fa fa-plus"></i> Add New Matches</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM matches";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table " style="border-right-width=110px" >';
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>Match no.</th>";
                                        echo "<th>Home</th>";
                                        echo "<th></th>";
                                        echo "<th>Away</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Kick-Off</th>";
                                        echo "<th>Stadium</th>";
                                      
                                        

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['match'] . "</td>";
                                        echo "<td>" . $row['Home'] . "</td>";
                                        echo "<td>" . $row['faces'] . "</td>";
                                        echo "<td>" . $row['Away'] . "</td>";
                                        echo "<td>" . $row['dates'] . "</td>";
                                        echo "<td>" . $row['Kick'] . "</td>";
                                        echo "<td>" . $row['Stadium'] . "</td>";
                                       
                                       



                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
