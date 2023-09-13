<?php
$abc = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'Y', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Z'];

$ltr = '';

for($i = 0; $i < 3; $i++) {$ltr = $ltr.$abc[rand(0, count($abc) - 1)];}

file_put_contents('skaičius.txt', $ltr);

echo "<h1 style='color:blue';>Išsaugotas atsitiktinis stringas : '".$ltr."' siunčiamas i skaičius.txt</h1>";
?>