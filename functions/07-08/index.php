<h1>Funkcijos 07 and 08</h1>

<?php

echo 'Uzduotis Nr. 7 <br>';
echo 'Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;<br><br>';

function generateRecursiveArray($depth) {
    $arrayLength = rand(10, 20);
    for ($i = 0; $i < $arrayLength; $i++) {
        $array[] = ($i == $arrayLength - 1) ? (0 < $depth ? generateRecursiveArray(--$depth) : 0) : rand(0, 10);
    }
    return $array;
}

echo '<pre>';
$generatedArray = generateRecursiveArray(rand(10, 30));
print_r($generatedArray);


echo '<br><br>';

echo 'Uzduotis Nr. 8 <br>';
echo 'Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.<br><br>';

function countRecursiveArrayValues($array) {
    $value = 0;
    foreach ($array as $inside) {
        if (is_numeric($inside)) {
            $value += $inside;
        } else if (is_array($inside)) {
            $value += countRecursiveArrayValues($inside);
        }
    }
    return $value;
}

echo 'Masyvo reiksmiu suma : '.countRecursiveArrayValues($generatedArray);