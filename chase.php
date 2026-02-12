<?php
echo "<table width='270px' cellspacing='0px' cellpadding='0px' border='1'>";

for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    
    for ($col = 1; $col <= 8; $col++) {
        $total = $row + $col;
        if ($total % 2 == 0) {
            $color = "white";
        } else {
            $color = "black";
        }
        echo "<td height='30px' width='30px' style='background-color:$color;'></td>";
    }

    echo "</tr>";
}

echo "</table>";
?>
