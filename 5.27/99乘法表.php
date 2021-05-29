<?php
    echo "<table>";
    for($i=9;$i>=1;$i--){
        echo "<tr>";
        for($j=1;$j<=$i;$j++){
        echo "<td style='border:1px solid red'>" ;
        echo  $j."*".$i."=" .$i*$j;
        echo "</td>";
        }
        echo "</tr>";
    }
