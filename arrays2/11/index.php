<h1>Arrays2 11</h1>

<?php

echo 'Uzduotis nr. 11';
echo '<br><br>';
echo 'Duotas kodas, generuojantis masyvą:<br><br>
do {<br>
    $a = rand(0, 1000);<br>
    $b = rand(0, 1000);<br>
} while ($a == $b);<br>
$long = rand(10,30);<br>
$sk1 = $sk2 = 0;<br>
$c = [];<br>
for ($i=0; $i<$long; $i++) {<br>
    $c[] = array_rand(array_flip([$a, $b]));<br>
}<br><br>
Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
NEGALIMA! naudoti jokių regex ir string funkcijų.
GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php

Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.';

do {
    $a = rand(0, 1000);
    $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10,30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';

/////////////

$realSum = array_sum($c);
$possibleSum = -INF;
$counter = $long + 1;
while ($realSum != $possibleSum) {
    $counter--;
    $possibleSum = $a * $counter;
    $possibleSum += ($b * ($long - $counter));
};
$sk2 = $long - $sk1 = $counter;

/////////////

echo '<h3>Skaičius '.$a.' yra pakartotas '.$sk1.' kartų, o skaičius '.$b.' - '.$sk2.' kartų.</h3>';
