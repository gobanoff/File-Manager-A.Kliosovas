<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
echo '<a href="index.php"<button class="btn btn-danger mt-5 mb-5 ">Back </button></a>'





?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $filename = $_POST['name'];
    $path = dirname(__FILE__);
    
    
    if (!file_exists($path . '/' . $filename)) {
       
        if (touch($path . '/' . $filename)) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Failed to create the file.';
        }
    } else {
        echo 'File with this name already exists.';
    }
}
?>
<form method="POST" action="createfile.php">
        <input type="text" name="name" class="form" placeholder="Enter file name" required>
        <input type="submit" class="btn btn-primary" value="Create">


</body>
</html>