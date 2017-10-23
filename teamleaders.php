<?php

    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    
    $qeury_AVG = "SELECT * FROM af372.currentseasonbattingstats order by AVG DESC limit 1;";
    $qeury_RBI = "SELECT * FROM af372.currentseasonbattingstats order by RBI DESC limit 1;";
    $qeury_SB = "SELECT * FROM af372.currentseasonbattingstats order by SB DESC limit 1;";
$qeury_WIN = "SELECT * FROM af372.currentseasonpitchingstats order by W DESC limit 1;";
$qeury_ERA = "SELECT * FROM af372.currentseasonpitchingstats order by ERA1 limit 1;";
$qeury_SO = "SELECT * FROM af372.currentseasonpitchingstats order by SO DESC limit 1;";
    
    $result_AVG = mysqli_query($conn, $qeury_AVG);
    $result_RBI = mysqli_query($conn, $qeury_RBI);
    $result_SB = mysqli_query($conn, $qeury_SB);
$result_WIN = mysqli_query($conn, $qeury_WIN);
$result_ERA = mysqli_query($conn, $qeury_ERA);
$result_SO = mysqli_query($conn, $qeury_SO);
    
    $row_AVG = mysqli_fetch_array($result_AVG);    
    $row_RBI = mysqli_fetch_array($result_RBI);
    $row_SB = mysqli_fetch_array($result_SB);
$row_WIN = mysqli_fetch_array($result_WIN);
$row_ERA = mysqli_fetch_array($result_ERA);
$row_SO = mysqli_fetch_array($result_SO);

    echo "<ul class='list-group'>";
        echo "<li class='list-group-item'><img src='img/".$row_AVG[id].".jpg' style='width: 15%; float: left; margin-right: 10%;' alt='...'><div><small>Batting Average</small></div><div><b>".$row_AVG[LAST_NM_EN]." ".$row_AVG[FIRST_NM_EN]."</b><span class='badge' style='float: right'>".$row_AVG[AVG]."</span></div><div>".$row_AVG[POSITION]."</div></li>";
        echo "<li class='list-group-item'><img src='img/".$row_RBI[id].".jpg' style='width: 15%; float: left; margin-right: 10%;' alt='...'><div><small>Runs Batted In</small></div><div><b>".$row_RBI[LAST_NM_EN]." ".$row_RBI[FIRST_NM_EN]."</b><span class='badge' style='float: right'>".$row_RBI[RBI]."</span></div><div>".$row_RBI[POSITION]."</div></li>";
        echo "<li class='list-group-item'><img src='img/".$row_SB[id].".jpg' style='width: 15%; float: left; margin-right: 10%;' alt='...'><div><small>Stolen Bases</small></div><div><b>".$row_SB[LAST_NM_EN]." ".$row_SB[FIRST_NM_EN]."</b><span class='badge' style='float: right'>".$row_SB[SB]."</span></div><div>".$row_SB[POSITION]."</div></li>";
        echo "<li class='list-group-item'><img src='img/".$row_WIN[id].".jpg' style='width: 15%; float: left; margin-right: 10%;' alt='...'><div><small>Wins</small></div><div><b>".$row_WIN[LAST_NM_EN]." ".$row_WIN[FIRST_NM_EN]."</b><span class='badge' style='float: right'>".$row_WIN[W]."</span></div><div>".$row_WIN[POSITION]."</div></li>";
        echo "<li class='list-group-item'><img src='img/".$row_ERA[id].".jpg' style='width: 15%; float: left; margin-right: 10%;' alt='...'><div><small>Earned Run Average</small></div><div><b>".$row_ERA[LAST_NM_EN]." ".$row_ERA[FIRST_NM_EN]."</b><span class='badge' style='float: right'>".$row_ERA[ERA1]."</span></div><div>".$row_ERA[POSITION]."</div></li>";
        echo "<li class='list-group-item'><img src='img/".$row_SO[id].".jpg' style='width: 15%; float: left; margin-right: 10%;' alt='...'><div><small>Strikeouts</small></div><div><b>".$row_SO[LAST_NM_EN]." ".$row_SO[FIRST_NM_EN]."</b><span class='badge' style='float: right'>".$row_SO[SO]."</span></div><div>".$row_SO[POSITION]."</div></li>";
          
     echo "</ul>";

    mysqli_close($conn);
?>