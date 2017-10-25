<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $qeury = "SELECT * FROM af372.currentseasonbattingstats order by SB DESC limit 5;";
    $result = mysqli_query($conn, $qeury);
    
    echo "<div data-role='content'>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-hover'><tr><th style='width:10%'></th><th style='width:20%'></th><th></th><th style='width:15%'></th></tr>";

    $num = 1;
    while($row = mysqli_fetch_array($result)){

        echo "<td>" . $num . "</td>";

        $img = "img/".$row[id].".jpg";
        echo "<td><img src=".$img." style='width: 90%; height: auto;' alt='...' class='img-responsive'></td>";
        
        echo "<td><strong>".$row[LAST_NM_EN]." ".$row[FIRST_NM_EN]."</strong><br><small>".$row[POSITION]."</small></td>";

        echo "<td>" . $row[SB] . "</td>";

        
        echo "</tr>";
        
        $num++;
    }

    echo "</table>";
    echo "</div>";
    echo "</div>";

    mysqli_close($conn);

?>