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
                <thead>
                    <tr>
                     
                        <th>Match no.</th>
                        <th>Home</th>
                        <th></th>
                        <th>Away</th>
                        <th>Date</th>
                        <th>Kick-Off</th>
                        <th>Stadium</th>
                        <th>Group</th>
                        
                        
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
                                <td>" . $row["Match no."] .    "</td>
                                <td>" .$row["Home Team"] .   "</td>
                                <td>" .$row["facing h2h"] .   "</td>
                                <td>" .$row["Away Team"] .   "</td>
                                <td>" . $row["Date"] .    "</td>
                                <td>" . $row["Kick-Off"] .   "</td>
                                <td>" . $row["Stadium"]   . "</td>
                                <td>" . $row["Group"]   . "</td>
                                
                                
                            </tr>";
                        }
            
                        
                        ?>
                    </tbody>
                </table>    
                          
        </div>
         
    </body>
</html>



