<?php require_once ("config.php");?>

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

                        <button class="btn btn-success btn-sm" name = "button0"  >                            
                            <a href = "forward.php?addid='.$id.'" class="text-light" style="font-weight:bold""  >     

                        <button class="btn btn-success btn-sm" name = "button0">                            
                            <a href = "forward.php?addid='.$id.'"  class="text-light">     

                                Add Player
                            </a>
                        </button>
                    </td>
                </tr>';
        }
    }

    if (isset($_GET['addid'])){
        $id = $_GET['addid'];
        $name = $_SESSION['name'];
        $sqlF = "Select * FROM $name where Position='Forward'";
        
        $resultF = mysqli_query($conn,$sqlF);

        if (( mysqli_num_rows($resultF)<3)) {
            $sql = "INSERT INTO  $name (Name, Position,Country,Player_ID) SELECT Name, Position,Country,Player_ID FROM players where Player_ID =$id;";
            $result = mysqli_query($conn,$sql);
            if ($result ){  

                header('location:forward.php');
            }
            else{
                mysqli_error($conn);
            }
        
        }
        else{
            echo'<script>
                    setTimeout(function() {
                        swal({
                            title: "All 3 out of 3 Member has been added",
                            text :" You cant add more member! ",
                            type: "success",
                        }, function() {
                            window.location.href= "mid_fielder.php";
                        });
                    }, 1000);
            </script>';
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
    <script src ='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    
    <title> Forward</title>
</head>

<body>    
    <div class='bg'>
        <div>
            <header>Team Creation</header>            
        </div>        
        <div class="column1" >                

            <h2 style='font-family: "Times New Roman", Times, serif; background-color:#500808; font-weight: 200px;margin-bottom:1.9%;width:50%; margin-left:27%;'>Forward Players (
                <?php 
                    $nam1 = $_SESSION['name'];
                    $sqlF = "Select * FROM $nam1 where Position='Forward'"; 
                    $resultF = mysqli_query($conn,$sqlF); echo mysqli_num_rows($resultF)
                ?>
            out of 3 )</h2>                
            <table class = 'content-table' style = 'background-color: aliceblue;'>
                <thead class = 'p-3 mb-2 bg-dark text-white'>
                    <tr>
                        <th >Player_ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Country</th>
                        <th>Points</th>
                        <th>Ranking</th>
                                                                            
                        <th>Select</th>
                    </tr>
                </thead>
                <?php                            
                    $sql = "Select * FROM players where Position='Forward' ";
                    writeMsgt($conn,$sql);  
                ?>
                <!----dddddd ---------------------------------------------------  -->
            </table>
                                      
        </div>
        <button class="btn btn-success btn-lg" onclick="location.href='mid_fielder.php'" type="button" style="width: 12% ; font-weight:bold;font-family: sans-serif; font: weight 80%; margin-left: 45%;background-color:#500808;">
            NEXT
        </button>                    

                <h2 style='font-family: "Times New Roman", Times, serif;'>Forward Players (
                    <?php 
                        $nam1 = $_SESSION['name'];
                        $sqlF = "Select * FROM $nam1 where Position='Forward'"; 
                        $resultF = mysqli_query($conn,$sqlF); echo mysqli_num_rows($resultF)
                    ?>
                out of 3 )</h2>                
                <table class = 'content-table'>
                    <thead class = 'p-3 mb-2 bg-dark text-white'>
                        <tr>
                            <th >Country</th>
                            <th >Player ID</th>
                            <th>Position</th>
                            <th >Name</th>                                                     
                            <th>Select</th>
                        </tr>
                    </thead>
                    <?php                            
                        $sql = "Select * FROM players where Position='Forward' ";
                        writeMsgt($conn,$sql);  
                    ?>
                    <!----dddddd ---------------------------------------------------  -->
                </table>                        
        </div>                    

    <div>  
</body>
</html>