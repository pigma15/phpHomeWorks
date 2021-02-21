<h1>Strings 11</h1>

<?php

echo 'Uzduotis nr. 11';
echo '<br><br>';
echo 'Parašykite kodą, kuris generuotų atsitiktinį stringą su 10 atsitiktine tvarka išdėliotų žodžių, o žodžius generavimui imtų iš 9-me uždavinyje pateiktų dviejų stringų. Žodžiai neturi kartotis. (reikės masyvo)<br><br>';

$juice = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$juiceLt = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";

$wordLibrary = array_merge(explode(" ", $juice) , explode(" ",str_replace(',','', $juiceLt)));
$string = array_rand(array_flip($wordLibrary));
foreach (range(1, 9) as $_) {
    do {
        $word = array_rand(array_flip($wordLibrary));
    } while (str_contains($string, $word));
    $string .= ' '.$word;
}
echo $string;