<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {

    // Your folder name
    $uploadDir = "uploa/";  

    // Create folder if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $fileName = basename($_FILES["file"]["name"]);
    $fileTmp  = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileError = $_FILES["file"]["error"];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowed = ['jpg','jpeg','png','pdf','txt','docx'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if ($fileError !== 0) {
        $message = "Upload error.";
    } elseif ($fileSize > $maxSize) {
        $message = "File too large (Max 5MB).";
    } elseif (!in_array($fileExt, $allowed)) {
        $message = "File type not allowed.";
    } else {
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmp, $targetPath)) {
            $message = "File uploaded successfully to 'uploa' folder!";
        } else {
            $message = "Upload failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload File</title>

<style>
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: linear-gradient(135deg, #2b5876, #4e4376);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: #fff;
    padding: 40px;
    width: 360px;
    border-radius: 14px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.25);
    text-align: center;
}

h2 { margin-bottom: 20px; }

input[type="file"] {
    margin: 15px 0;
}

button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #4e4376;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #2b5876;
}

.message {
    margin-top: 15px;
    font-weight: bold;
    color: red;
}

.success {
    color: green;
}
</style>
</head>
<body>

<div class="container">
    <h2>Upload a File</h2>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

    <?php if ($message): ?>
        <div class="message <?php echo str_contains($message,'successfully') ? 'success' : ''; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
