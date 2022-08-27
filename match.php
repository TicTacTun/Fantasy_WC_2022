<?php require_once ("config.php");
?>

<!DOCTYPE HTML>


<html>
    <head>
        <title></title>   
        <link rel="stylesheet" href="matches.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="container" style="font-family:'myFirstFont';">
            <h1>Fixtures of Qatar World Cup 2022 </h1>
            <table class="table">
              
                    <tr>
                     
                        <th>Match no.</th>
                        <th>Home</th>
                        <th></th>
                        <th>Away</th>
                        <th>Date</th>
                        <th>Kick-Off</th>
                        <th>Stadium</th>
                     
                        
                        
                    </tr>
                    <tbody>
            
                        <?php
                        
                        
            
                        // read all row from database table
                        $sql = "SELECT * FROM matches";
                        $result = $conn->query($sql);
            
                        if (!$result) {
                            die("Invalid query: " . $conn->error);
                        }
            
                        // read data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $row["match"] .    "</td>
                                <td>" .$row["Home"] .   "</td>
                                <td>" .$row["faces"] .   "</td>
                                <td>" .$row["Away"] .   "</td>
                                <td>" . $row["dates"] .    "</td>
                                <td>" . $row["Kick"] .   "</td>
                                <td>" . $row["Stadium"]   . "</td>
                                
                                
                                
                            </tr>";
                        }
            
                        
                        ?>
                    </tbody>
                </table>    
                 
                <button class="btn btn-success btn-lg" onclick="location.href='home.php'" type="button" style="width: 12% ; font-weight:bold;font-family:'myFirstFont'; font: weight 80%; background-color:#500808;">
            Home
        </button>
        </div>
         
    </body>
</html>



