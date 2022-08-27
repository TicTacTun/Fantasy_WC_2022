<?php require_once ("config.php");?>
<?php
    session_start()
                           
                      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="team_create_backgroun1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <title> Fantasy Team Selection</title>
</head>

<body>
    
    <div class='bg'>
        <div class='signupFrm'>
            <div class = "team_name">
                
                
                <form class='form' action="name_fant.php" method="post">

                    

                    <h2 style="color:#500808;font-family:'myFirstFont'">Enter Your Fantasy Team Name</h2>
                    <input   type="text"  name="name"  placeholder="Team Name without space...">

                                
                    <br>
                    <input type="submit" style="background-color:#500808; font-family:'myFirstFont'" name= "submit" value="SUBMIT">
                </form>
            </div>
        </div>   
            
        
    </div> 
  
</body>
</html>

