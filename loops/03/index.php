<h1>Loops 3</h1>

<?php

echo 'Uzduotis Nr.3';
echo '<br><br>';
echo 'Vienoje eilutėje atspausdinkite visus skaičius nuo 1 iki atsitiktinio skaičiaus tarp 3000 - 4000 pvz(aibė nuo 1 iki 3476), kurie dalijasi iš 77 be liekanos. Skaičius atskirkite kableliais. Po paskutinio skaičiaus kablelio neturi būti. Jeigu reikia, panaudokite css, kad visi rezultatai matytųsi ekrane.<br><br>';

$max = rand(3000, 4000);
$string = '';
for ($i = 77; $i < $max; $i++) {
    if ($i % 77 === 0) $string .= ($i . ', ');
}
echo substr($string, 0, -2);