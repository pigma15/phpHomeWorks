<h1>Funkcijos 01</h1>

<?php

echo 'Uzduotis Nr. 1 <br>';
echo 'Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;';

function textToH1($text) {
    return "<h1>$text</h1>";
}
echo textToH1('tekstas shmekstas');

_d('hello, kotlet');