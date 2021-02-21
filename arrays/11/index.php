<h1>Array 11</h1>

<?php

echo 'Uzduotis nr. 11';
echo '<br><br>';
echo 'Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300.<br><br>';

$array = [];
foreach(range(1, 101) as $_) {
    $array[] = rand(0, 300);
}
echo 'Pradinis masyvas : ' . implode(', ', $array).'<br><br>';

echo 'Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios.<br><br>';

foreach($array as &$value) {
    $temp = $value;
    $value = null;
    while (in_array($temp, $array)) {
        $temp = rand(0, 300);
    }
    $value = $temp;
}
unset($value);
echo 'Pakeistos pasikartojancios reiksmes : ' . implode(', ', $array).'<br><br>';

echo 'Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų.<br><br>';

rsort($array);
$biggestInMid = [];
foreach($array as $index => $value) {
    $index % 2 == 0 ? $biggestInMid[] = $value : array_unshift($biggestInMid, $value);
}
echo 'Centruotas masyvas : ' . implode(', ', $biggestInMid).'<br><br>';

echo 'Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)<br><br>';

$middleIndex = floor(count($biggestInMid) / 2);
$shifts = 0;
while (array_sum(array_slice($biggestInMid, 0, $middleIndex)) - array_sum(array_slice($biggestInMid, -$middleIndex)) > 30) {
    $temp1 = $biggestInMid[$shifts];
    $temp2 = $biggestInMid[count($biggestInMid) - 1 - $shifts];
    $biggestInMid[$shifts] = $temp2;
    $biggestInMid[count($biggestInMid) - 1 - $shifts] = $temp1;
    $shifts++; 
}


echo 'Prireike ' . $shifts . ' apkeitimu, kol masyvu pusiu sumu skirtumas tapo ' . (array_sum(array_slice($biggestInMid, 0, $middleIndex)) - array_sum(array_slice($biggestInMid, -$middleIndex))).'<br><br>';
echo 'Pirma masyvo puse : ' . implode(', ', array_slice($biggestInMid, 0, $middleIndex)).'<br><br>';
echo 'Vidurine ir didziausia masyvo reiksme : ' . $biggestInMid[$middleIndex].'<br><br>';
echo 'Antra masyvo puse : ' . implode(', ', array_slice($biggestInMid, -$middleIndex));


