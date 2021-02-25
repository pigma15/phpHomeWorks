<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color = 'yellow';
} else {
    $color = 'green';
}

/* if(!empty($_POST)) {
    header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/06/');
    exit;
}
if (!empty($_GET)) {
    $color = 'green';
} else {
    $color = 'yellow';
} */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WM06</title>
</head>
<body style="background: <?= $color ?>; display: grid; place-items: center;">
    
    <p style="color: #111;">Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas formas- vieną GET ir kitą POST. Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių, o tik tikrindami pačius masyvus, nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos ir geltonai- kai iš POST.</p>

    <form action="" method="get">
        <input type="submit" value="GET">
    </form>

    <form action="" method="post">
        <input type="submit" value="POST">
    </form>

</body>
</html>