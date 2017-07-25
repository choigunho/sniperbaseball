<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $player_id = $_GET['id'];
    $qeury = "select * from pitcher_stats where ROSTER_ID=".$player_id." order by SEASON DESC";
    $result = mysqli_query($conn, $qeury);

    if(mysqli_num_rows($result) != 0) {
        
        echo "<b>Pitching Stats</b>";
        echo "<div class='table-responsive'>";
        echo "<div id='contents'>";
    
        echo "<table class='table table-striped'> <tr> <th>SEASON</th> <th>TEAM</th> <th>W</th> <th>L</th> <th>ERA</th> <th>G</th> <th>IP</th> <th>H</th><th>R</th><th>ER</th><th>HR</th><th>BB</th><th>SO</th></tr>";

        while($row = mysqli_fetch_array($result)){

            echo "<tr>";
            echo "<td>" . $row[SEASON] . "</td>";
            echo "<td>" . $row[TEAM] . "</td>";
            echo "<td>" . $row[W] . "</td>";
            echo "<td>" . $row[L] . "</td>";
//            echo round($row[IP], 0); 
//            echo $row[IP] * 10 % 10; //1
//            echo ($row[IP] * 10 % 10)/3;
            $era = ($row[ER] * 7)/(round($row[IP], 0) + ($row[IP] * 10 % 10/3));
            echo "<td>" .sprintf("%2.2f", $era). "</td>";
            echo "<td>" . $row[G] . "</td>";
            echo "<td>" . $row[IP] . "</td>";
            echo "<td>" . $row[H] . "</td>";
            echo "<td>" . $row[R] . "</td>";
            echo "<td>" . $row[ER] . "</td>";
            echo "<td>" . $row[HR] . "</td>";
            echo "<td>" . $row[BB] . "</td>";
            echo "<td>" . $row[SO] . "</td>";
            echo "</tr>";

        }

        $result_total = mysqli_query($conn, "SELECT sum(W) as W, sum(L) as L, sum(ER) as ER, sum(IP) as IP, sum(G) as G, sum(H) as H, sum(R) as R, sum(ER) as ER, sum(HR) as HR, sum(BB) as BB, sum(SO) as SO FROM pitcher_stats where ROSTER_ID=".$player_id.";");
        $row = mysqli_fetch_array($result_total);
        echo "<tr>";
        echo "<td>Career</td>";
        echo "<td></td>";

        echo "<td>" . $row[W] . "</td>";
        echo "<td>" . $row[L] . "</td>";
        $era = ($row[ER] * 7)/(round($row[IP], 0) + ($row[IP] * 10 % 10)/3);
        echo "<td>" .sprintf("%2.2f", $era). "</td>";
        echo "<td>" . $row[G] . "</td>";
        
        echo "<td>" . $row[IP] . "</td>";
        echo "<td>" . $row[H] . "</td>";
        echo "<td>" . $row[R] . "</td>";
        echo "<td>" . $row[ER] . "</td>";
        echo "<td>" . $row[HR] . "</td>";
        echo "<td>" . $row[BB] . "</td>";
        echo "<td>" . $row[SO] . "</td>";
        echo "</table>";

        echo "</div>";
        echo "</div>";
        
        mysqli_close($conn);   
    }
?>