<h1>Loops 6</h1>

<?php

echo 'Uzduotis Nr. 6';
echo '<br><br>';
echo 'Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite tris skirtingus scenarijus kai monetos metimą stabdome:<br><br>';

echo 'Iškritus skaičiui;<br>';
$isUnoMoneto = false;
while (!$isUnoMoneto) {
    $temp = rand(0,1);
    if ($temp === 0) {
        echo 'H ';
    } else {
        echo 'S ';
        $isUnoMoneto = true;
    }
}
echo '<br><br>';

echo 'Tris kartus iškritus skaičiui;<br>';
$isTrioMoneto = 0;
while ($isTrioMoneto < 3) {
    $temp = rand(0,1);
    if ($temp === 0) {
        echo 'H ';
    } else {
        echo 'S ';
        $isTrioMoneto++;
    }
}
echo '<br><br>';

echo 'Tris kartus iš eilės iškritus skaičiui;<br>';
$isTrioRepetitivoMoneto = 0;
while ($isTrioRepetitivoMoneto < 3) {
    $temp = rand(0,1);
    if ($temp === 0) {
        echo 'H ';
        $isTrioRepetitivoMoneto = 0;
    } else {
        echo 'S ';
        $isTrioRepetitivoMoneto++;
    }
}