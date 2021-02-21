<h1>Strings 9</h1>

<?php

echo 'Uzduotis nr. 9';
echo '<br><br>';
echo "Suskaičiuoti kiek stringe “Don't Be a Menace to South Central While Drinking Your Juice in the Hood” yra žodžių trumpesnių arba lygių nei 5 raidės. Pakartokite kodą su stringu “Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale”.<br><br>";

echo $juice = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
echo '<br>';

$juiceCount = 0;
foreach (explode(" ",$juice) as $word) {
    if (strlen(str_replace("'",'', $word)) <= 5) {
        $juiceCount++;
        echo $word . ' ';
    }
}
echo '<br>';
echo 'Ne ilgesniu nei 5 raides zodziu yra ' . $juiceCount.'<br><br>';

echo $juiceLt = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";
echo '<br>';

$juiceLtCount = 0;
foreach (explode(" ", $juiceLt) as $word) {
    if (mb_strlen(str_replace(',','', $word), 'UTF-8') <= 5) {
        $juiceLtCount++;
        echo $word . ' ';
    }
}
echo '<br>';
echo 'Ne ilgesniu nei 5 raides zodziu yra ' . $juiceLtCount;