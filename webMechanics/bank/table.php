<?php
    session_start();
    $database = json_decode(file_get_contents(__DIR__.'/bank.json'), true);

    if (!empty($_POST)) {
        if (isset($_POST['change'])) {
            if (isset($_POST['amount']) && preg_match('/^[0-9]+[.]?[0-9]{0,2}$/', $_POST['amount'])) {
                if (isset($_POST['id']) && array_key_exists($_POST['id'], $database['users'])) {
                    if ('add' == $_POST['change']) {
                        $database['users'][$_POST['id']]['creditAmount'] += $_POST['amount'];
                        file_put_contents(__DIR__.'/bank.json', json_encode($database));
                        session_destroy();
                        header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
                        exit;
                    } elseif ('remove' == $_POST['change']) {
                        if (0 <= ($database['users'][$_POST['id']]['creditAmount'] - $_POST['amount'])) {
                            $database['users'][$_POST['id']]['creditAmount'] -= $_POST['amount'];
                            file_put_contents(__DIR__.'/bank.json', json_encode($database));
                            session_destroy();
                            header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']);
                            exit;
                        } else {
                            $_SESSION['errors'][$_POST['id']] = 'Not enough credit';
                            header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?error=');
                            exit;
                        }
                    }
                }
            } else {
                $_SESSION['errors'][$_POST['id']] = 'Invalid value';
                header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?error=');
                exit;
            }
        } elseif (isset($_POST['delete'])) {
            
        }
    }



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
        $error = (isset($_SESSION['errors'][$id]) && array_key_exists($id, $_SESSION['errors'])) ? $_SESSION['errors'][$id] : '';
        $table .= '<div class="line" style="'.$lineStyle.'">';
        foreach($user as $key => $value) {
            $gridSpan = 1;
            if ('accNr' == $key) $gridSpan = 2;
            if ('personID' == $key) $gridSpan = 2;
            $table .= '<div class="value" style="grid-column: auto / span '.$gridSpan.'">'.$value.'</div>';
        }
        $table .= '<form class="actions" style="grid-column: auto / span 3" method="post">
                    <input class="remove hidden" type="submit" name="change" id="remove'.$id.'" value="remove">
                    <label for="remove'.$id.'">-</label>
                    <input class="amount" type="text" name="amount" value="">
                    <input class="add hidden" type="submit" name="change" id="add'.$id.'" value="add">
                    <label for="add'.$id.'">+</label>
                    <input class="delete hidden" type="submit" name="delete" id="delete'.$id.'" value="delete">
                    <label for="delete'.$id.'">DELETE</label>
                    <input type="hidden" name="id" value="'.$id.'">
                    <span>'. $error .'</span>
                </form></div>';
        unset($_SESSION['errors'][$id]);
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
    <link rel="stylesheet" href="./resources/sass/main.css">
</head>
<body>
    <div class="nav"></div>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <div class="table">
        <?= $table ?? '' ?>
    </div>
</body>
</html>