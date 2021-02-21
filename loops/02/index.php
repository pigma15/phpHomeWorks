<h1>Loops 2</h1>

<?php

echo 'Uzduotis Nr.2';
echo '<br><br>';
echo 'Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300, atspausdinkite juos atskirtus tarpais ir suskaičiuokite kiek tarp jų yra didesnių už 150.  Skaičiai didesni nei 275 turi būti raudonos spalvos.<br><br>';

$count = 0;
foreach(range(1, 300) as $_) {
    $temp = rand(0,300);
    echo $temp > 275 ? "<span style='color: red;'> $temp </span>" : $temp;
    echo ' ';
    if ($temp > 150) $count++;
}
echo '<br><br>';
echo "Skaiciu didesniu uz 150 kiekis: $count";