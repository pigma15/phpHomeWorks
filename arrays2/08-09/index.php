<h1>Arrays2 8 and 9</h1>

<?php

echo 'Uzduotis nr. 8';
echo '<br><br>';
echo 'Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.<br><br>';

function printArrays($array) {
    foreach ($array as $index => $inside) {
        echo $index . '. [';
        if (is_array($inside)) {
            echo implode(', ', $inside).'] sum: '.array_sum($inside).'<br>';
        } else {
            echo $inside . '] sum: ' .$inside.'<br>';
        }
    }
    echo '<br>';
}

$dynamicArray = [];
foreach(range(1, 10) as $_) {
    $length = rand(0, 5);
    if ($length === 0) {
        $dynamicArray[] = rand(0, 10);
    } else {
        $temp = [];
        foreach(range(1, $length) as $_) {
            $temp[] = rand(0, 10);
        }
        $dynamicArray[] = $temp;
    }
}

printArrays($dynamicArray);



echo 'Uzduotis nr. 9';
echo '<br><br>';
echo 'Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.<br><br>';

function arraySort($a, $b) {
    if (is_array($a)) $a = array_sum($a);
    if (is_array($b)) $b = array_sum($b);
    return ($a <=> $b);
}

usort($dynamicArray, "arraySort");

printArrays($dynamicArray);







