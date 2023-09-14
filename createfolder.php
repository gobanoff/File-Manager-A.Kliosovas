<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $foldername = $_POST['name'];
    $path = dirname(__FILE__); 
    
    
    $folderPath = $path . '/' . $foldername;
    if (!file_exists($folderPath)) {
        
        if (mkdir($folderPath )) { 
            header('Location: index.php');
            exit();
        } else {
            echo 'Failed to create the folder!';
        }
    } else {
        echo 'Folder with this name already exists.';
    }
}


?>