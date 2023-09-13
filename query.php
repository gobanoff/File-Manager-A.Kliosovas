<?php
   
    $color = isset($_GET['color']) ? $_GET['color'] : 'black';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            color: white;font-size:40px;
        }
    </style>
</head>
<body style="background: <?= $color; ?>;">
    <a href="?color=red">Raudona</a>
    <a href="?color=blue">Mėlyna</a>
    <a href="?color=gold">Geltona</a>
    <a href="?color=green">Green</a>
</body>
</html>