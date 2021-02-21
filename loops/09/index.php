<h1>Loops 9</h1>

<?php

echo 'Uzduotis Nr. 9';
echo '<br><br>';
echo 'Panaudokite funkciją microtime(). Paskaičiuokite kiek sekundžių užtruks kodą:
$c = "10 bezdzioniu \n suvalge 20 bananu.";
Įvykdyti 1 milijoną kartų ir palyginkite kiek užtruks įvykdyti kodą: 
$c = \'10 bezdzioniu \n suvalge 20 bananu.\';<br><br>';

$milijonas = 1000000;

$firstTime = microtime(true);
foreach(range(1, 1000000) as $_) {
    $c = "10 bezdzioniu \n suvalge 20 bananu.";
}
$secondTime = microtime(true);
foreach(range(1, 1000000) as $_) {
    $c = '10 bezdzioniu \n suvalge 20 bananu.';
}
$thirdTime = microtime(true);

echo "Dabar yra praeje $firstTime sekundziu nuo 1970.";
echo '<br>';

$firstExperimentTime = $secondTime - $firstTime;
echo "Pirmasis bandymas uztruko $firstExperimentTime sekundziu.";
echo '<br>';

$secondExperimentTime = $thirdTime - $secondTime;
echo "Antrasis bandymas uztruko $secondExperimentTime sekundziu.";
echo '<br><br>';