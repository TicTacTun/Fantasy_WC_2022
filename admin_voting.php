<?php 
require_once ("config.php");
session_start();                      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <title>admin_voting</title>
</head>

<body>
   
    <style>
        
    </style>

    <div class="container">
        <div>Selected From Array</div>
        
        <div>
            <form action=""></form>
                <label for="match"></label>
                <select name="cars" id="cars">
                    <?php
                        $sql = ' SELECT `Match no.`, `Home Team`, `facing h2h`, `Away Team` FROM `matches` ';
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()){
                            $matchNo = $row['Match no.'];
                            $home = $row['Home Team'];
                            $away = $row['Away Team'];
                            $h2h =  $row['facing h2h'];
                            echo "<option selected='selected' value=''>$matchNo.  $home $h2h $away</option>";
            
                        }
                        
                        
                        
                    ?>
                </select>
                <input type="submit" name="" id="" value = "submit">
            </form>
        </div>
       
    </div>
</body>
</html>
</body>
</html>

