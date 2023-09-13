<?php
echo 'hello world <br/>';

print '<h1>everibogy</h1>';

$x = 'hello';

$y = 'world';
echo $x . '' . $y;
echo "<h2>$x $y</h2>";

$z = 10;
$z++;
echo$z . '<br/>';

$z += 15;
echo $z . '<br/>';
echo ++$z . '<br/>';
echo --$z . '<br/>';


$masyvas = array('ob','cit','ap');
echo '<pres>';
print_r($masyvas). '<br/>';

$masyvas = array('pirmas'=> 'ob','antras'=>'cit',
'trecias'=>'apelsinas'
) ;

print_r($masyvas). '<br/>';
echo $masyvas['antras'] . '<br/>';
$masyvas = ['pirmas'=> 'ob','antras'=>'cit',
'trecias'=>'apelsinas'];
print_r($masyvas). '<br/>';


$masyvoilgis = count($masyvas);
echo "<h3>masyvo ilgis: $masyvoilgis</h3>";

$state = null;
for($i = 0;$i<10;$i++)
echo "iteracija $i <br/>";

$array = ['audi','bmw','opel','toyota'];

foreach($array as $value){echo $value . '<br/>';}

foreach($array as $index => $val)
{echo "indeksas yra $index, o reiksme: $val <br/>";}

if(is_array($masyvas)) {
    echo 'Tai yra masyvas <br />';
}

$x = false;

if(is_bool($x)) {
    echo 'Tai yra boolean reikšmė <br />';
}

//is_array() - Masyvo tikrinimas
//is_bool() - Boolean tikrinimas
//is_int() - Sveiko skaičiaus tikrinimas
//is_float() - Skaičiaus po kablelio tikrinimas
//is_string() - Stringo tikrinimas

//AND operatorius
if(is_array($masyvas) && is_bool($x)) {
    //...
}

//OR operatorius
if(is_array($masyvas) || is_bool($x)) {
    //...
}

//AND operatorius
if(is_array($masyvas) AND is_bool($x)) {
    //...
}

//OR operatorius
if(is_array($masyvas) OR is_bool($x)) {
    //...
}

//https://www.php.net/manual/en/function.max
echo max(15, 5, 105, 25) . '<br />';
//https://www.php.net/manual/en/function.min
echo min(15, 5, 105, 25) . '<br />';
//https://www.php.net/manual/en/function.round
$round = round(3.4555416);
echo "Suapvalinta reikšmė $round";

?>