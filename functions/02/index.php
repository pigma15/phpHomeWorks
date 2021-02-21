<h1>Funkcijos 02</h1>

<?php

echo 'Uzduotis Nr. 2 <br>';
echo 'Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;';

function textToH($text, $h) {
    return "<h$h>$text</h$h>";
}

echo textToH('tekstas su keiciamu h', rand(1, 6));