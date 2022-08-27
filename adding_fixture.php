<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$home = $match=$faces = $away = $dates = $kick = $stadium = "";
$home_err = $match_err= $faces_err = $away_err = $dates_err = $kick_err = $stadium_err ="";
 
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    
   
    $input_home = trim($_POST["home"]);
    if(empty($input_home)){
        $home_err = "Please enter a home name.";     
    } else{
        $home = $input_home;
    }

    $input_match = trim($_POST["match"]);
    
    if(empty($input_match)){
        $match_err = "Please enter an unique id number.";     
    }
    
    
     else{
        $match = $input_match;
    }

    $input_faces = trim($_POST["faces"]);
    if(empty($input_faces)){
        $faces_err = "Please enter position.";     
    } else{
        $faces = $input_faces;
    }

    $input_away = trim($_POST["away"]);
    if(empty($input_away)){
        $away_err = "Please enter a name.";     
    }
     else{
        $away = $input_away;
    }

    $input_dates = trim($_POST["dates"]);
    if(empty($input_dates)){
        $dates_err = "Please enter an age.";     
    } 
    
    else{
        $dates = $input_dates;
    }

    $input_kick = trim($_POST["kick"]);
    if(empty($input_kick)){
        $kick_err = "Please enter apperance number.";     
    } 
    
    
    else{
        $kick = $input_kick;
    }

    $input_stadium = trim($_POST["stadium"]);
    if(empty($input_stadium)){
        $address_stadium = "Please enter goal numbers.";     
    }
    
    
    else{
        $stadium = $input_stadium;
    }


    
    
    
    // Check input errors before inserting in database
    if(empty($match_err) && empty($home_err) && empty($faces_err) && empty($away_err) && empty($dates_err) && empty($kick_err) && empty($stadium_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO matches VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "sssssss", $param_home, $param_match, $param_away, $param_faces, $param_dates, $param_kick, $param_stadium);
            
            // Set parameters
            $param_home = $home;
            $param_match = $match;
            $param_away = $away;
            $param_faces = $faces;
            $param_dates = $dates;
            $param_kick = $kick;
            $param_stadium = $stadium;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                // Records created successfully. Redirect to control_player page
                header("location: admin_fixture.php");
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Fixtures</title>
    <link rel="stylesheet" href="matches.css">
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
                    <h2 class="mt-5">Insert New Fixtures</h2>
                    <p></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
                        

                        <div class="form-group">
                            <label>Match no.</label>
                            <input type="text" name="match" class="form-control <?php echo (!empty($match_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $match; ?>">
                            <span class="invalid-feedback"><?php echo $match_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Home</label>
                            <input type="text" name="home" class="form-control <?php echo (!empty($home_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $home; ?>">
                            <span class="invalid-feedback"><?php echo $home_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>faces</label>
                            <input type="text" name="faces" class="form-control <?php echo (!empty($faces_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $faces; ?>">
                            <span class="invalid-feedback"><?php echo $faces_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>away</label>
                            <input type="text" name="away" class="form-control <?php echo (!empty($away_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $away; ?>">
                            <span class="invalid-feedback"><?php echo $away_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="text" name="dates" class="form-control <?php echo (!empty($dates_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dates; ?>">
                            <span class="invalid-feedback"><?php echo $dates_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Kick-Off</label>
                            <input type="text" name="kick" class="form-control <?php echo (!empty($kick_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kick; ?>">
                            <span class="invalid-feedback"><?php echo $kick_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Stadium</label>
                            <input type="text" name="stadium" class="form-control <?php echo (!empty($stadium_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stadium; ?>">
                            <span class="invalid-feedback"><?php echo $stadium_err;?></span>
                        </div>
                        


                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin_fixture.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

