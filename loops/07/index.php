<h1>Loops 7</h1>

<?php

echo 'Uzduotis Nr. 7';
echo '<br><br>';
echo 'Kazys ir Petras žaidžiai šaškėm. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų.<br><br>';

$petrasPoints = 0;
$kazysPoints = 0;
$isWeHaveAWinner = false;

while (!$isWeHaveAWinner) {
    $petrasPoints += rand(10, 20);
    if($petrasPoints >= 222) {
        echo "Petro taskai: $petrasPoints. Kazio taskai: $kazysPoints. Laimejo Petras.";
        echo '<br>';
        $isWeHaveAWinner = true;
        break;
    }
    $kazysPoints += rand(5, 25);
    if($kazysPoints >= 222) {
        echo "Petro taskai: $petrasPoints. Kazio taskai: $kazysPoints. Laimejo Kazys.";
        echo '<br>';
        $isWeHaveAWinner = true;
    }
}