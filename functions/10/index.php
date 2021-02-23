<h1>Funkcijos 10</h1>

<?php

echo 'Uzduotis Nr. 10 <br>';
echo 'Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite. <br><br>';

function isPrime($number) {
    if (0 == $number || 1 == $number) return false;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) return false; 
    }
    return true;
}

function countPrimes($array) {
    $sum = 0;
    $count = 0;
    foreach($array as $value) {
        if (is_numeric($value)) {
            if (isPrime($value)) {
                $sum += $value;
                $count++;
            }
        } else {
            $sum += countPrimes($value)['sum'];
            $count += countPrimes($value)['count'];
        }
    }
    0 < $count ? ($average = $sum / $count) : ($average = $sum);
    return ['sum' => $sum, 'count' => $count, 'average' => $average];
}

function &findSmallest(&$array) {
    $smallest = INF;
    foreach($array as &$value) {
        if (is_array($value)) {
            if ($smallest > findSmallest($value)) $smallest = &findSmallest($value);
        } else {
            if ($smallest > $value) $smallest = &$value;
        }
    }
    return $smallest;
}


foreach (range(1, 10) as $_) {
    $temp = [];
    foreach (range(1, 10) as $_) {
        $temp[] = rand(1, 100);
    }
    $array[] = $temp;
    unset($temp);
}
echo '<pre>';
print_r($array);
echo '<br><br>';

echo '<pre>';
print_r(countPrimes($array));
echo '<br><br>';

while (countPrimes($array)['average'] < 70) {
    $temp = &findSmallest($array);
    $temp += 3;
}
unset($temp);

echo 'Po pakeitimu: <br><br>';
echo '<pre>';
print_r($array);
echo '<br><br>Primes info: ';
echo '<pre>';
print_r(countPrimes($array));