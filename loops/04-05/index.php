<h1>Loops 4 and 5</h1>

<?php

echo 'Uzduotis Nr. 4';
echo '<br><br>';
echo 'Nupieškite kvadratą iš “*”, kurio kraštines sudaro 40 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.<br><br>';

$axis = 40;
$squareSize = ($axis * 10).'px';

$squareDiv = "<div style='display: grid; grid-template-columns: repeat($axis, 1fr); grid-template-rows: repeat($axis, 1fr); width: $squareSize; height: $squareSize;'>";

$stars = str_repeat("<div class='star' style='display: grid; place-items: center; width: 10px; height: 10px; color: #aaa;'>*</div>", ($axis * $axis));

$squareDiv .= $stars;
echo $squareDiv .= '</div>';
echo '<br><br>';

echo 'Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines.<br><br>';

echo $uzduotisNr5 = "<button id='square' style='display: grid; place-items: center; width: 100px; height: 40px; font-size: 16px; cursor: pointer;'>Uzduotis Nr. 5</button>";


?>

<script>

const squareDOM = document.querySelector('#square');
const starsDOMs = document.querySelectorAll('.star');
const axisSize = Math.sqrt(starsDOMs.length);

squareDOM.onclick = () => {
    let lastInRow = axisSize - 1;
    let firstInRow = 0;
    for (let x = 0; x < axisSize; x++, lastInRow--, firstInRow++) {
        starsDOMs[lastInRow + (x * axisSize)].style.color = 'red';
        starsDOMs[firstInRow + (x * axisSize)].style.color = 'red';
    }
    return;
}

</script>