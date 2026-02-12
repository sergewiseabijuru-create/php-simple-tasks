<!DOCTYPE html>
<html>
<head>
    <title>Alphabet Pattern H</title>
    <style>
        body {
            font-family: monospace;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .pattern {
            padding: 20px;
            text-align: center;
            line-height: 1.5;
        }
        .pattern span {
            display: inline-block;
            width: 20px;
        }
    </style>
</head>
<body>
    <div class="pattern">
        <?php
        for ($row = 1; $row <= 7; $row++) {
            for ($col = 1; $col <= 5; $col++) {
                if ($col == 1 || $col == 5 || $row == 4) {
                    echo "<span>*</span>";
                } else {
                    echo "<span>&nbsp;</span>";
                }
            }
            echo "<br>";
        }
        ?>
    </div>
</body>
</html>
