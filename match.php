<?php require_once ("config.php");
?>

<!DOCTYPE HTML>


<html>
    <head>
        <title></title>   
        <link rel="stylesheet" href="matches.css">
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
                          
        </div>
         
    </body>
</html>



