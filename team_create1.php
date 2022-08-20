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
    
    <div class='bg'>
        <div>
            <header>Here is Your Fantasy Team</header> 
        </div> 
        
        <div class="column4" >
            <h2 style='font-family: "Times New Roman", Times, serif; background-color:#500808; font-weight: 200px;margin-bottom:1.9%;width:50%; margin-left:27%;'>Team <?php echo $_SESSION['name']?> </h2>
            <table id = 'team 'class = 'table table-striped'>
                <thead class= 'p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Player ID</th>
                        <th >Name</th>  
                        <th>Position</th>
                        <th >Country</th>
                        <th>Points</th>
                        <th>Ranking</th>
                                                                           
                        <th>Select</th>
                    </tr>
                </thead>
                <?php
                    
                    $name11 = $_SESSION['name'];
                    $sql11 = "SELECT * FROM $name11 ";
                    
                    $result = $conn->query($sql11);
                    while ($row = $result->fetch_assoc()){
                        $id = $row['Player_ID'];
                        $pos = $row['Position'];
                        $value = 0;
                        
                        echo '<tr>
                                <td> &nbsp'.$row['Player_ID'].'</td>
                                <td> &nbsp'.$row['Name'].'</td>
                                <td> &nbsp'.$row['Position'].'</td>
                                <td> &nbsp'.$row['Country'].'</td>
                                <td> &nbsp'.$value.'</td>
                                <td> &nbsp'.$value.'</td>
                                                              
                            
                                <td>         
                                    <button class="btn btn-danger " name = "button1" style="background-color:#d10c0c;">
                                        <a href = "deleteplayerfant.php?deleteid='.$id.'&pos='.$pos.'" class="text-light" onclick="myfunction()">
                                             
                                            Remove
                                        </a>
                                    </button>
                                
                                </td>
                            </tr>';
                    }
                    

                ?>
                
            </table>
        </div>
        <button class="btn btn-success btn-lg" onclick="window.location.href='final_table.php'" type="button" style="width: 12% ; font-weight:bold;font-family: sans-serif; font: weight 80%; margin-left: 45%;"
             >
            Are You Sure about to Submit?
        </button>   
    
    </div> 
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    })
</script>"
</body>
</html>
