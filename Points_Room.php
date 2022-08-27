<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Points Room</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styleadminhome.css">
    <link rel="stylesheet" href="matches.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1400px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        table { background-color:aliceblue; }
        @font-face {
        font-family: 'myFirstFont';
        src: url(Qatar2022Arabic-Bold.ttf);
        }
        *{
        margin: 0;
        padding: 0;
        font-family:'myFirstFont';
        }
        body {
        background-image: url("8.png");
        background-repeat: no-repeat, repeat;
        
        height: cover;
        background-size: cover;
        background-position: center;
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
                            <li ><a href="adminhome.php">Admin Home</a></li>
                            <li><a href="usertest.php">Users</a></li>
                            <li><a href="fantasyadmin.php">Fantasy Teams</a></li>
                            <li><a href="control_player.php">Players</a></li>
                            <li><a href="admin_fixture.php">Fixture</a></li>
                            <li class="active"><a href="Points_Room.php">Points</a></li>
                            
                        </ul>
                    
                    </div>
                    
                    <div class="mt-5 mb-3 clearfix" >
                        <h2 class="pull-left" style="color: white;margin-top :120px;">Players Point Room</h2>
                        
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
                                        
                                        echo "<th>Position</th>";
                                        
                                        echo "<th>Country</th>";
                                        echo "<th>Goal Points</th>";
                                        echo "<th>Assist Points</th>";
                                        echo "<th>Clean Sheet Points</th>";
                                        echo "<th>Total Points</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Name'] . "</td>";
                                        
                                        echo "<td>" . $row['Position'] . "</td>";
                                        
                                        echo "<td>" . $row['Country'] . "</td>";
                                        echo "<td>" . $row['goalp'] . "</td>";
                                        echo "<td>" . $row['assistp'] . "</td>";
                                        echo "<td>" . $row['cleanp'] . "</td>";
                                        echo "<td>" . $row['points'] . "</td>";

                                        echo "<td>";
                                            echo "&nbsp&nbsp;";
                                            echo '<a href="points_update.php?id='. $row['id'] .'" class="mr-3" title="Update Points" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo "&nbsp&nbsp&nbsp&nbsp;";
                                            
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