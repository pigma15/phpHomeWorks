<h1>Funkcijos 06</h1>

<?php

echo 'Uzduotis Nr. 6 <br>';
echo 'Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.<br><br>';

function checkDividers($number) {
    $number = sqrt(pow(intval($number), 2));
    $count = 0;
    $dividers = [];
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $dividers[] = $i;
        }
    }
    return ['number' => $number, 'dividers' => $dividers, 'count' => count($dividers)];
};

foreach (range(1, 100) as $_) {
    $randomNumbers[] = rand(333, 777);
}
echo 'Masyvas: '.implode(', ', $randomNumbers).'<br><br>';

foreach($randomNumbers as $index => $value) {
    if (0 != checkDividers($value)['count']) unset($randomNumbers[$index]);
}
echo 'Palikti pirminiai skaiciai: '.implode(', ', $randomNumbers).'<br><br>';