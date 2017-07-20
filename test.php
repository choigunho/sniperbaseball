<?php
        
    $conn = mysqli_connect("localhost", "root", "af9040", "baseball");
    $result = mysqli_query($conn, "select * from batter_stats where ROSTER_ID=1 order by SEASON DESC");

    echo "<table class='table table-striped'> <tr> <th>SEASON</th> <th>TEAM</th> <th>G</th> <th>AB</th> <th>R</th> <th>H</th> <th>2B</th> <th>3B</th> <th>HR</th> <th>AVG</th> </tr>";

    while($row = mysqli_fetch_array($result)){

        echo "<tr>";
        echo "<td>" . $row[SEASON] . "</td>";
        echo "<td>" . $row[TEAM] . "</td>";
        echo "<td>" . $row[GAME] . "</td>";
        echo "<td>" . $row[AB] . "</td>";
        echo "<td>" . $row[R] . "</td>";
        echo "<td>" . $row[H] . "</td>";
        echo "<td>" . $row[Double] . "</td>";
        echo "<td>" . $row[Triple] . "</td>";
        echo "<td>" . $row[HR] . "</td>";

        $avg = $row[H]/$row[AB];
        echo "<td>" . round($avg, 3) . "</td>";

        echo "</tr>";

    }

    $result_total = mysqli_query($conn, "SELECT sum(GAME) AS GAME, sum(PA) as PA, sum(AB) as AB, sum(R) as R, sum(H) as H,sum(Single) as Single, sum('Double') as 'Double',sum(Triple) as Triple,sum(HR) as HR,
sum(RBI),sum(SB),sum(CS),sum(SH),sum(SF),sum(BB),sum(IBB),sum(HBP),
sum(SO),sum(GDP),sum(MH) 
FROM baseball.batter_stats 
where ROSTER_ID=1;");
    $row = mysqli_fetch_array($result_total);
    echo "<tr>";
    echo "<td>Career</td>";
    echo "<td></td>";
    echo "<td>" . $row[GAME] . "</td>";
    echo "<td>" . $row[AB] . "</td>";
    echo "<td>" . $row[R] . "</td>";
    echo "<td>" . $row[H] . "</td>";
    echo "<td>" . $row[Double] . "</td>";
    echo "<td>" . $row[Triple] . "</td>";
    echo "<td>" . $row[HR] . "</td>";
    $avg = $row[H]/$row[AB];
    echo "<td>" . round($avg, 3) . "</td>";

    echo "</table>";

    mysqli_close($conn);
?>