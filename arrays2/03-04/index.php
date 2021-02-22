<h1>Arrays2 3 and 4</h1>

<?php

echo 'Uzduotis nr. 3';
echo '<br><br>';
echo 'Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).<br><br>';

$arrayAZ = range('A', 'Z');
$randomAZ = [];
foreach (range(1, 10) as $_) {
    $tempArray = [];
    $tempLength = rand(2, 20);
    foreach (range(1, $tempLength) as $_) {
        $tempArray[] = array_rand(array_flip($arrayAZ));
    }
    $randomAZ[] = $tempArray;
}

echo 'Surusiuoti raidziu masyvai: ';
foreach ($randomAZ as &$inside) {
    sort($inside);
}
unset($inside);
echo '<pre>';
print_r($randomAZ);

echo 'Uzduotis nr. 4';
echo '<br><br>';
echo 'Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.<br><br>';

echo 'Surusiuotas pagrindinis masyvas pagal vidiniu masyvu ilgi: ';
// sort($randomAZ);

function arrayLength($a, $b) {
    return count($a) <=> count($b);
}
usort($randomAZ, 'arrayLength');

echo '<pre>';
print_r($randomAZ);
