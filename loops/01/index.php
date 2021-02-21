<h1>Loops 1</h1>

<?php

echo 'Uzduotis Nr.1';
echo '<br><br>';
echo 'Naršyklėje nupieškite linija iš 401 “*”. Naudodami css stilių “suskaldykite” liniją taip, kad visos žvaigždutės matytųsi ekrane;<br><br>';

$string = str_repeat('*', 401);
echo "<span style='word-wrap: break-word;'> $string </span>";

echo '<br><br>Programiškai “suskaldykite” žvaigždutes taip, kad vienoje eilutėje nebūtų daugiau nei 50 “*”;<br><br>';

for ($i = 0; $i < ceil(mb_strlen($string) / 50); $i++) {
    echo substr($string, ($i * 50), 50).'<br>';
}
