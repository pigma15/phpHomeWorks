<h1>Array 3, 4 and 5</h1>

<?php

echo 'Uzduotis nr. 3';
echo '<br><br>';
echo 'Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. Suskaičiuokite kiek yra kiekvienos raidės.<br><br>';

$ABCD = 'ABCD';

$array = [];
foreach (range(1, 200) as $_) {
    $array[] = $ABCD[rand(0, 3)];
}

echo implode(', ', $array).'<br><br>';
echo 'A raidziu: '.array_count_values($array)['A'].'; B raidziu: '.array_count_values($array)['B'].'; C raidziu: '.array_count_values($array)['C'].'; D raidziu: '.array_count_values($array)['D'].'<br><br>';

echo 'Uzduotis nr. 4';
echo '<br><br>';
echo 'Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.<br><br>';

sort($array);
echo implode(', ', $array).'<br><br>';

echo 'Uzduotis nr. 5';
echo '<br><br>';
echo 'Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes. Paskaičiuokite kiek unikalių reikšmių kombinacijų gavote.<br><br>';

$array1 = [];
$array2 = [];
$array3 = [];
foreach (range(1, 200) as $_) {
    $array1[] = $ABCD[rand(0, 3)];
    $array2[] = $ABCD[rand(0, 3)];
    $array3[] = $ABCD[rand(0, 3)];
}

$addedArray = [];
foreach ($array1 as $index => $value) {
    $addedArray[] = $value.$array2[$index].$array3[$index];
}
echo implode(', ', $addedArray).'<br><br>';

echo 'Unikalios kombinacijos: '.implode(', ', array_keys(array_count_values($addedArray), 1));


