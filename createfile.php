<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $filename = $_POST['name'];
    $path = dirname(__FILE__); // Gauname katalogo, kuriame yra createfile.php, taką.
    
    // Tikrinkite, ar failas su tokiu pavadinimu jau egzistuoja.
    if (!file_exists($path . '/' . $filename)) {
        // Sukurkite naują tuščią failą.
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