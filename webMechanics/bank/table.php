<?php
    session_start();

    $database = json_decode(file_get_contents(__DIR__.'/bank.json'), true);
    $lineLength = count(end($database['users']));
    $lineStyle = 'grid-template-columns: repeat('.($lineLength + 5).', 1fr)';

    $table = '<h2>Accounts</h2>
            <div class="contents" style="'.$lineStyle.'">
                <span style="grid-column: auto / span 1">First name</span>
                <span style="grid-column: auto / span 1">Last name</span>
                <span style="grid-column: auto / span 2">Account number</span>
                <span style="grid-column: auto / span 2">Personal ID</span>
                <span style="grid-column: auto / span 1">Balance</span>
                <span style="grid-column: auto / span 3">Actions</span>
            </div>';

    foreach($database['users'] as $id => $user) {
        $table .= '<div class="line" style="'.$lineStyle.'">';
        foreach($user as $key => $value) {
            $gridSpan = 1;
            if ('accNr' == $key) $gridSpan = 2;
            if ('personID' == $key) $gridSpan = 2;
            $table .= '<div class="value" style="grid-column: auto / span '.$gridSpan.'">'.$value.'</div>';
        }
        $table .= '<form class"buttons" style="grid-column: auto / span 3">
                    <input class"add" type="submit" name="add" value="Add credit">
                    <input class"remove" type="submit" name="remove" value="Remove credit">
                    <input class"delete" type="submit" name="delete" value="Delete account">
                    <input type="hidden" name="id" value="'.$id.'">
                </form></div>';

    }


    $backgroundImages = ['adequatecouple.jpeg', 'crazylife.jpeg', 'happyrain1.jpeg', 'happyrain2.jpeg', 'highfive.jpg', 'moneyaura.jpeg'];
    $backgroundImage = $backgroundImages[rand(0, count($backgroundImages) - 1)];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account list</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="nav"></div>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <div class="table">
        <?= $table ?? '' ?>
    </div>
</body>
</html>