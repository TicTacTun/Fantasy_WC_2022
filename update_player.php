<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$country = $position = $name = $age = $apps = $goals = "";
$country_err = $position_err = $name_err = $age_err = $apps_err = $goals_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    
    $input_country = trim($_POST["Country"]);
    if(empty($input_country)){
        $country_err = "Please enter a country name.";     
    } else{
        $country = $input_country;
    }

    $input_position = trim($_POST["Position"]);
    if(empty($input_position)){
        $position_err = "Please enter position.";     
    } else{
        $position = $input_position;
    }

    $input_name = trim($_POST["Name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";     
    }
     else{
        $name = $input_name;
    }

    $input_age = trim($_POST["age"]);
    if(empty($input_age)){
        $age_err = "Please enter an age.";     
    } 
    elseif(!ctype_digit($input_age)){
        $age_err = "Please enter a positive integer value.";
    }
    else{
        $age = $input_age;
    }

    $input_apps = trim($_POST["apps"]);
    if(empty($input_apps)){
        $apps_err = "Please enter apperance number.";     
    } 
    elseif(!ctype_digit($input_apps)){
        $apps_err = "Please enter a positive integer value.";
    }
    else{
        $apps = $input_apps;
    }

    $input_goals = trim($_POST["goals"]);
    if(empty($input_goals)){
        $address_goals = "Please enter goal numbers.";     
    }
    elseif(!ctype_digit($input_goals)){
        $goals_err = "Please enter a positive integer value.";
    }
    else{
        $goals = $input_goals;
    }
    
    // Check input errors before inserting in database
    if(empty($country_err) && empty($position_err) && empty($name_err) && empty($age_err) && empty($apps_err) && empty($goals_err)){
        // Prepare an update statement
        $sql = "UPDATE players SET Country=?,Position=?,Name=?,age=?,apps=?,goals=? WHERE id=?";
         
        if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "sssiiii", $param_country, $param_position, $param_name, $param_age, $param_apps, $param_goals, $param_id);
            
            // Set parameters
            $param_country = $country;
            $param_id = $id;
            $param_position = $position;
            $param_name = $name;
            $param_age = $age;
            $param_apps = $apps;
            $param_goals = $goals;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt1)){
                // Records updated successfully. Redirect to control_player page
                header("location: control_player.php");
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
                    $country = $row["Country"];
                    $position = $row["Position"];
                    $name = $row["Name"];
                    $age = $row["age"];
                    $apps = $row["apps"];
                    $goals = $row["goals"];
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
    <title>Update Player</title>
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
                    <h2 class="mt-5">Update Player Info</h2>
                    <p>Please edit the input values and submit to update the player info.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                            <span class="invalid-feedback"><?php echo $age_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="Position" class="form-control <?php echo (!empty($position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $position; ?>">
                            <span class="invalid-feedback"><?php echo $position_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Apps</label>
                            <input type="text" name="apps" class="form-control <?php echo (!empty($apps_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $apps; ?>">
                            <span class="invalid-feedback"><?php echo $apps_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Goals</label>
                            <input type="text" name="goals" class="form-control <?php echo (!empty($goals_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $goals; ?>">
                            <span class="invalid-feedback"><?php echo $goals_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="Country" class="form-control <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $country; ?>">
                            <span class="invalid-feedback"><?php echo $country_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="control_player.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>