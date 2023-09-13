<?php
$dir = "./"; // Pagrindinė direktorija
$files = scandir($dir);

foreach ($files as $name) {
    if ($name == "." || $name == "..") continue;
    $dr = $dir . $name;
    
    if (is_dir($dr)) {
        echo "<a href='z.php?path=$dr'>$name/</a><br>";
    } else {
       
       $fileInfo = pathinfo($dr);
        
        echo "<li> <a href='$dr'>$name</a><br</li> "; }   

    }
   
  
/*l-savaite,jS-DIENA, F-menuo, Y-metai, h:i:s- val:min:sec , A-pm arba am.*/

echo date("l jS F Y h:i:s A");


function delete($path) {
    if (file_exists($path)) {
        if (is_file($path)) {
           
            unlink($path);
        } elseif (is_dir($path)) {
          
            $files = scandir($path);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $file_path = $path . '/' . $file;
                    delete($file_path);
                }
            }
            rmdir($path);
        }
    }
}
$eventHandlerFunction = "myJavaScriptFunctione(event);"; 
echo '<a href="#"onclick="' . $eventHandlerFunction . '"> Delete </a>';

?>
<script>

function myJavaScriptFunctione(e) {
    alert('Do you want to delete?');e.target.parentElement.parentElement.remove();
}
</script>






<?php
if (isset($_GET['path'])) {
    $path = $_GET['path'];
    
    
    
    if (is_file($path)) {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_name'])) {
           
            $newName = $_POST['new_name'];
            
            if (rename($path, dirname($path) . '/' . $newName)) {
                header('Location: zzz.php'); 
                exit();
            } else {
                echo 'edit failed';
            }
        }
    } elseif (is_dir($path)) {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_name'])) {
            
            $newName = $_POST['new_name'];
            if (rename($path, dirname($path) . '/' . $newName)) {
                header('Location: zzz.php'); 
                exit();
            } else {
                echo 'edit failed';
            }
        }
    }
}