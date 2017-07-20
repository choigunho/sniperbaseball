<?php
    $conn = mysqli_connect("localhost", "af372", "12sqec34", "af372");
    $result = mysqli_query($conn, "select * from roster order by BACK_NUM");


    echo "<div class='container'>";
    echo "<div data-role='content'>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped'> <tr> <th>#</th> <th>Name</th> <th>B/T</th> <th>Age</th> </tr>";

    while($row = mysqli_fetch_array($result)){
        $id = $row[ID];                
        echo "<tr id=$id>";

        echo "<td>" . $row[BACK_NUM] . "</td>";
        echo "<td>" . $row[FIRST_NM] . " " . $row[LAST_NM] . "<br>" . $row[POSITION] ."</td>";

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