<?php
if ((!isset($_GET['name1']) || $_GET['name1'] == '' || !isset($_GET['name2']) || $_GET['name2'] == '') && (!isset($_COOKIE['name1']) || !isset($_COOKIE['name2']))) {
    $print = '<form style="display: flex; justify-content: center; width: 100%";>
                <label>Pirmo zaidejo vardas</label>
                <input type="text" name="name1">
                <label>Antro zaidejo vardas</label>
                <input type="text" name="name2">
                <button type="submit">PRADETI</button>
            </form>';
} else {
    if (!isset($_COOKIE['name1']) || !isset($_COOKIE['name2'])) {
        setcookie('name1', $_GET['name1']);
        setcookie('name2', $_GET['name2']);
    }
    $name1 = $_COOKIE['name1'] ?? $_GET['name1'];
    $name2 = $_COOKIE['name2'] ?? $_GET['name2'];
    $points1 = $_COOKIE['points1'] ?? 0;
    $points2 = $_COOKIE['points2'] ?? 0;
    if (isset($_GET['throw'])) {
        $points = rand(1, 6);
        if ($_GET['throw'] === $name1) {
            $points1 += $points;
            setcookie('points1', $points1);
        } else {
            $points2 += $points;
            setcookie('points2', $points2);
        }
    }
    if (30 <= $points1 || 30 <= $points2) {
        $winner = $points1 > $points2 ? $name1 : $name2;
        $print = '<h1>Nugalejo '.$winner.'</h1>
                <p>'.$name1.' surinko '.$points1.'</p>
                <p>'.$name2.' surinko '.$points2.'</p>
                <a href="http://localhost:8888/bit/phpHomeWorks/webMechanics/11/">Zaisti is naujo</a>';
        setcookie('name1', '', time() - 9999);
        setcookie('name2', '', time() - 9999);
        setcookie('points1', '', time() - 9999);
        setcookie('points2', '', time() - 9999);
    } else {
        $player = (isset($_GET['throw']) && $_GET['throw'] == $name1) ? $name2 : $name1;
        $print = '<div style="display: flex; justify-content: center; flex-wrap: wrap; width: 100%;">
                    <div style="display: grid; place-items: center; width: 50%;">
                        <p style="width: 100%; text-align: right;">'.$name1.': '.$points1.'</p>
                        <p style="width: 100%; text-align: right;">'.$name2.': '.$points2.'</p>
                    </div>
                    <form style="display: grid; place-items: center; width: 50%;">
                        <label style="width: 100%; text-align: center;" for="name1">Metima atliks</label>
                        <input type="submit" name="throw" value="'.$player.'">
                    </form>';
        if (isset($_GET['throw'])) {
            if ($player === $name2) {
                $print .= '<h3 style="text-align: center;">'.$name1.' ismete '.$points.'</h3>';
            } else {
                $print .= '<h3 style="text-align: center;">'.$name2.' ismete '.$points.'</h3>';
            }
        }
        $print .= '</div>';
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice</title>
    <style>
    * { 
        margin: 0;
        color: #222;
    }
    </style>
</head>
<body style='background: #bbb; display: grid; place-items: center;'>

    <p>Suprogramuokite žaidimą. Žaidimas prasideda dviem laukeliais, kuriuose žaidėjai įveda savo vardus ir mygtuku “pradėti”. Šone yra rodomas žaidėjų rezultatas. Paspaudus “pradėti” turi atsirasti pirmo žaidėjo vardas ir mygtukas “mesti kauliuką”. Jį nuspaudus skriptas automatiškai sugeneruoja skaičių nuo 1 iki 6 ir jį prideda prie žaidėjo rezultato, o pirmo žaidėjo vardas pakeičiamas antro žaidėjo vardu (parodo kieno eilė “mesti kauliuką”). Žaidimas tęsiamas iki tol, kol kažkuris žaidėjas surenka 30 taškų. Tada parodomas pranešimas apie laimėjimą ir vėl leidžiama suvesti žaidėjų vardus ir pradėti žaidimą iš naujo.</p>

    <?= $print ?>

</body>
</html>