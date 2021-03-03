<?php
    require __DIR__.'/bootstrap.php';
    $database = readData();
    $attributes = ['name', 'lastName', 'accNr', 'personID'];

    if(!isset($_GET['error'])) {
        foreach($attributes as $value) {
            if ('accNr' != $value) {
                unset($_SESSION['create'][$value]);
                unset($_SESSION['create']['errors'][$value]);
            }
        }
    }

    if (!isset($_SESSION['create']['accNr'])) $_SESSION['create']['accNr'] = generateAccountNumber($database['users']);

    if (isset($_POST['newacc']) && $_POST['newacc'] == 'Submit') {

        if(isset($_POST['name']) && checkName($_POST['name'])) {
            $_SESSION['create']['name'] =  $_POST['name'];
            unset($_SESSION['create']['errors']['name']);
        } else {
            $_SESSION['create']['errors']['name'] ='Invalid name';
            unset($_SESSION['create']['name']);
        }

        if(isset($_POST['lastName']) && checkName($_POST['lastName'])) {
            $_SESSION['create']['lastName'] =  $_POST['lastName'];
            unset($_SESSION['create']['errors']['lastName']);
        } else {
            $_SESSION['create']['errors']['lastName'] ='Invalid last name';
            unset($_SESSION['create']['lastName']);
        }

        if (isset($_POST['personID']) && checkPersonID($_POST['personID'], $database['users'])) {
            $_SESSION['create']['personID'] = $_POST['personID'];
            unset($_SESSION['create']['errors']['personID']);
        } else {
            $_SESSION['create']['errors']['personID'] ='Invalid personal ID number';
            unset($_SESSION['create']['personID']);
        }

        if (!checkAccountNr($_SESSION['create']['accNr'], $database['users'])) {
            $_SESSION['create']['errors']['accNr'] ='Invalid account number';
            unset($_SESSION['create']['accNr']);
        }

        foreach($attributes as $value) {
            if (isset($_SESSION['create']['errors'][$value])) {
                header('Location: '.URL.'create.php?error=');
                exit;
            }
        }

        do {
            $id = md5(microtime());
        } while (array_key_exists($id , $database['users']));
        foreach($attributes as $value) {
            $database['users'][$id][$value] = $_SESSION['create'][$value];
        }
        $database['users'][$id]['creditAmount'] = 0;
        writeData($database);
        unset($_SESSION['create']);
        header('Location: '.URL.'table.php');
        exit;
    }

    $backgroundImage = backgroundImage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <link rel="stylesheet" type="text/css" href="./resources/sass/main.css?<?= time() ?>" />
</head>
<body>
    <div class="nav"></div>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <form class="newacc" action="" method="post">
        <h2>Create new account</h2>
        <div class="input">
            <label for="name">First name:</label>
            <input type="text" name="name" placeholder="First name" id="name" value="<?= $_SESSION['create']['name'] ?? '' ?>" >
            <span class="error">
                <?= $_SESSION['create']['errors']['name'] ?? '' ?>
            </span>
        </div>
        <div class="input">
            <label for="lastName">Last name:</label>
            <input type="text" name="lastName" placeholder="Last name" id="lastName" value="<?= $_SESSION['create']['lastName'] ?? '' ?>" >
            <span class="error">
                <?= $_SESSION['create']['errors']['lastName'] ?? '' ?>
            </span>
        </div>
        <div class="input">
            <label>Account number:</label>
            <span class="accNr"><?= $_SESSION['create']['accNr'] ?? '' ?></span>
            <span class="error">
                <?= $_SESSION['create']['errors']['accNr'] ?? '' ?>
            </span>
        </div>
        <div class="input">
            <label for="personID">Personal ID number:</label>
            <input type="text" name="personID" placeholder="Personal ID number" id="personID" value="<?= $_SESSION['create']['personID'] ?? '' ?>" >
            <span class="error">
                <?= $_SESSION['create']['errors']['personID'] ?? '' ?>
            </span>
        </div>
        <div class="submit">
            <input class="btn" type="submit" name="newacc" value="Submit">
        </div>
    </form>

</body>
</html>