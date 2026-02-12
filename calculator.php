<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator Operations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .calculator {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 300px;
            text-align: center;
        }
        .calculator h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .calculator input[type="decimal"] {
            width: 80%;
            padding: 8px;
            margin: 10px 0;
            font-size: 16px;
        }
        .calculator .result {
            margin: 15px 0;
            font-size: 18px;
            font-weight: bold;
            color: #0077cc;
        }
        .calculator button {
            padding: 10px 15px;
            margin: 5px;
            font-size: 18px;
            cursor: pointer;
            background-color:gray;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .calculator button:hover {
            background-color: #005fa3;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Simple Calculator Operations</h2>
        <form method="post">
            <label for="num1">First Number:</label>
            <input type="decimal" name="num1"  required><br>
            <label for="num2">Second Number:</label>
            <input type="decimal" name="num2"  required><br>
            <div class="result">
                <label for="result">Result</label>
                <input type="decimal" id="result" value="<?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operation = $_POST["operation"];
                    $result = "";

                    switch ($operation) {
                        case "+":
                            $result = $num1 + $num2;
                            break;
                        case "-":
                            $result = $num1 - $num2;
                            break;
                        case "*":
                            $result = $num1 * $num2;
                            break;
                        case "/":
                            $result = $num2 != 0 ? $num1 / $num2 : "Cannot be divide by zero";
                            break;
                        default:
                            $result = "Invalid operation";
                    }

                    echo "$result";
                }
                ?>">
            </div>
            <button type="submit" name="operation" value="+">+</button>
            <button type="submit" name="operation" value="-">-</button>
            <button type="submit" name="operation" value="*">*</button>
            <button type="submit" name="operation" value="/">/</button>
        </form>
    </div>
</body>
</html>
