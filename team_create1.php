<?php require_once ("datbasecon.php");?>
<?php
    session_start();
                                          
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
            <header>Here is Your Fantasy Team</header> 
        </div> 
        
        <div class="column5" >
            <h2 style='font-family: "Times New Roman", Times, serif;'>Team <?php echo $_SESSION['name']?> </h2>
            <table id = 'team 'class = 'table table-striped'>
                <thead class= 'p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >Points</th>
                        <th>Ranking</th>
                        <th>Player_ID</th>
                        <th >Name</th>  
                        <th>Position</th>
                                                                             
                        <th>Select</th>
                    </tr>
                </thead>
                <?php
                    
                    $name11 = $_SESSION['name'];
                    $sql11 = "SELECT * FROM $name11 ";
                    
                    $result = $conn->query($sql11);
                    while ($row = $result->fetch_assoc()){
                        $id = $row['Player_ID'];
                        $value = 0;
                        
                        echo '<tr>
                                
                                <td>'.$row['Country'].'</td>
                                <td>'.$value.'</td>
                                <td>'.$value.'</td>
                                <td>'.$row['Player_ID'].'</td>
                                <td>'.$row['Name'].'</td>
                                <td>'.$row['Position'].'</td>                               
                            
                                <td>         
                                    <button class="btn btn-success btn-sm" name = "button1" onclick=function () ">
                                        <a href = "deleteplayerfant.php?deleteid='.$id.'" class="text-light" > 
                                            Remove
                                        </a>
                                    </button>
                                
                                </td>
                            </tr>';
                    }
                    

                ?>
                
            </table>
        </div>  
    
    </div> 

</body>
</html>
