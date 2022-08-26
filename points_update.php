<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$goalp=$assistp=$cleanp=$points= "";
$goalp_err= $assitp_err = $cleanp_err = $points_err ="";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    
    $goalp = trim($_POST["goalp"]);
    
    $assistp = trim($_POST["assistp"]);

    $cleanp = trim($_POST["cleanp"]);
    


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
    if(empty($goalp_err) && empty($assistp_err) && empty($cleanp_err) && empty($points_err)){
        // Prepare an update statement
        $sql = "UPDATE players SET goalp=?, assistp=?, cleanp=?,points=? WHERE id=?";
         
        if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "iiiii",$param_goalp, $param_assistp, $param_cleanp, $param_points, $param_id);
            
            // Set parameters
            $param_goalp = $goalp;
            $param_assistp = $assistp;
            $param_cleanp = $cleanp;
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
                    $goalp = $row["goalp"];
                    $assistp = $row["assistp"];
                    $cleanp = $row["cleanp"];
                    
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
                    <p>Please edit the input values and submit to update the player points.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Goal Points</label>
                            <input type="text" name="goalp" class="form-control <?php echo (!empty($goalp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $goalp; ?>">
                            <span class="invalid-feedback"><?php echo $goalp_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Assist Points</label>
                            <input type="text" name="assistp" class="form-control <?php echo (!empty($assistp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $assistp; ?>">
                            <span class="invalid-feedback"><?php echo $assistp_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Clean Sheet Points</label>
                            <input type="text" name="cleanp" class="form-control <?php echo (!empty($cleanp_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cleanp; ?>">
                            <span class="invalid-feedback"><?php echo $cleanp_err;?></span>
                        </div>

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