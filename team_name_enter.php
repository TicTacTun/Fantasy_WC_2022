<?php require_once ("datbasecon.php");?>
<?php
    session_start();

                       
    function writeMsgt($conn,$sql) {
        
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $id = $row['Player_ID'];
            $value = 0;
            
            
            
            echo '<tr>
                    
                    <td>'.$row['Country'].'</td>
                    <td>'.$row['Player_ID'].'</td>
                    <td>'.$row['Name'].'</td>  
                    <td>'.$value.'</td>
                    <td>'.$value.'</td>
                    
                    <td>'.$row['Position'].'</td>
                                                 
                
                    <td> 
                        
                        <button class="btn btn-success btn-sm" name = "button0">
                            <a href = "addplayerfant.php?addid='.$id.'" class="text-light" >     
                                Add Player

                            </a>
                        </button>

                    </td>
                </tr>';
        }
    }
                           
                      
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
    <title> Fantasy Team Selection</title>
</head>

<body>
    
    <div class='bg'>
        <div>
            <header >Team Creation</header> 
        </div> 
        <div class = "team_name">
            
            
            <form action="name_fant.php" method="post">
                
                <input   type="text"  name="name"  placeholder="Your team name..">
                            
                <br>
                <input type="submit"  onclick="style.display = 'disable'" name= "submit" value="SUBMIT">
            </form>
        </div>
        
        
        
    </div> 
  
</body>
</html>

