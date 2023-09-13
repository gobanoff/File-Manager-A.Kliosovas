<?php

$abc = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'Y', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Z'];


$ltr3 = file_get_contents('skaičius.txt');
$count = 0;

while(true) {
    $ltr = '';

    for($i = 0; $i < 3; $i++) {
        $ltr = $ltr.$abc[rand(0, count($abc) - 1)];
    }

    echo $ltr."<br>";

    if($ltr === $ltr3) {
        echo "<h1 style='color:red; '>Bandymu kiekis: ".$count." kartu.</h1>";
        break;
    }$count++;
}

?>