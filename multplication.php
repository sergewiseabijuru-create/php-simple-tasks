<?php
echo "<table border='1' cellpadding='3px' cellspacing='0px'>";
for($i=1;$i<=10;$i++){
    echo "<tr>";
    for($j=1;$j<=5;$j++){
        $result = $i * $j;
        echo "<td>$i * $j = $result</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>  