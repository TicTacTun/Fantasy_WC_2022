<?php
// Include config file
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url("10.jpg");
        background-repeat: no-repeat, repeat;
        
        height: cover;
        background-size: cover;
        background-position: fill;
    }
    .wrapper{
            width: 1300px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        table { background-color:#fff;}
        @font-face {
        font-family: 'myFirstFont';
        src: url(Qatar2022Arabic-Bold.ttf);
        }
        *{
        margin: 0;
        padding: 0;
        font-family:'myFirstFont';
        } 
        th {
        display: table-cell;
        background-color:black;
        
        font-weight: bold;
        text-align: left;
        }
        
          
        
        
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Leaderboard</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group mb-3">
                                        <select name="sort_numeric" class="form-control" >
                                            <option value="">--Select Option--</option>
                                            <option value="low-high" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "low-high") { echo "selected"; } ?> > Low - High</option>
                                            <option value="high-low" <?php if(isset($_GET['sort_numeric']) && $_GET['sort_numeric'] == "high-low") { echo "selected"; } ?> > High - Low</option>
                                        </select>
                                        <button type="submit" class="input-group-text btn btn-primary" style = "background-color:brown;" id="basic-addon2">
                                            Filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Email</th>
                                    <th>Fantasy Team Name</th>
                                    <th>Total Points</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                

                                $sort_option = "";
                                if(isset($_GET['sort_numeric']))
                                {
                                    if($_GET['sort_numeric'] == "low-high"){
                                        $sort_option = "ASC";
                                    }elseif($_GET['sort_numeric'] == "high-low"){
                                        $sort_option = "DESC";
                                    }
                                }
                                
                                $query = "SELECT * FROM userconn ORDER BY upoints $sort_option";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['Contab']; ?></td>
                                                <td><?= $row['upoints']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success btn-lg" onclick="location.href='home.php'" type="button" style="width: 12% ; font-weight:bold;font-family:'myFirstFont'; color:brown; font: weight 80%; margin-left:45%; margin-top:5%;margin-bottom:5%; background-color:#fff;">
            Home
        </button> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>