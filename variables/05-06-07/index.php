<h1>Strings 5, 6 and 7</h1>

<?php

echo 'Uzduotis nr. 5';
echo '<br><br>';
echo 'Sukurti kintamąjį su stringu: “An American in Paris”. Jame visas “a” (didžiąsias ir mažąsias) pakeisti žvaigždutėm “*”.  Rezultatą atspausdinti.<br><br>';

echo $american = 'An American in Paris';
echo '<br>';
echo str_replace(['a','A'],'*',$american);
echo '<br><br>';

echo 'Uzduotis nr. 6';
echo '<br><br>';
echo 'Sukurti kintamąjį su stringu: “An American in Paris”. Suskaičiuoti visas “a” (didžiąsias ir mažąsias) raides. Rezultatą atspausdinti.<br><br>';

$countA = 0;
foreach (str_split($american) as $letter) {
if (strtolower($letter) === 'a') $countA++;
}
echo "$countA 'a' raides frazeje '$american'";
echo '<br><br>';

echo 'Uzduotis nr. 7';
echo '<br><br>';
echo "Sukurti kintamąjį su stringu: “An American in Paris”. Jame ištrinti visas balses. Rezultatą atspausdinti. Kodą pakartoti su stringais: “Breakfast at Tiffany's', '2001: A Space Odyssey' ir 'It's a Wonderful Life'.<br><br>";

$vowels = ['a','A','e','E','i','I','o','O','u','U'];

echo $american . ' -> ' .  str_replace($vowels,'',$american).'<br>';
$breakfast = "Breakfast at Tiffany's";
echo $breakfast . ' -> ' .  str_replace($vowels,'',$breakfast).'<br>';
$kubrick = '2001: A Space Odyssey';
echo $kubrick . ' -> ' .  str_replace($vowels,'',$kubrick).'<br>';
$its = "It's a Wonderful Life";
echo $its . ' -> ' .  str_replace($vowels,'',$its);