<h1>Funkcijos 11</h1>

<?php ini_set('memory_limit','32M');?>
<?php

echo 'Uzduotis Nr. 11<br>';
echo 'Sugeneruokite masyvą, kurio ilgis atsitiktinai kinta nuo 10 iki 100. Masyvo reikšmes sudaro atsitiktiniai skaičiai 0-100 ir masyvai Santykis skaičiuojamas atsitiktinai, bet taip, kad skaičiai sudarytų didesnę dalį nei masyvai. Reikšmių masyvų gylis nuo 1 iki 5, o reikšmės analogiškos (nuo 50% iki 100% atsitiktiniai skaičiai 0-100, o likusios masyvai) ir t.t. kol visos galutinės reikšmės bus skaičiai ne masyvai. Suskaičiuoti kiek elementų turi masyvas. Suskaičiuoti masyvo elementų (tie kurie ne masyvai) sumą. Suskaičiuoti maksimalų masyvo gylį. Atvaizduokite masyvą grafiškai . Masyvą pavazduokite kaip div elementą, kuris yra display:flex, kurio viduje yra skaičiai. Kiekvienas div elementas turi savo unikalų id ir unikalią background spalvą (spalva pvz nepavaizduota).<br><br>';

function countArrayElements($array) {
    $countArray = 0;
    $countValue = 0;
    foreach ($array as $inside) {
        is_array($inside) ? $countArray++ : $countValue++ ;
    }
    return ['values' => $countValue, 'arrays' => $countArray];
}

function generateArray($maxDepth, $currentID, $startingID) {
    if ($maxDepth < 1) return;
    $currentDepth = $maxDepth - 1;
    $array = [];
    $length = ($currentID === $startingID) ? rand(10, 100) : rand(1, 5);
    foreach(range(1, $length) as $_) {
        if ($currentDepth < 1) {
            $array[$currentID++] = rand(0, 100);
        } else {
            if (rand(0, 1) == 0) {
                $count = countArrayElements($array);
                if ($count['arrays'] < $count['values']) {
                    $arrayData = generateArray($currentDepth, $currentID, $startingID);
                    $currentID = $arrayData['id'];
                    $array[$currentID++] = $arrayData['array'];
                } else {
                    $array[$currentID++] = rand(0, 100);
                }
                
            } else {
                $array[$currentID++] = rand(0, 100);
            }
        }
    }


    return ['array' => $array, 'id' => $currentID];
}

function uniqueRGB() {
    static $colors = [];
    do {
        $color = 'rgb('.rand(0, 255).', '.rand(0, 255).', '.rand(0, 255).')';
    } while (in_array($color, $colors));
    $colors[] = $color;
    return $color;
}

function renderDOM($array) {
    $dom = "";
    foreach ($array as $id => $inside) {
        if (is_array($inside)) {
            $dom .= "<div id='".$id."' style='display: flex; flex-wrap: wrap; margin: 4px; background-color: ".uniqueRGB()."'>".$id;
            $dom .= renderDOM($inside);
            $dom .= "</div>";
        } else {
            $dom .= "<div id='".$id."' style='display: flex; flex-wrap: wrap; margin: 4px; background-color: ".uniqueRGB()."'>".$id."</div>";
        }
    }
    return $dom;
}

echo $domData = "<div style='display: flex; flex-wrap: wrap; background-color: ".uniqueRGB()."; width: 100vw; height: auto; font-size: 14px;'>".renderDOM(generateArray(20, 1, 1)['array'])."</div>";