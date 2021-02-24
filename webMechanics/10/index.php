<?php
if (empty($_POST) && empty($_GET)) {
    $bgColor = '333';
    $fontColor = 'ccc';
    $amount = rand(3, 10);
    header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/10/?amount='.$amount.'&bgColor='.$bgColor.'&fontColor='.$fontColor);
    exit;
}
if (empty($_POST)) {
    $amount = isset($_GET['amount']) ? $_GET['amount'] : 0;
    $bgColor = isset($_GET['bgColor']) ? '#'.$_GET['bgColor'] : '#d4d';
    $fontColor = isset($_GET['fontColor']) ? '#'.$_GET['fontColor'] : '#d4d';
    if (isset($_GET['submitted'])) {
        $checks = isset($_GET['checks']) ? $_GET['checks'] : 0;
        $form = '<span style="display: inline-block; font-size: 30px;">'.$checks.' out of '.$amount.'</span>';
    } else {
        $form = '<form action="" method="post">';
        foreach (range(1, $amount) as $_) {
            $form .= '<input type="checkbox" name="checks[]" value="1">';
        }
        $form .= '<input type="submit" name="check"></form>';
    }
} else {
    $amount = isset($_GET['amount']) ? $_GET['amount'] : 0;
    $bgColor = 'ccc';
    $fontColor = '333';
    $checks = isset($_POST['checks']) ? count($_POST['checks']) : 0;
    header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/10/?amount='.$amount.'&bgColor='.$bgColor.'&fontColor='.$fontColor.'&checks='.$checks.'&submitted=1');
    exit;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>09</title>
</head>
<body style='background: <?=$bgColor?> ; display: grid; place-items: center;'>

    <p style="color: <?=$fontColor?>;">Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota.</p>

    <?=$form?>

    <a style="display: inline-block; color: <?=$fontColor?>;" href="http://localhost:8888/bit/phpHomeWorks/webMechanics/10/">reset</a>
    
</body>
</html>