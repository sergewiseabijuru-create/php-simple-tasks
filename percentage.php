<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Checker</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 50px;
        display: flex;
        flex-direction: column;
    }
    form {
        margin-bottom: 20px;
        Display: block;
        background-color: #fff;
           

    }
    label {
        margin-right: 10px;
    }
    input[type="decimals"] {
        width: 60px;
        padding: 5px;
    }
    button {
        padding: 5px 10px;
    }
    h3 {
        margin-top: 20px;
    }
</style>
<body>
    <form method="post">
        <label for="percentage">Percentage:</label>
        <input type="decimals" name="percentage" id="percentage" required>
        <button type="submit">Display Grade</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $percentage = $_POST["percentage"];
        $grade = "";

        switch (true) {
            case ($percentage >= 90 && $percentage <= 100):
                $grade = "A";
                break;
            case ($percentage >= 80 && $percentage <= 89):
                $grade = "B";
                break;
            case ($percentage >= 70 && $percentage <= 79):
                $grade = "C";
                break;
            case ($percentage >= 60 && $percentage <= 69):
                $grade = "D";
                break;
            case ($percentage >= 50 && $percentage <= 59):
                $grade = "E";
                break;
            case ($percentage >= 40 && $percentage <= 49):
                $grade = "F";
                break;
            case ($percentage >= 30 && $percentage <= 39):
                $grade = "S";
                break;
            case ($percentage < 30):
                $grade = "U";
                break;
            default:
                $grade = "Invalid input";
        }

        echo "<h3>Percentage: $percentage%</h3>";
        echo "<h3>Grade: $grade</h3>";
    }
    ?>
</body>
</html>
