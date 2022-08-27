<?php require_once ("config.php");?>
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
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    
    <title> Fantasy Team Selection</title>
</head>

<body>
    
    <div class='bg' style="height: 150%;">
        <div>
            <header>Here is Your Fantasy Team</header> 
        </div> 
        
        <div class="column4" >
            <h2 style='font-family:"myFirstFont", Times, serif; background-color:#500808; font-weight: 200px;margin-bottom:1.9%;width:50%; margin-left:27%;'> Fantasy Team : <?php $email = $_SESSION['email-log'];
                    $query = "SELECT `Contab` FROM `user-table-conn` WHERE `email`='$email';";                   
                    $conttable = mysqli_query($conn,$query);
                    while ($row = $conttable->fetch_assoc()){
                        $table_name = $row['Contab'];}
                        echo $table_name;?>  </h2>
            <table id = 'team 'class = 'table table-striped' style="font-family:'myFirstFont';">
                <thead class= 'p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Player ID</th>
                        <th >Name</th>  
                        <th>Position</th>
                        <th >Country</th>
                        <th>Points</th>
                        <th>Ranking</th>
                                                                           
                    </tr>
                </thead>
                <?php
                    $email = $_SESSION['email-log'];
                    
                    
                
                    $query = "SELECT* FROM `user-table-conn` WHERE `email`='$email';";                   
                    $conttable = mysqli_query($conn,$query);
                    while ($row = $conttable->fetch_assoc()){
                        $table_name = $row['Contab'];
                    
                        $sql11 = "SELECT * FROM `$table_name` ";
                        $result = $conn->query($sql11);
                        
                        while ($row = $result->fetch_assoc()){
                            $id = $row['id'];
                            $pos = $row['Position'];
                            $value = $row['Points'];
                            
                            echo '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['Name'].'</td>
                                    <td>'.$row['Position'].'</td>
                                    <td>'.$row['Country'].'</td>
                                    <td>'.$value.'</td>
                                    <td>'.$value.'</td>
                                                                
                                
                                    
                                    
                                </tr>';
                        }
                    }    

                ?>
                
            </table>
        </div>
        <button class="btn btn-success btn-lg" onclick="location.href='home.php'" type="button" style="width: 12% ; font-weight:bold;font-family:'myFirstFont'; font: weight 80%; margin-left: 45%;background-color:#500808;">
            Go to HOME
        </button> 
         
    
    </div> 

</body>
</html>
