<?php
    $color = isset($_GET['color']) ? $color = '#'.$_GET['color'] : '#333';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WM03</title>
</head>
<body style='background: <?= $color ?>; display: grid; place-items: center;'>

    <p style="color: #ddd;">Perdarykite 2 uždavinį taip, kad spalvą būtų galimą įrašyti į laukelį ir ją išsiųsti mygtuku GET metodu formoje.</p>

    <form action="" method="get">
        <input type="text" name="color">
        <input type="submit">
    </form>

</body>
</html>