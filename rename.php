<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>


<body><?php    
echo "<a href='index.php'<button class='btn btn-danger mt-5 mb-5 '>Back </button></a>"
?>
<?php 
    if (isset($_GET['path'])) {
        $path = $_GET['path'];
        
        
        
        if (is_file($path)) {
           
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_name'])) {
               
                $newName = $_POST['new_name'];
                
                if (rename($path, dirname($path) . '/' . $newName)) {
                    header('Location: index.php'); 
                    exit();
                } else {
                    echo 'edit failed';
                }
            }
        } elseif (is_dir($path)) {
           
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_name'])) {
                
                $newName = $_POST['new_name'];
                if (rename($path, dirname($path) . '/' . $newName)) {
                    header('Location: index.php'); 
                    exit();
                } else {
                    echo 'edit failed';
                }
            }
        }
    }




echo '<form method="POST">
<input type="text" name="new_name" class="form" placeholder="Enter new name" required>
<input type="submit" class="btn btn-primary" value="Save">
</form>'
?>







   
</body>
</html>