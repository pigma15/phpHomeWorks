<h1>Funkcijos 03</h1>

<?php

echo 'Uzduotis Nr. 3 <br>';
echo 'Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Jeigu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo uždavinio funkciją ir preg_replace_callback();<br><br>';

function textToH1($text) {
    return "<h1>$text</h1>";
}

$randomString = md5(time());
echo 'Code: '.$randomString;
echo '<br><br>';

function numbersToH1($string) {
    $string = preg_replace_callback('/[a-zA-Z]+/', function($matches){return ' ';}, $string);
    $string = preg_replace_callback('/[0-9]+/', function($matches){return textToH1($matches[0]);}, $string);   
    return $string;
}

echo numbersToH1($randomString);