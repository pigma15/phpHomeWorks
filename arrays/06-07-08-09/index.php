<h1>Array 6, 7, 8 and 9</h1>

<?php

echo 'Uzduotis nr. 6';
echo '<br><br>';
echo 'Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis).<br><br>';

$array1 = [];
$array2 = [];
while (count($array1) < 100) {
    $temp = rand(100, 999);
    if (!in_array($temp, $array1)) {
        $array1[] = $temp;
    }
}
while (count($array2) < 100) {
    $temp = rand(100, 999);
    if (!in_array($temp, $array2)) {
        $array2[] = $temp;
    }
}
echo implode(', ', $array1).'<br><br>';
echo implode(', ', $array2).'<br><br>';

echo 'Uzduotis nr. 7';
echo '<br><br>';
echo 'Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.<br><br>';

$arrayUnique = [];
$arrayEqual = [];
foreach ($array1 as $value) {
    in_array($value, $array2) ? $arrayEqual[] = $value : $arrayUnique[] = $value;
}
echo 'Unikalios pirmojo masyvo reiksmes : ' . implode(', ', $arrayUnique).'<br><br>';

echo 'Uzduotis nr. 8';
echo '<br><br>';
echo 'Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose.<br><br>';

echo 'Pasikartojancios reiksmes : ' . implode(', ', $arrayEqual).'<br><br>';

echo 'Uzduotis nr. 9';
echo '<br><br>';
echo 'Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės būtų iš antrojo masyvo.<br><br>';

$goglMoglArray = [];
foreach ($array1 as $index => $value) {
    $goglMoglArray[$value] = $array2[$index];
}
echo '<pre>';
print_r($goglMoglArray);