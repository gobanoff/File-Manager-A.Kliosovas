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
    $foldername = $_POST['name'];
    $path = dirname(__FILE__); 
    
  
    $folderPath = $path . '/' . $foldername;
    if (!file_exists($folderPath)) {
      
        if (mkdir($folderPath)) { 
            header('Location: index.php');
            exit();
        } else {
            echo 'Nepavyko sukurti aplanko.';
        }
    } else {
        echo 'Aplankas su šiuo pavadinimu jau egzistuoja.';
    }
}


?>
<form method="POST" action="createfolder.php">
        <input type="text" name="name" class="form" placeholder="Enter folder name" required>
        <input type="submit" class="btn btn-primary" value="Create">


</body>
</html>