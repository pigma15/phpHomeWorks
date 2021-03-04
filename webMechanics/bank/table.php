<?php
    require __DIR__.'/bootstrap.php';
    if (!isset($_SESSION['login']) || 'ok' != $_SESSION['login']) {
        header('Location: '.URL);
    }
    
    unset($_SESSION['create']);
    $database = readData();

    if (!empty($_POST)) {
        if (isset($_POST['restore']) && isset($_SESSION['deleted'])){
            restoreAccount($database);
        }
        
        if(!isset($_POST['id']) || !array_key_exists($_POST['id'], $database['users'])) {
            header('Location: '.URL.'table.php');
            exit;
        }
        if (isset($_POST['change'])) {
            if (isset($_POST['amount']) && preg_match('/^[0-9]+[.]?[0-9]{0,2}$/', $_POST['amount'])) {
                changeAmount($_POST['id'], $_POST['amount'], $_POST['change'], $database);
            } else {
                $_SESSION['table']['errors'][$_POST['id']] = 'Invalid value';
                header('Location: '.URL.'table.php');
                exit;
            }
        }
        if (isset($_POST['delete'])) {
            deleteAccount($_POST['id'], $database);
        }
    }

    $table = generateTable($database);
    unset($_SESSION['table']['errors']);
    unset($_SESSION['private']['id']);
    $backgroundImage = backgroundImage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account list</title>
    <link rel="stylesheet" type="text/css" href="./resources/sass/main.css?<?= time() ?>" />
</head>
<body>
    <?= navBar() ?>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <div class="table">
        <?= $table ?? '' ?>
    </div>

<script>
    const dom = document.querySelector('#fullscreen');
    const button = document.querySelector('#close');
    if (dom) {
        button.addEventListener('click', () => {
            dom.classList.add('hidden');
            return;
        })
    }
</script>
</body>
</html>