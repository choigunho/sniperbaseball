<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $player_id = $_GET['id'];
    $qeury = "select * from batter_stats where ROSTER_ID=".$player_id." AND AWARD is not null order by SEASON DESC";
    $result = mysqli_query($conn, $qeury);

    echo "<div style='text-align: center;'><h3>Awards</h3></div>";
    echo "<b>Awards</b>";
    echo "<br>";
    
    echo "<div class='well well-sm'>";
    while($row = mysqli_fetch_array($result)){

        echo "<span class='glyphicon glyphicon-thumbs-up'></span>"." ".$row[AWARD];    
        echo "<br>";
    }
    echo "</div>";  

    mysqli_close($conn);
  
?>