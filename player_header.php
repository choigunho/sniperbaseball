<?php

    $conn = mysqli_connect("localhost", "root", "af9040", "baseball");

    $player_id = $_GET['id'];
    $qeury = "select * from roster where ID=".$player_id;
    $result = mysqli_query($conn, $qeury);

    
    $row = mysqli_fetch_array($result);

    $age = date('Y')-$row[BORN];
    echo "<h4>".$row[LAST_NM_EN]." ".$row[FIRST_NM_EN]." | #".$row[BACK_NUM]."<br><small>".$row[POSITION]." | ".$row[BAT] . "/" . $row[THW]." | Age: ".$age."</small></h4>";

    mysqli_close($conn);
?>