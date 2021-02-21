<h1>Loops 11</h1>

<?php

echo 'Uzduotis Nr. 11';
echo '<br><br>';
echo 'Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.<br><br>';

$randomNumbers = [];
foreach(range(1, 50) as $_) {
    do {
        $temp = rand(1, 200);
    } while (in_array($temp, $randomNumbers));
    $randomNumbers[] = $temp;
}
$numberString = implode(', ', $randomNumbers);
echo 'Atsitiktinai sugeneruoti skaiciai: '.$numberString.'<br><br>';

$primeNumberArray = [];
foreach($randomNumbers as $number) {
    if ($number == 1 ) continue;
    $isPrime = true;
    if ($number == 2) {
        $primeNumberArray[] = $number;
    } else {
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) $primeNumberArray[] = $number;
    } 
}
sort($primeNumberArray);

$primeNumberString = implode(', ', $primeNumberArray);
echo 'Atrinkti pirminiai skaiciai: '.$primeNumberString;