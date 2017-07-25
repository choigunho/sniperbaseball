<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $player_id = $_GET['id'];
    $qeury = "select * from batter_stats where ROSTER_ID=".$player_id." order by SEASON DESC";
    $result = mysqli_query($conn, $qeury);

    if(mysqli_num_rows($result) != 0) {
        
        echo "<b>Batting Stats</b>";
        echo "<div class='table-responsive'>";
        echo "<div id='contents'>";

        echo "<table class='table table-striped'> <tr> <th>SEASON</th> <th>TEAM</th> <th>G</th> <th>AB</th> <th>R</th> <th>H</th> <th>2B</th> <th>3B</th> <th>HR</th> <th>RBI</th> <th>BB</th> <th>HBP</th> <th>SO</th> <th>SB</th> <th>CS</th> <th>AVG</th> <th>OBP</th> <th>SLG</th> </tr>";

        while($row = mysqli_fetch_array($result)){

            echo "<tr>";
            echo "<td>" . $row[SEASON] . "</td>";
            echo "<td>" . $row[TEAM] . "</td>";
            echo "<td>" . $row[G] . "</td>";
            echo "<td>" . $row[AB] . "</td>";
            echo "<td>" . $row[R] . "</td>";
            echo "<td>" . $row[H] . "</td>";
            echo "<td>" . $row[_2B] . "</td>";
            echo "<td>" . $row[_3B] . "</td>";
            echo "<td>" . $row[HR] . "</td>";
            echo "<td>" . $row[RBI] . "</td>";
            echo "<td>" . $row[BB] . "</td>";
            echo "<td>" . $row[HBP] . "</td>";
            echo "<td>" . $row[SO] . "</td>";
            echo "<td>" . $row[SB] . "</td>";
            echo "<td>" . $row[CS] . "</td>";
            $avg = ($row[H]/$row[AB]);
            echo "<td>" .sprintf("%2.3f", $avg). "</td>";
            $obp = ($row[H] + $row[BB] + $row[HBP])/($row[AB] + $row[BB] + $row[HBP] + $row[SF]);
            echo "<td>" .sprintf("%2.3f", $obp). "</td>";
            $slg = ($row[_1B] + 2*$row[_2B] + 3*$row[_3B] + 4*$row[HR])/$row[AB];
            echo "<td>" .sprintf("%2.3f", $slg). "</td>";
            echo "</tr>";

        }

        $result_total = mysqli_query($conn, "SELECT sum(G) AS G, sum(PA) as PA, sum(AB) as AB, sum(R) as R, sum(H) as H,sum(_1B) as _1B, sum(_2B) as _2B, sum(_3B) as _3B, sum(HR) as HR,
    sum(RBI) as RBI, sum(SB) as SB, sum(CS) as CS, sum(SH),sum(SF),sum(BB) as BB,sum(IBB) as IBB, sum(HBP) as HBP,
    sum(SO) as SO, sum(GDP), sum(MH) 
    FROM batter_stats 
    where ROSTER_ID=".$player_id.";");
        $row = mysqli_fetch_array($result_total);
        echo "<tr>";
        echo "<td>Career</td>";
        echo "<td></td>";
        echo "<td>" . $row[G] . "</td>";
        echo "<td>" . $row[AB] . "</td>";
        echo "<td>" . $row[R] . "</td>";
        echo "<td>" . $row[H] . "</td>";
        echo "<td>" . $row[_2B] . "</td>";
        echo "<td>" . $row[_3B] . "</td>";
        echo "<td>" . $row[HR] . "</td>";
        echo "<td>" . $row[RBI] . "</td>";
        echo "<td>" . $row[BB] . "</td>";
        echo "<td>" . $row[HBP] . "</td>";
        echo "<td>" . $row[SO] . "</td>";
        echo "<td>" . $row[SB] . "</td>";
        echo "<td>" . $row[CS] . "</td>";
        $avg = ($row[H]/$row[AB]);
        echo "<td>" .sprintf("%2.3f", $avg). "</td>";
        $obp = ($row[H] + $row[BB] + $row[HBP])/($row[AB] + $row[BB] + $row[HBP] + $row[SF]);
        echo "<td>" .sprintf("%2.3f", $obp). "</td>";
        $slg = ($row[_1B] + 2*$row[_2B] + 3*$row[_3B] + 4*$row[HR])/$row[AB];
        echo "<td>" .sprintf("%2.3f", $slg). "</td>";
        echo "</table>";

        echo "</div>";
        echo "</div>";
    }

    mysqli_close($conn);
?>