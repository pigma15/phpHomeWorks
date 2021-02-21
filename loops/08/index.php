<h1>Loops 8</h1>

<?php

echo 'Uzduotis Nr. 8';
echo '<br><br>';
echo 'Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą, kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės HSL spalvos (perkrovus puslapį spalvos turi keistis).<br><br>';

$rombAxis = 21;
$rombSmaller = 0;
$rombLarger = 0;
$repeatMiddle = 0;

if ($rombAxis % 2 === 0) {
    $rombSmaller = ($rombAxis / 2) - 1;
    $rombLarger = ($rombAxis / 2);
    $repeatMiddle = 1;
} else {
    $rombSmaller = $rombLarger = floor($rombAxis / 2);
}

$isHalfReached = false;
for ($y = 0; $y < $rombAxis; $y++) {
    for ($x = 0 ; $x < $rombAxis; $x++) {
        if ($x < $rombSmaller || $x > $rombLarger) {
            echo "<span style='color: #333;'>0</span>";
        } else {
            $tempColor = rand(0, 360);
            echo "<span style='color: hsl($tempColor, 80%, 50%);'>*</span>";
        }
    }
    echo '<br>';
    if ($rombSmaller > 0 && !$isHalfReached) {
        $rombSmaller--;
        $rombLarger++;
    } else {
        if ($repeatMiddle === 1) {
            $repeatMiddle--;
        } else {
            $rombSmaller++;
            $rombLarger--;
            $isHalfReached = true;
        }     
    }
}