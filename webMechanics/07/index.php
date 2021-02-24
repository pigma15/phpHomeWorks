<?php 

if(!empty($_POST)) {
    header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/07/');
    exit;
}
if (!empty($_GET)) {
    $color = 'green';
} else {
    $color = 'yellow';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06</title>
</head>
<body style="background: <?= $color ?>; display: grid; place-items: center;">
    
    <p style="color: #111;">Pakartokite 6 uždavinį. Papildykite jį kodu, kuris naršyklę po POST metodo peradresuotų tuo pačiu adresu (t.y. į patį save) jau GET metodu.</p>

    <form action="" method="get">
        <input type="submit" name="isGet" value="GET">
    </form>

    <form action="" method="post">
        <input type="submit" name="isPost" value="POST">
    </form>

</body>
</html>