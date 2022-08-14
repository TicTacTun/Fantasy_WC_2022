<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="team create_background.css">
    <title>Fantasy team _all player </title>
</head>

<body>
    <div>
            
                
        <div>
            <br>
            <br>
            <br>
            
            <h1> <b> Team Creation Segment</b></h1>
            
                <h2><b>Do you want to select by position?</b> 
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <form method="post">
                            
                            <input type="submit" class="btn btn-secondary" name="button1" value="Forward"/>
            
                            <input type="submit" class="btn btn-secondary" name="button2" value="MidFielder"/>
                            <input type="submit" class="btn btn-secondary" name="button3" value="Defender"/>
                            <input type="submit" class="btn btn-secondary" name="button4" value="GoalKeeper"/>
                        </form>
                    </div>
                    <h3> <b>OR</b> </h3>
                    <h2> <br> Get <b>ALL</b> Players?</b>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <form method="post">
                            <input type="submit" class="btn btn-secondary" name="button0" value="All Player"/>     
                        </form>
                    </div>
                </h2>
            <div class="container">
                <div class="row">
                    <table class="center" style="width:50%;">
                        
                        <thead class = 'class="p-3 mb-2 bg-dark text-white'>
                            <tr>
                                
                                <th >Country</th>
                                <th >PLayer ID</th><br>
                                <th>Position</th>
                                <th >Name</th>
                                <th>FT_Name </th>                       
                                <th>Select/Remove</th>
                                
                            </tr>
                        </thead>
                        <tbody >
                            <?php require_once ("datbasecon.php");
                            
                            function writeMsg($conn,$sql) {
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()){
                                    echo "<tr>
                                            
                                            <td>".$row['Country']."</td>
                                            <td>".$row['Player_ID']."</td>
                                            <td>".$row['Position']."</td>
                                            <td>".$row['Name']."</td>                               
                                            <td>".$row['FantasyTeamName']."</td>
                                            
                                            
                                            <td>
                                                <a class = 'btn btn-outline-success btn-sm' href = 'update'>ADD Player</a>
                                            </td>
                                        </tr>";
                                }
                            }
                            
                            if(isset($_POST['button1'])) {
                                
                            
                                $sql = "Select * FROM Players where Position='Forward'";
                                writeMsg($conn,$sql);
                            
                            }
                            if (isset($_POST['button2'])) {
                                $sql = "Select * FROM Players where Position='MidFielder'";
                                writeMsg($conn,$sql);
                            }
                            if (isset($_POST['button0'])) {
                                $sql = "Select * FROM Players";
                                writeMsg($conn,$sql);
                            }
                            if (isset($_POST['button3'])) {
                                $sql = "Select * FROM Players where Position='Defender'";
                                writeMsg($conn,$sql);
                            }
                            if  (isset($_POST['button4'])) {
                                $sql = "Select * FROM Players where Position='Goalkeeper'";
                                writeMsg($conn,$sql);
                            }

                            ?>
                        
                        </tbody>
                    
                    </table>
                </div>
            </div>
                    
        </div>   
    </div>
</body>
</html>