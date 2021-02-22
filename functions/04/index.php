<h1>Funkcijos 04</h1>

<?php

echo 'Uzduotis Nr. 4 <br>';
echo 'Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;
<br><br>';

function checkDividers(/* int */ $number) {
    //if (!is_int($number)) return:
    $number = sqrt(pow(intval($number), 2));
    $count = 0;
    $dividers = [];
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) $dividers[] = $i;
    }
    return ['number' => $number, 'dividers' => $dividers, 'count' => count($dividers)];
};

$task4 = checkDividers(rand(-1000, 1000));
echo $task4['count'] == 0 ? 
                        'Skaicius '.$task4['number'].' yra 0, 1 arba pirminis' : 
                        'Skaicius '.$task4['number'].' dalinasi is '.$task4['count'].' skaiciu be liekanos: ['.implode(', ', $task4['dividers']).']';

