<h1>Arrays2 1 and 2</h1>

<?php

echo 'Uzduotis nr. 1';
echo '<br><br>';
echo 'Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.<br><br>';

$twoDimensionalArray = [];
foreach (range(1,10) as $_) {
    $tempArray = [];
    foreach (range(1,5) as $_) {
        $tempArray[] = rand(5, 25);
    }
    $twoDimensionalArray[] = $tempArray;
}
echo '<pre>';
print_r($twoDimensionalArray);
echo '<br><br>';

echo 'Uzduotis nr. 2';
echo '<br><br>';
echo 'A. Suskaičiuokite kiek masyve yra elementų didesnių už 10;<br><br>';

$moreThanTen = 0;
$largest = -INF;
foreach($twoDimensionalArray as $singleArray) {
    foreach($singleArray as $value) {
        if ($value > $largest) $largest = $value;
        if (10 < $value) $moreThanTen++;
    }
}
echo 'Reiksmiu didesniu uz 10 yra ' . $moreThanTen.'<br><br>';

echo 'B. Raskite didžiausio elemento reikšmę;<br><br>';

echo 'Didziausia reiksme: '. $largest.'<br><br>';

echo 'C. Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.);<br><br>';

foreach ($twoDimensionalArray[0] as $index => $_) {
    $sum = 0;
    foreach ($twoDimensionalArray as $inside) {
        $sum += $inside[$index];
    }
    echo $index.' indekso reiksmiu suma lygi '.$sum.'<br>';
}
echo '<br>';

echo 'D. Visus masyvus “pailginkite” iki 7 elementų<br><br>';

foreach ($twoDimensionalArray as &$singleArray) {
    while(count($singleArray) < 7) {
        $singleArray[] = rand(5, 25);
    }
}
unset($singleArray);
echo '<pre>';
print_r($twoDimensionalArray);
echo '<br><br>';

echo 'E. Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai<br><br>';

$arrayOfSums = [];
foreach ($twoDimensionalArray as $singleArray) {
    $arrayOfSums[] = array_sum($singleArray);
}
echo '<pre>';
print_r($arrayOfSums);




