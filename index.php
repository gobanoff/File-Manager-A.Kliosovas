
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    
    <title>Document</title>
</head>

<body><style>
.btn-info{font-weight: 600;
margin-left: 7px;}
</style>
  <?php 
 
   $path = isset($_GET['path']) ? $_GET['path']:'';
   $files = scandir( !empty($path) ? $path : '.');
 
 
 
 function direct($path, $file)
 {
     $dr = (empty($path) ? $file : $path . '/' . $file);
     $pathInfo = pathinfo($dr);
 
     return [$dr, $pathInfo];
 }
 function query()
 {
     $lnk = isset($_GET['pg']) ? $_GET['pg'] : '';
     $path = isset($_GET['path']) ? $_GET['path'] : '';
 
     return [$lnk, $path];
 }

 list($lnk, $path) = query();
 if(str_contains($path, '..') OR substr_count($path, './') > 1) 
 {  exit();}
 
 
 
    echo' <h1 class="hd">File manager</h1>   <button class="btn btn-danger mb-3"onclick=checkDelete(event)>Delete </button>
    <a href="newfile.php"<button class="btn btn-info mb-3">New file </button> </a>
    <a href="newfolder.php"<button class="btn btn-info mb-3">New Folder </button> </a>  
  
 
    <table class="table">
     <thead>
          <tr>     <th><input type="checkbox"class="h"id="d"onclick="checkBoxes(event)"></th> 
          <th>Name</th>
          <th>Size</th>
          <th>Modified</th>
          <th>Owner</th>
          <th>Actions</th>
          </tr>
     </thead> 
        <tbody>';

  
        foreach ($files as $name) {
          if ($name !== '.' and ($name !== '..' or (!empty($path) and $path !== '.'))) {

        list($dr, $pathInfo) = direct($path, $name);
             
        $size = filesize($dr); $mod = filemtime($dr);

        /*if ($size === 0) {$size = 'Empty';}*/
       if ($name === '..'){$size = ''; }
        elseif ($size > 1000) {$size = ($size / 1000) . ' KB';}
        elseif ($size < 1000 && $size > 0) {$size = $size . ' B';}

        elseif ((!array_key_exists('extension', $pathInfo) and $name !== '..')){
            $size = 'Folder';
        }

        $ext = [ 'pdf' => 'bi-filetype-pdf', 'css' => 'bi-filetype-css',
          'mp3' => 'bi-filetype-mp3', 'js' => 'bi-filetype-js',
          'mp4' => 'bi-filetype-mp4','json' => 'bi-filetype-json',
          'png' => 'bi-filetype-png','txt' => 'bi-filetype-txt',
          'jpg' => 'bi-filetype-jpg', 'php' => 'bi-filetype-php',
          'gif' => 'bi-filetype-jpg',  'html' => 'bi-filetype-html'
      ];
        

    

        if ((!array_key_exists('extension', $pathInfo) and $name !== '..')) {
        $icon = 'bi-folder';
        $link = './index.php?path=' . (empty($path) ? '.' : $path) . '/' . $name;}

        else if ($name === '..') { $icon = 'bi-arrow-left-circle';
        $link = './index.php?path=' . substr($path, 0, strrpos($path, '/'));}

        elseif(!array_key_exists($pathInfo['extension'] ,$ext))
        {$icon = 'bi-file-earmark';$link = $dr;}

        else {
        $icon =  $ext[$pathInfo['extension']];
        $link = $dr;
        }




      echo "<tr><td>" . (($name !== '..'and !in_array($name ,['index.php','catch.php','save.php',
      'skaičius.txt','style.css','file_manager.php','createfile.php','createfolder.php','newfile.php','newfolder.php','README.md','rename.php','.git'])) ? 
      "<input type='checkbox'id='d'data-delete='" . $dr . "'>" : '') . "</td>
      
      
       <td> <a href='" . $link . "'  class='text-decoration-none'> <i class='file-icon bi " . $icon . "'></i> " . $name . " </a> </td>
      <td>" . $size . " </td>
        <td>" . ($name !== '..' ?date("Y/m/d  H:i  ", $mod): '') ."</td>
        <td>Aleksei File Manager</td>
        <td class='butt'> " . (($name !== '..'and !in_array($name ,['.git','index.php','catch.php','save.php',
        'skaičius.txt','style.css','createfile.php','createfolder.php','newfile.php','newfolder.php','README.md','rename.php'])) ?

        " <a href='#'  class='text-decoration-none'delete='" . $dr . "'>
        <i class='bi bi-trash'></i>
        </a>
        <a href='rename.php?path=" . $dr . "' class='text-decoration-none' edit='" . $dr . "'>
        <i class='bi bi-pen'></i>
        </a> 
        <a href='" . $dr . "'target='_blank' class='text-decoration-none'>
        <i class='bi bi-link-45deg'></i>
        </a>
        <a href='#' class='text-decoration-none'download='$name'>
        <i class='bi bi-download'></i>
        </a> " : '') . "</td></tr>";
        


      }}


        "</tbody> </table> ";



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


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['path'])) {
    $deletePath = $_GET['path'];
    delete($deletePath);
    header('Location: index.php');
    exit();
}

?>

 
<script>
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('bi-trash')) {
        e.preventDefault();
        const del = e.target.parentElement.getAttribute('delete');
        if (del) {
            const conf = confirm('Are you sure, you want to delete this folder or file ?');
            if (conf) {
                
                window.location.href = 'index.php?action=delete&path=' + encodeURIComponent(del);
            }
        }
    }
});

function checkDelete(e) {
    const boxes = document.querySelectorAll('#d:checked');
    const files = [];

    boxes.forEach(box => {
        const dlt = box.getAttribute('data-delete');
        if (dlt) {
            files.push(encodeURIComponent(dlt));
        }
    });

    if (files.length > 0) {
        const conf = confirm('Are you sure you want to delete the selected files and folders?');
        if (conf) {
            const delPath = files.join('&path=');
            const action = 'delete';
            window.location.href = `index.php?action=${action}&path=${delPath}`;
        }
    }
}



function checkBoxes(cb) {
        cb.target.checked = !cb.target.checked;
        document.querySelectorAll('#d').forEach(box => {
            box.checked = !box.checked;
        })
    }

</script>
















</body>
</html>