<?php
$color = isset($_GET['color']) ? 'red' : 'black';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WM01</title>
</head>
<body style='background: <?= $color ?>; display: grid; place-items: center;'>

    <p style="color: #ddd;">Sukurti puslapį su juodu fonu ir su dviem linkais (nuorodom) į save. Viena nuoroda su failo vardu, o kita nuoroda su failo vardu ir GET duomenų  perdavimo metodu perduodamu kintamuoju color=1. Padaryti taip, kad paspaudus ant nuorodos su perduodamu kintamuoju fonas nusidažytų raudonai, o paspaudus ant nuorodos be perduodamo kintamojo, vėl pasidarytų juodas.</p>

    <a style="color: #ddd;" href="?color=1">su get</a>
    <a style="color: #ddd;" href="http://localhost:8888/bit/phpHomeWorks/webMechanics/01/index.php">su failo vardu</a>

</body>
</html>