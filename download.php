<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure File Download</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 35px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input:focus {
            border-color: #4e73df;
            outline: none;
            box-shadow: 0 0 5px rgba(78,115,223,0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4e73df;
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #2e59d9;
        }

        .message {
            margin-top: 15px;
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Download a File</h2>
        <form method="post">
            <input type="text" name="filename" placeholder=".pdf,.txt,.docx" required>
            <button type="submit">Download</button>
        </form>

        <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>
    </div>

<?php
if (isset($_POST['filename'])) {

    // 🔒 Remove path traversal attempts
    $filename = basename($_POST['filename']);
    $file = "uploads/" . $filename;

    if (file_exists($file) && is_file($file)) {

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($file));
        header('Pragma: public');

        readfile($file);
        exit;

    } else {
        $message = "❌ File not found!";
    }
}
?>
</body>
</html>
