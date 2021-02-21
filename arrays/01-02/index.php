<h1>Array 1 and 2</h1>

<?php

echo 'Uzduotis nr. 1';
echo '<br><br>';
echo 'Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.<br><br>';

$array = [];
foreach (range(1, 30) as $_) {
    $array[] = rand(5, 25);
}
echo implode(', ', $array).'<br><br>';

echo 'Uzduotis nr. 2A';
echo '<br><br>';
echo 'Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;<br><br>';

$largerThan10 = 0;
$largest = -INF;
$arrayMinusIndex = [];
foreach ($array as $index => $value) {
    if (10 < $value) $largerThan10++;
    if ($largest < $value) $largest = $value;
    $arrayMinusIndex[] = ($array[$index] - $index);
}
echo $largerThan10.'<br><br>';

echo 'Uzduotis nr. 2B';
echo '<br><br>';
echo 'Raskite didžiausią masyvo reikšmę;<br><br>';

echo $largest.'<br><br>';

echo 'Uzduotis nr. 2C';
echo '<br><br>';
echo 'Suskaičiuokite visų reikšmių sumą;<br><br>';

echo array_sum($array).'<br><br>';

echo 'Uzduotis nr. 2D';
echo '<br><br>';
echo 'Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;<br><br>';

echo implode(', ',$arrayMinusIndex).'<br><br>';

echo 'Uzduotis nr. 2E';
echo '<br><br>';
echo 'Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;<br><br>';

foreach (range(1, 10) as $_) {
    $array[] = rand(5, 25);
}
echo implode(', ', $array).'<br><br>';

echo 'Uzduotis nr. 2F';
echo '<br><br>';
echo 'Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;<br><br>';

$oddArray = [];
$evenArray = [];
foreach ($array as $index => $value) {
    $index % 2 === 0 ? $evenArray[] = $value : $oddArray[] = $value;
}
echo 'Lyginiu indeksu skaiciai: ' . implode(', ', $evenArray).'<br>';
echo 'Nelyginiu indeksu skaiciai: ' . implode(', ', $oddArray).'<br><br>';

echo 'Uzduotis nr. 2G';
echo '<br><br>';
echo 'Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;<br><br>';

foreach ($array as $index => &$value) {
    if ($index % 2 == 0 && $value > 15) $value = 0;
}
unset($value);
echo implode(', ', $array).'<br><br>';

echo 'Uzduotis nr. 2H';
echo '<br><br>';
echo 'Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;<br><br>';

$firstLargerThan10Index = null;
foreach ($array as $index => $value) {
    if (10 < $value) {
        $firstLargerThan10Index = $index;
        break;
    }
}
echo 'Indekas: '.$firstLargerThan10Index.'<br><br>';

echo 'Uzduotis nr. 2I';
echo '<br><br>';
echo 'Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;<br><br>';

foreach ($array as $index => $value) {
    if ($index % 2 == 0) unset($array[$index]);
}
echo '<pre>';
print_r($array);



