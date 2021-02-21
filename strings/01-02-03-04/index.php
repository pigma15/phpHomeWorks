<h1>Strings 1, 2, 3 and 4</h1>

<?php

echo 'Uzduotis nr. 1';
echo '<br><br>';
echo 'Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus (Jonas Jonaitis). Atspausdinti trumpesnį stringą.<br><br>';

echo $name = 'Christoph';
echo '<br>';
echo $surname = 'Waltz';
echo '<br>';

echo 'shorter - ';
echo strlen($name) <= strlen($surname) ? $name : $surname;
echo '<br><br>';

echo 'Uzduotis nr. 2';
echo '<br><br>';
echo 'Vardą atspausdinti tik didžiosiom raidėm, o pavardę tik mažosioms.<br><br>';

echo strtoupper($name) . ' ' . strtolower($surname);
echo '<br><br>';

echo 'Uzduotis nr. 3';
echo '<br><br>';
echo 'Sukurti trečią kintamąjį ir jam priskirti stringą, sudarytą iš pirmų vardo ir pavardės kintamųjų raidžių. Jį atspausdinti.<br><br>';

echo $initials = $name[0] . '.' . $surname[0] . '.';
echo '<br><br>';

echo 'Uzduotis nr. 4';
echo '<br><br>';
echo 'Sukurti ketvirtą kintamąjį ir jam priskirti stringą, sudarytą iš trijų paskutinių vardo ir pavardės kintamųjų raidžių. Jį atspausdinti.<br><br>';

echo $endNames = substr($name, (strlen($name) - 3), 3).substr($surname, (strlen($surname) - 3), 3);