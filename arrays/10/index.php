<h1>Array 10</h1>

<?php

echo 'Uzduotis nr. 10';
echo '<br><br>';
echo 'Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.<br><br>';

$randomFib = [];
for ($i = 0; $i < 10; $i++) {
    if ($i < 2) {
        $randomFib[] = rand(5, 25);
    } else {
        $randomFib[] = ($randomFib[$i - 2] + $randomFib[$i - 1]);
    }
}

echo 'Atsitiktines pradzios Fibonacio seka: ' . implode(', ', $randomFib);