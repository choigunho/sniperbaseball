<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $player_id = $_GET['id'];
    $qeury = "select * from pitcher_stats where ROSTER_ID=".$player_id." order by SEASON DESC";
    $result = mysqli_query($conn, $qeury);

    if(mysqli_num_rows($result) != 0) {
        
        echo "<b>Pitching Stats</b>";
        echo "<div class='table-responsive'>";
        echo "<div id='contents'>";
    
        echo "<table class='table table-striped'> <tr> <th>SEASON</th> <th>TEAM</th> <th>W</th> <th>L</th> </tr>";

        while($row = mysqli_fetch_array($result)){

            echo "<tr>";
            echo "<td>" . $row[SEASON] . "</td>";
            echo "<td>" . $row[TEAM] . "</td>";
            echo "<td>" . $row[W] . "</td>";
            echo "<td>" . $row[L] . "</td>";

            echo "</tr>";

        }

        $result_total = mysqli_query($conn, "SELECT sum(W) as W, sum(L) as L FROM pitcher_stats where ROSTER_ID=".$player_id.";");
        $row = mysqli_fetch_array($result_total);
        echo "<tr>";
        echo "<td>Career</td>";
        echo "<td></td>";

        echo "<td>" . $row[W] . "</td>";
        echo "<td>" . $row[L] . "</td>";
    
        echo "</table>";

        echo "</div>";
        echo "</div>";
        
        mysqli_close($conn);   
    }
?>