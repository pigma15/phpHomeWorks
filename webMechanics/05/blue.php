<?php
if(isset($_GET['swap'])) {
    header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/05/red.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue</title>
</head>
<body style='background: #119'>
<a style='color: #aaa; background: #aaa4;'href="?swap=">SWAP</a>

    <p style="color: #aaa;">Sukurkite du atskirus puslapius blue.php ir red.php Juose sukurkite linkus į pačius save (abu į save ne į kitą puslapį!). Padarykite taip, kad paspaudus ant  linko puslapis ne tiesiog persikrautų, o PHP kodas (ne tiesiogiai html tagas!) naršyklę peradresuotų į kitą puslapį (iš raudono į mėlyną ir atvirkščiai).</p>
    
</body>
</html>