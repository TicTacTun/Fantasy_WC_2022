
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fanadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="main">    
            <ul>
                <li class="active"><a href="adminhome.php">Admin Home</a></li>
                <li><a href="userhandle.php">Users</a></li>
                <li><a href="fantasyHandle.php">Fantasy Teams</a></li>
                <li><a href="#">Players</a></li>
                <li><a href="#">Points</a></li>
            </ul>
        </div>
    
        <div class='bg'>
            <div class='signupFrm'>
                
                <h2 style='color:aliceblue;font-family:"myFirstFont"; ; font-weight: 200px;margin-bottom:0.5%;width:30%;margin-left:10%;margin-right:50% ; margin-top:10%'>
                        user connection with table
                </h2>
                
                <div  style="background-color: white; margin-left:10%;margin-right:50% ; margin-top:3%">
                    
                    <table class="table table-striped">
                        <thead >
                            <th>user-email</th>
                            <th>Connection Table</th>
                            <th>Action</th>
                            
                            
                        </thead>
                        <tbody>
                            <?php 
                                require_once "config.php";
                                $sql = "SELECT * FROM `user-table-conn`;";
                                $result = mysqli_query($conn,$sql);
                                if ($result){
                                    while($row = $result->fetch_assoc()) {
                                    $email = $row['email'];
                                    $table = $row['Contab'];
                                    echo '
                                            <tr>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['Contab'].'</td>
                                            <td>
                                            
                                                <button class="btn btn-danger btn-sm" name = "button0">

                                                    <a href = "fantasyadmin.php?email='.$email.'&Contab='.$table.'" class="text-light"  style = "text-decoration: none;">
                                                                        
                                                        Remove
                                                    </a>
                                                </button>
                                            </td>
                                            </tr>';       
                                    }

                                }
                                if(isset($_GET['email'])){
                                    $email1 = $_GET['email'];
                                    $table1 = $_GET['Contab'];
                                    echo $table;
                                    $sql = "DELETE FROM `user-table-conn` WHERE email='$email1'; ";
                                    $result = mysqli_query($conn,$sql);

                                    $sql2 = " DROP TABLE `$table1`";
                                    $result2 = mysqli_query($conn,$sql2);

                                    $sql3 = "UPDATE `users` SET status ='unsubmitted'  WHERE email = '$email1';";
                                    $result3 = mysqli_query($conn,$sql3);
                                    if ($result){
                                        header('location:fantasyHandle.php');
                                    
                                    }
                                }
                            ?>

                        </tbody>
                    
                    </table>
        
        
                </div>
                
            </div>
        </div>
    </header>

</body>
</html>

