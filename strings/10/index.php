<h1>Strings 10</h1>

<?php

echo 'Uzduotis nr. 10';
echo '<br><br>';
echo 'Parašyti kodą, kuris generuotų atsitiktinį stringą iš lotyniškų mažųjų raidžių. Stringo ilgis 3 simboliai.<br><br>';

$abc = range('a','z');
$randString = '';
foreach (range(1, 3) as $_) {
    $randString .= array_rand(array_flip($abc));
}
echo $randString;