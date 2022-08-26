<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Control Player</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        table { background-color: aliceblue; }
        body{

        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(8.png);

        height: 100vh;
        background-size: cover;
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
                
        
        
        
    </style>
    <body >
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
                            <li ><a href="#">Admin Home</a></li>
                            <li><a href="usertest.php">Users</a></li>
                            <li><a href="fantasyadmin.php">Fantasy Teams</a></li>
                            <li class="active"><a href="control_player.php">Players</a></li>
                            <li><a href="#">Points</a></li>
                        </ul>
                    </div>
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Players Info</h2>
                        <a href="insert_player.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Player</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM players";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Age</th>";
                                        echo "<th>Position</th>";
                                        echo "<th>Apps</th>";
                                        echo "<th>Goals</th>";
                                        echo "<th>Country</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        echo "<td>" . $row['age'] . "</td>";
                                        echo "<td>" . $row['Position'] . "</td>";
                                        echo "<td>" . $row['apps'] . "</td>";
                                        echo "<td>" . $row['goals'] . "</td>";
                                        echo "<td>" . $row['Country'] . "</td>";


                                        echo "<td>";
                                            echo "&nbsp&nbsp;";
                                            echo '<a href="update_player.php?id='. $row['id'] .'" class="mr-3" title="Update Player" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo "&nbsp&nbsp&nbsp&nbsp;";
                                            echo '<a href="delete_player.php?id='. $row['id'] .'" title="Delete Player" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
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
</html>