<?php require_once ("config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=3">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Players Information</title>
    <style>
    body {
        background-image: url("8.png");
        background-repeat: no-repeat, repeat;
        
        height: cover;
        background-size: cover;
        background-position: center;
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
        font-family: myFirstFont;
        src: url(Qatar2022Arabic-Bold.ttf);
        }
        *{
        margin: 0;
        padding: 0;
        font-family:'myFirstFont';
        } 
          
        
        
    </style>
    
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Search Player Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
				                    <th>Name</th>
				                    <th>Age</th>
				                    <th>Position</th>
				                    <th>Apps</th>
				                    <th>Goals</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM players WHERE CONCAT(Name,Country) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['Name']; ?></td>
                                                    <td><?= $items['age']; ?></td>
                                                    <td><?= $items['Position']; ?></td>
                                                    <td><?= $items['apps']; ?></td>
                                                    <td><?= $items['goals']; ?></td>
                                                    <td><?= $items['Country']; ?></td>

                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row" >
                
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        
                        <h2 class="pull-left"><h2 style="color:#fff" >List of Players</h2>
                        
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
=======

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <body style="margin: 50px;">
    <h1>List of Players</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
                <th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>Position</th>
				<th>Apps</th>
				<th>Goals</th>
                <th>Country</th>
				
			</tr>
		</thead>

        <tbody>
            
            <?php
            
			

            // read all row from database table
			$sql = "SELECT * FROM players";
			$result = $conn->query($sql);

            if (!$result) {
				die("Invalid query: " . $conn->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["Position"] . "</td>
                    <td>" . $row["apps"] . "</td>
                    <td>" . $row["goals"] . "</td>
                    <td>" . $row["Country"] . "</td>



>>>>>>> 042ac27377b50e326c27f5570b2d6837dd7d6fe8
                    
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