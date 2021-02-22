<h1>Arrays2 10</h1>

<?php

echo 'Uzduotis nr. 10';
echo '<br><br>';
echo 'Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvu atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.<br><br>';

$symbols = ['#','%','+','*','@','裡'];

$size = 1.6;
$axis = 10;

$squareData = [];
foreach(range(1, $axis) as $index => $_) {
    foreach(range(1, $axis) as $_) {
        $tempHex = '#'.substr(md5(rand()), 0, 6);
        $squareData[$index][] = ['value' => $symbols[rand(0, (count($symbols) - 1))], 'color' => $tempHex];
    }
}

$blockSize = (30 * $size);
$blockSizeToString = $blockSize.'px';
$fontSize = ($blockSize / 2.5).'px';
$squareSize = ($blockSize * $axis).'px';
$div = "<div style='display: grid; grid-template-columns: repeat($axis, 1fr); grid-template-rows: repeat($axis, 1fr); width: $squareSize; height: $squareSize;'>";
foreach($squareData as $line) {
    foreach($line as $symbol) {
        $value = $symbol['value'];
        $color = $symbol['color'];
        $red = intval(hexdec(mb_substr($color, 1, 2)) / 2);
        $green = intval(hexdec(mb_substr($color, 3, 2)) / 2);
        $blue = intval(hexdec(mb_substr($color, 5, 2)) / 2);
        $fontColor = 'rgb('.$red.','.$green.','.$blue.')';
        $div .= "<div style='display: grid; place-items: center; width: $blockSizeToString; height: $blockSizeToString; margin: 0; background: $color; box-shadow: 0px 0px 8px 4px inset #333d, 0px 0px 3px 1px $color;'><span style='color: $fontColor; text-shadow: 1px 2px 10px $fontColor; font-size: $fontSize'> $value </span></div>";
    }
    
}
echo $div .= '</div>';