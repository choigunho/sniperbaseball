<?php
    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    $result = mysqli_query($conn, "select * from roster WHERE POSITION='P' order by BACK_NUM");

    echo "<div id='test' class='table-responsive' style='margin-bottom: 0px;'>";
    
    echo "<table class='table table-hover'> <tr> <th style='width:10%'>#</th> <th style='width:20%'></th> <th>Name</th> <th style='width:15%'>B/T</th> <th style='width:15%'>Age</th> </tr>";

    while($row = mysqli_fetch_array($result)){
        $id = $row[ID];                
        echo "<tr id=$id>";

        echo "<td>" . $row[BACK_NUM] . "</td>";

        $img = "img/".$id.".jpg";
        echo "<td><img src=".$img." style='width: 90%; height: auto;' alt='...' class='img-responsive'></td>";
        
        echo "<td><strong>".$row[LAST_NM_EN]." ".$row[FIRST_NM_EN]."</strong><br><small>".$row[POSITION]."</small></td>";

        echo "<td>" . $row[BAT] . "/" . $row[THW] . "</td>";

        $age = date('Y')-$row[BORN];
        echo "<td>" . $age . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    mysqli_close($conn);
?>