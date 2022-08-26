<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$points= "";
$points_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    
    
    $input_points = trim($_POST["points"]);
    if(empty($input_points)){
        $points_err = "Please enter goal numbers.";     
    }
    elseif(!ctype_digit($input_points)){
        $points_err = "Please enter a positive integer value.";
    }
    else{
        $points = $input_points;
    }
    
    // Check input errors before inserting in database
    if(empty($points_err)){
        // Prepare an update statement
        $sql = "UPDATE players SET points=? WHERE id=?";
         
        if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "ii", $param_points,$param_id);
            
            // Set parameters
            $param_points = $points;
            $param_id = $id;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                // Records updated successfully. Redirect to control_player page
                header("location: Points_Room.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt1);
    }
    
    // Close connection
    mysqli_close($conn);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM players WHERE id = ?";
        if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                $result = mysqli_stmt_get_result($stmt1);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $points = $row["points"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error_player.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt1);
        
        // Close connection
        mysqli_close($conn);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error_player.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Points</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body style="background-color:powderblue;">
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update points</h2>
                    <p>Please edit the input values and submit to update the player info.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Points</label>
                            <input type="text" name="points" class="form-control <?php echo (!empty($points_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $points; ?>">
                            <span class="invalid-feedback"><?php echo $points_err;?></span>
                        </div>

                        

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Points_Room.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>