<h1>Loops 10</h1>

<?php

echo 'Uzduotis Nr. 10';
echo '<br><br>';
echo 'Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).<br><br>';

echo 'A. “Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.<br><br>';

$shortHitCount = 0;
foreach (range(1, 5) as $_) {
    $howDeepIsTheNail = 0;
    while ($howDeepIsTheNail < 85) {
        $howDeepIsTheNail += rand(5, 20);
        $shortHitCount++;
    }
}
echo "Prireike $shortHitCount silpnu smugiu.<br><br>";

echo 'B. “Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() funkcija tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių.<br><br>';

$hardHitCount = 0;
$hardHitMissedCount = 0;
foreach (range(1, 5) as $_) {
    $howDeepIsTheNail = 0;
    while ($howDeepIsTheNail < 85) {
        rand(0, 1) === 0 ? $howDeepIsTheNail += rand(20, 30) : $hardHitMissedCount++;
        $hardHitCount++;
    }
}
echo "Prireike $hardHitCount stipriu smugiu, is kuriu $hardHitMissedCount skriejo pro sali.";