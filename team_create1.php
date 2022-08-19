<?php require_once ("datbasecon.php");?>
<?php
    session_start();

                       
    function writeMsgt($conn,$sql) {
        
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $id = $row['Player_ID'];
            
            
            
            echo '<tr>
                    
                    <td>'.$row['Country'].'</td>
                    <td>'.$row['Player_ID'].'</td>
                    <td>'.$row['Position'].'</td>
                    <td>'.$row['Name'].'</td>                               
                
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
            <header>Team Creation</header> 
        </div> 
        <div class = "team_name">
            
            
            <form action="name_fant.php" method="post">
                
                <input   type="text"  name="name"  placeholder="Your team name..">
                            
                <br>
                <input type="submit"  onclick="style.display = 'disable'" name= "submit" value="SUBMIT">
            </form>
        </div>
        
        
        <div class="column1" >
            <h2 style='font-family: "Times New Roman", Times, serif;'>Forward</h2>
            <table class = 'table table-striped'>
                <thead class = 'p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >PLayer ID</th>
                        <th>Position</th>
                        <th >Name</th>                                                     
                        <th>Select</th>
                    </tr>
                </thead>
                <?php                            
                    $sql = "Select * FROM players where Position='Forward'";
                    writeMsgt($conn,$sql);  
                ?>
                <!---- ---------------------------------------------------  -->
            </table>
        </div>
        
        <div class="column2">
            <h2 style='font-family: "Times New Roman", Times, serif;'>MidFielder</h2>
            <table class = 'table table-striped'>
                <thead class='p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >PLayer ID</th>
                        <th>Position</th>
                        <th >Name</th>                                                     
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody >          
                    <?php

                        $sql = "Select * FROM players where Position='MidFielder'";
                        WriteMsgt($conn,$sql);                                         
                    ?>                       
                </tbody>
                <!---- ---------------------------------------------------  -->
            </table>
        </div>

        <div class="column3">
            <h2 style='font-family: "Times New Roman", Times, serif;'>Defender</h2>
            <table class = 'table table-striped'>
                <thead class= 'class="p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >PLayer ID</th>
                        <th>Position</th>
                        <th >Name</th>                                                     
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>

                    <?php           
                        $sql = "Select * FROM players where Position='Defender'";
                        writeMsgt($conn,$sql);
                    ?>
                    
                </tbody>
                <!---- ---------------------------------------------------  -->
            </table>
        </div>

        <div class="column4">
            <h2 style='font-family: "Times New Roman", Times, serif;'>Goalkeeper</h2>
            <table class = 'table table-striped'>
                <thead class= 'class="p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Country</th>
                        <th >PLayer ID</th>
                        <th>Position</th>
                        <th >Name</th>                                                     
                        <th>Select</th>
                    </tr>
                </thead>
                <?php
        
                    $sql = "Select * FROM players where Position='GoalKeeper'";
                    writeMsgt($conn,$sql);

                ?>
                
            </table>
        </div> 
    
    </div> 
  
</body>
</html>









<?php  
    /*  
    
    <a href = "addplayerfant.php" class="text-light" > 
    
    
    
    function writeMsgt2($conn,$sql) {
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            $id = $row['Name'];
            
            echo '<tr>
                    
                    <td>'.$row['Points'].'</td>
                    <td>' .$row['Ranking'].'</td>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['Position'].'</td>                               
                
                    <td>         
                        <button class="btn btn-success btn-sm" name = "button1">
                            <a href = "deleteplayerfant.php?deleteid='.$id.'" class="text-light" > 
                                Remove
                            </a>
                        </button>
                    
                    </td>
                </tr>';
        }
    }
    $table_name='abraca';

    $sql = "Select * FROM abraca where Position='Forward'";
    writeMsgt2($conn,$sql);  */
?>