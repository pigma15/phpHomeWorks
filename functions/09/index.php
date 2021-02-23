<h1>Funkcijos 09</h1>

<?php

echo 'Uzduotis Nr. 9 <br>';
echo 'Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. <br><br>';

function isPrime($number) {
    if (0 == $number || 1 == $number) return false;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) return false; 
    }
    return true;
}

// rearranges exact array / function with reference
function onlyPrimesAtEndRearrange(&$array) {
    foreach(array_slice($array, -3) as $value) {
        if(!isPrime($value)) {
            $array[] = rand(1, 33);
            onlyPrimesAtEndRearrange($array);
            break;
        }
    }
}

// does not change exact array, instead return new array / function without reference
function onlyPrimesAtEndCreate($array) {
    foreach(array_slice($array, -3) as $value) {
        if(!isPrime($value)) {
            $array[] = rand(1, 33);
            $array = onlyPrimesAtEndCreate($array);
            break;
        }
    }
    return $array;
}



foreach (range(1, 3) as $_) {
    $array[] = rand(1, 33);
}


// rearranges exact array / function with reference
onlyPrimesAtEndRearrange($array);
echo implode(', ', $array).'<br><br>';
echo 'Is viso skaiciu: '.count($array);

// does not change exact array, instead return new array / function without reference
/* $createdArray = onlyPrimesAtEndCreate($array);
echo implode(', ', $createdArray).'<br><br>';
echo 'Is viso skaiciu: '.count($createdArray); */