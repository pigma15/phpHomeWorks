<?php
require __DIR__.'/bootstrap.php';
if (!isset($_SESSION['login']) || 'ok' != $_SESSION['login']) {
    header('Location: '.URL);
    exit;
}
$database = readData();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userID'])) {
        $_SESSION['private']['userID'] = $_POST['userID'];
        header('Location: '.URL.'private.php');
        exit;
    }
    if(!isset($_POST['id']) || !array_key_exists($_POST['id'], $database['users'])) {
        header('Location: '.URL.'table.php');
        exit;
    }
    if (isset($_POST['change'])) {
        if (isset($_POST['amount']) && preg_match('/^[0-9]+[.]?[0-9]{0,2}$/', $_POST['amount'])) {
            changeAmount($_POST['id'], $_POST['amount'], $_POST['change'], $database, 'private');
        } else {
            $_SESSION['private']['errors'][$_POST['id']] = 'Invalid value';
            header('Location: '.URL.'private.php');
            exit;
        }
    }
    if (isset($_POST['delete'])) {
        deleteAccount($_POST['id'], $database, 'private');
    }
}
if (!isset($_SESSION['private']['userID']) || !array_key_exists($_SESSION['private']['userID'], $database['users'])) {
    header('Location: '.URL.'table.php');
    exit;
}
$user = $database['users'][$_SESSION['private']['userID']];
$userTransactions = array_filter($database['transactions'], function($transaction) {
    return $transaction['accountID'] == $_SESSION['private']['userID'];
});
/* foreach($database['transactions'] as $transaction) {
    if ($transaction['accountID'] == $_SESSION['private']['userID']) $userTransactions[] = $transaction;
} */

$error = $_SESSION['private']['errors'][$_SESSION['private']['userID']] ?? '';
unset($_SESSION['private']['errors']);
$backgroundImage = backgroundImage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$user['name'].' '.$user['lastName']?></title>
    <link rel="stylesheet" type="text/css" href="./resources/sass/main.css?<?= time() ?>" />
</head>
<body>
    <?= navBar() ?>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <div class="private">
        <div class="user">
            <h2><?=$user['name'].' '.$user['lastName']?></h2>
            <span><u>Account created:</u> <?=$user['creation']?></span>
            <span><u>Personal ID nr:</u> <?=$user['personID']?></span>
            <span><u>Account nr:</u> <?=$user['accNr']?></span>
            <span class="balance"><u>Current balance:</u> <?=$user['creditAmount']?></span>
            
            <form class="actions" method="post">
                <input class="delete hidden" type="submit" name="delete" id="delete" value="delete">
                <label class="delete" for="delete">DELETE</label>
                <input class="remove hidden" type="submit" name="change" id="remove" value="remove">
                <label for="remove">-</label>
                <input class="amount" type="text" name="amount" value="">
                <input class="add hidden" type="submit" name="change" id="add" value="add">
                <label for="add">+</label>
                <input type="hidden" name="id" value="<?=$_SESSION['private']['userID']?>">
                <span><?=$error?></span>
            </form>
        </div>
        <div class="transactions">
            <h2>Transaction history:</h2>
            <?php foreach($userTransactions as $transaction) : ?>
                <span><?=$transaction['time']?></span>
                <span style="color: <?= 0 > $transaction['amount'] ? '#911' : '#191'?>"><?=$transaction['amount']?></span>            
            <?php endforeach ?>
        </div>
    </div>

<script>
    addEventListener('keypress', (e) => {
        if ('Enter' == e.key) {
            e.preventDefault();
        }
    })
</script>

</body>
</html>