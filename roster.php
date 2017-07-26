<?php
    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    $result = mysqli_query($conn, "select * from roster order by BACK_NUM");


    echo "<div class='container'>";
    echo "<div data-role='content'>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped'> <tr> <th style='width:10%'>#</th> <th style='width:20%'></th> <th>Name</th> <th style='width:10%'>B/T</th> <th style='width:10%'>Age</th> </tr>";

    while($row = mysqli_fetch_array($result)){
        $id = $row[ID];                
        echo "<tr id=$id>";

        echo "<td>" . $row[BACK_NUM] . "</td>";

        $img = "img/".$id.".jpg";
        echo "<td><img src=".$img." style='width: 90%; height: auto;' alt='...' class='img-responsive'></td>";
        
        echo "<td><span style='color:#8181F7'><strong>" . $row[FIRST_NM] . $row[LAST_NM] . "</strong></span><br><small>" . $row[POSITION] ."</small></td>";

        echo "<td>" . $row[BAT] . "/" . $row[THW] . "</td>";

        $age = date('Y')-$row[BORN];
        echo "<td>" . $age . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    mysqli_close($conn);
?>