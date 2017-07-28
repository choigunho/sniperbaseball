<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $player_id = $_GET['id'];
    $current_year = date("Y");
    $qeury = "select * from batter_stats where SEASON=".$current_year." AND ROSTER_ID=".$player_id." order by SEASON DESC";
    $result = mysqli_query($conn, $qeury);

    if(mysqli_num_rows($result) != 0) {
        
        echo "<br>";
        echo "<b>".$current_year." Stats</b>";
        echo "<div id='contents'>";
        echo "<table class='table table-condensed' style='margin-bottom: 0px;'><tr><th>AB</th><th>AVG</th><th>HR</th><th>RBI</th><th>SB</th><th>OBP</th></tr>";

        $row = mysqli_fetch_array($result);
            
        echo "<tr>";        
        echo "<td>" . $row[AB] . "</td>";
        $avg = ($row[H]/$row[AB]);
        echo "<td>" .sprintf("%2.3f", $avg). "</td>";
        echo "<td>" . $row[HR] . "</td>";
        echo "<td>" . $row[RBI] . "</td>";
        echo "<td>" . $row[SB] . "</td>";
        $obp = ($row[H] + $row[BB] + $row[HBP])/($row[AB] + $row[BB] + $row[HBP] + $row[SF]);
        echo "<td>" .sprintf("%2.3f", $obp). "</td>";
        echo "</tr>";   
        echo "</table>";

        $career = mysqli_query($conn, "SELECT * from totalbattingstats where id=".$player_id.";");
        $row = mysqli_fetch_array($career);
        
        echo "<b>Career Stats</b>";
        echo "<div id='contents'>";
        echo "<table class='table table-condensed'><tr><th>AVG</th><th>HR</th><th>RBI</th><th>SB</th><th>OBP</th></tr>";
        echo "<tr>";
        
        echo "<td>" . $row[AVG] . "</td>";
        echo "<td>" . $row[HR] . "</td>";
        echo "<td>" . $row[RBI] . "</td>";
        echo "<td>" . $row[SB] . "</td>";   
        echo "<td>" . $row[OBP] . "</td>";
        
        
        echo "</table>";

        echo "</div>";
        echo "</div>";
    }

    mysqli_close($conn);
?>