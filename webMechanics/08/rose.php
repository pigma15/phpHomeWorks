<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/08/pink.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose</title>
</head>
<body style='background: violet; display: grid; place-items: center;'>

    <p style="color: #222;">Sukurkite du puslapius pink.php ir rose.php. Nuspalvinkite juos atitinkamo spalvom. Į pink.php puslapį įdėkite formą su POST metodu ir mygtuku “GO TO ROSE”. Formą nukreipkite, kad ji atsidarinėtų rose.php puslapyje. Padarykite taip, kad surinkus naršyklėje tiesiogiai adresą į rose.php puslapį, naršyklė būtų peradresuojama į pink.php puslapį.</p>
    
</body>
</html>