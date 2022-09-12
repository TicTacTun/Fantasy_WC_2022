<?php
// Include config file
require_once "config.php";

 
// Define variables and initialize with empty values
$country = $id = $position = $name = $age = $apps = $goals = "";
$country_err = $id_err = $position_err = $name_err = $age_err = $apps_err = $goals_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    $id_query="SELECT * FROM players WHERE id='$id' ";
    $id_query_run=mysqli_query($conn,$id_query);
   
    $input_country = trim($_POST["Country"]);
    if(empty($input_country)){
        $country_err = "Please enter a country name.";     
    } else{
        $country = $input_country;
    }

    $input_id = trim($_POST["id"]);
    
    if(empty($input_id)){
        $id_err = "Please enter an unique id number.";     
    }
    
    elseif(mysqli_num_rows($id_query_run)>0){
        $id_err = "This value already exists. Please enter another unique value.";
    }
    elseif(!ctype_digit($input_id)){
        $id_err = "Please enter a positive integer value.";
    }
     else{
        $id = $input_id;
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
    if(empty($country_err) && empty($id_err) && empty($position_err) && empty($name_err) && empty($age_err) && empty($apps_err) && empty($goals_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO players (Country, id, Position, Name, age, apps, goals) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt1 = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt1, "sssssss", $param_country, $param_id, $param_position, $param_name, $param_age, $param_apps, $param_goals);
            
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
                // Records created successfully. Redirect to control_player page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Player</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/matches.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        
    </style>
</head>
<body style="background-image:url(8.png);">
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color:aliceblue;" class="mt-5">Insert New Player</h2>
                    <p style="color:aliceblue;">Please fill this form and submit to add players info to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
                        

                        <div class="form-group">
                            <label style="color:aliceblue;">Player ID</label>
                            <input type="text" name="id" class="form-control <?php echo (!empty($id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $id; ?>">
                            <span class="invalid-feedback"><?php echo $id_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:aliceblue;">Name</label>
                            <input type="text" name="Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:aliceblue;">Age</label>
                            <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                            <span class="invalid-feedback"><?php echo $age_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:aliceblue;">Position</label>
                            <input type="text" name="Position" class="form-control <?php echo (!empty($position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $position; ?>">
                            <span class="invalid-feedback"><?php echo $position_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:aliceblue;">Apps</label>
                            <input type="text" name="apps" class="form-control <?php echo (!empty($apps_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $apps; ?>">
                            <span class="invalid-feedback"><?php echo $apps_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:aliceblue;">Goals</label>
                            <input type="text" name="goals" class="form-control <?php echo (!empty($goals_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $goals; ?>">
                            <span class="invalid-feedback"><?php echo $goals_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="color:aliceblue;" >Country</label>
                            <input type="text" name="Country" class="form-control <?php echo (!empty($country_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $country; ?>">
                            <span class="invalid-feedback"><?php echo $country_err;?></span>
                        </div>



                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="control_player.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>