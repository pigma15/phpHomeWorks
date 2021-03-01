<?php
if (empty($_POST)) {
    $form = '<form method="post">';
    $amount = rand(3, 10);
    foreach (range(3, $amount) as $_) {
        $form .= '<input type="checkbox" name="checks[]" value="1">';
    }
    $form .= '<input type="submit" name="check"></form>';
    $bgColor = '#222';
    $fntColor = '#ccc';
} else {
    $bgColor = '#ddd';
    $fntColor = '#222';
    if(!isset($_POST['checks'])) {
        $form = '<span style="font-size: 36px;"> 0 </span>';
    } else {
        $form = '<span style="font-size: 36px;">'. count($_POST['checks']) .'</span>';
    }
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WM09</title>
</head>
<body style='background: <?=$bgColor?> ; display: grid; place-items: center;'>

    <p style="color: <?=$fntColor?>;">Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) checkbox su raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų į baltą, forma išnyktų ir atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek).</p>

    <?=$form?>

    <a style="color: <?=$fntColor?>;" href="http://localhost:8888/bit/phpHomeWorks/webMechanics/09/">reset</a>
    
</body>
</html>