<h1>Funkcijos 05</h1>

<?php

echo 'Uzduotis Nr. 5 <br>';
echo 'Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.<br><br>';

function checkDividers($number) {
    $number = sqrt(pow(intval($number), 2));
    $dividers = [];
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $dividers[] = $i;
        }
    }
    return ['number' => $number, 'dividers' => $dividers, 'count' => count($dividers)];
};

function sortByDividerCount($a, $b) {
    return checkDividers($b)['count'] <=> checkDividers($a)['count'];
}

foreach(range(1, 100) as $_) {
    $randomNumbers[] = rand(33, 77);
}
echo 'Masyvas: '.implode(', ', $randomNumbers).'<br><br>';

usort($randomNumbers, 'sortByDividerCount');

echo 'Surusiuota pagal dalikliu kieki : ';

/* echo '<pre>';
print_r($randomNumbers); */
foreach($randomNumbers as $value) {
    echo $value.'['.checkDividers($value)['count'].']; ';
}
