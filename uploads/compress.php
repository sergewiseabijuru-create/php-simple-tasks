<?php
$folder = "uploa/";
$zipName = "myfiles.zip";

// When form is submitted
if (isset($_POST['zip'])) {

    $zip = new ZipArchive();

    if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {

        // Add selected files to zip
        foreach ($_POST['files'] as $file) {
            $zip->addFile($folder . $file, $file);
        }

        $zip->close();

        // Download the zip
        header("Content-Type: application/zip");
        header("Content-Disposition: attachment; filename=$zipName");
        readfile($zipName);
        exit;

    } else {
        echo "Error creating ZIP file.";
    }
}

// Get files from folder
$files = scandir($folder);
?>

<!DOCTYPE html>
<html>
<head>
<title>Create ZIP</title>
<style>
body {
    font-family: Arial;
    background: #f2f2f2;
    text-align: center;
    padding-top: 50px;
}

.box {
    background: white;
    width: 350px;
    margin: auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px #ccc;
}

button {
    margin-top: 15px;
    padding: 10px;
    width: 100%;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
}

.file {
    text-align: left;
    margin-bottom: 5px;
}
</style>
</head>
<body>

<div class="box">
    <h3>Select files to ZIP</h3>

    <form method="POST">

        <?php
        foreach ($files as $f) {
            if ($f != "." && $f != "..") {
                echo "<div class='file'>
                        <input type='checkbox' name='files[]' value='$f'> $f
                      </div>";
            }
        }
        ?>

        <button type="submit" name="zip">Download ZIP</button>
    </form>
</div>

</body>
</html>
