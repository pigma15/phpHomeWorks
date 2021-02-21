<h1>Arrays2 5, 6 and 7</h1>

<?php

echo 'Uzduotis nr. 5';
echo '<br><br>';
echo 'Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100.<br><br>';

$users = [];
foreach (range(1, 30) as $_) {
    do {
        $tempID = rand(1,1000000);
    } while (in_array($tempID, array_column($users, 'user_id')));
    $users[] = ['user_id' => $tempID, 'place_in_row' => rand(0,100)];
}
echo '<pre>';
print_r($users);
echo '<br><br>';

echo 'Uzduotis nr. 6';
echo '<br><br>';
echo 'Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka. Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.<br><br>';

function sortByID($a, $b) {
    return $a['user_id'] <=> $b['user_id'];
}
usort($users, 'sortByID');
echo 'Isrusiuota pagal ID:<br>';
echo '<pre>';
print_r($users);
echo '<br><br>';

function sortByPlace($a, $b) {
    return $b['place_in_row'] <=> $a['place_in_row'];
}
usort($users, 'sortByPlace');
echo 'Isrusiuota pagal Place:<br>';
echo '<pre>';
print_r($users);
echo '<br><br>';

echo 'Uzduotis nr. 7';
echo '<br><br>';
echo 'Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.<br><br>';

$latinABC = range('a', 'z');
foreach($users as &$user) {
    $name = '';
    $nameLength = rand(5, 15);
    $surname = '';
    $surnameLength = rand(5, 15);
    for ($i = 0; $i < $nameLength; $i++) {
        $name .= ($i === 0) ? strtoupper(array_rand(array_flip($latinABC))) : array_rand(array_flip($latinABC));
    }
    $user['name'] = $name;
    for ($i = 0; $i < $surnameLength; $i++) {
        $surname .= ($i === 0) ? strtoupper(array_rand(array_flip($latinABC))) : array_rand(array_flip($latinABC));
    }
    $user['surname'] = $surname;
}
unset($user);

echo '<pre>';
print_r($users);
echo '<br><br>';