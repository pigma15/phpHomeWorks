<h1>Funkcijos 09</h1>

<?php

echo 'Uzduotis Nr. 9 <br>';
echo 'Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. <br><br>';

function isPrime($number) {
    if (0 == $number || 1 == $number) return false;
    if (2 == $number) return true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) return false; 
    }
    return true;
}

function onlyPrimesAtEnd(&$array) {
    foreach(array_slice($array, -3) as $value) {
        if(!isPrime($value)) {
            $array[] = rand(1, 33);
            onlyPrimesAtEnd($array);
            break;
        }
    }
}

foreach (range(1, 3) as $_) {
    $array[] = rand(1, 33);
}

onlyPrimesAtEnd($array);
echo implode(', ', $array).'<br><br>';
echo 'Is viso skaiciu: '.count($array);