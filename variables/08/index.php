<h1>Strings 8</h1>

<?php

echo 'Uzduotis nr. 8';
echo '<br><br>';
echo "Stringe, kurį generuoja toks kodas: 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope'; Surasti ir atspausdinti epizodo numerį.<br><br>";

echo $stringSW = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
echo '<br>';

foreach(range(1, 9) as $value) {
    if (str_contains($stringSW, $value)) {
        echo "Epizodas: $value";
        break;
    }
}
