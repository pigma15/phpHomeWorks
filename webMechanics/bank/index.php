<?php
    session_start();


    if (isset($_POST['newacc']) && $_POST['newacc'] == 'Submit') {

        if (!isset($_POST['name']) || $_POST['name'] == '') {
            $_SESSION['errors']['name'] ='Name can not be empty';
            unset($_SESSION['name']);
        } else {
            if (preg_match('/^[A-Z][a-zA-z\s\'\-]*[a-z]$/', $_POST['name'])) {
                $_SESSION['name'] = htmlspecialchars($_POST['name']);
                unset($_SESSION['errors']['name']);
            } else {
                $_SESSION['errors']['name'] ='Invalid name';
                unset($_SESSION['name']);
            }
        }

        if (!isset($_POST['lastName'])) {
            $_SESSION['errors']['lastName'] ='Last name can not be empty';
            unset($_SESSION['lastName']);
        } else {
            if (preg_match('/^[A-Z][a-zA-z\s\'\-]*[a-z]$/', $_POST['lastName'])) {
                $_SESSION['lastName'] = htmlspecialchars($_POST['lastName']);
                unset($_SESSION['errors']['lastName']);
            } else {
                $_SESSION['errors']['lastName'] ='Invalid last name';
                unset($_SESSION['lastName']);
            }
        }

        $database = json_decode(file_get_contents(__DIR__.'/bank.json'), true);
        if (!isset($_POST['accNr'])) {
            $_SESSION['errors']['accNr'] ='Account number can not be empty';
            unset($_SESSION['accNr']);
        } else {
            $accNr = preg_replace_callback('/\s/', function($a){return '';}, $_POST['accNr']);
            if (preg_match('/^LT[\d]{2}[\d]{5}[\d]{11}$/', $accNr)) {
                foreach($database['users'] as $user) {
                    if ($accNr == $user['accNr']) {
                        $notUniqueAccNr = true;
                        break;
                    }
                }
                if ($notUniqueAccNr) {
                    $_SESSION['errors']['accNr'] ='Account number already exists';
                    unset($_SESSION['accNr']);
                } else {
                    $_SESSION['accNr'] = htmlspecialchars($accNr);
                    unset($_SESSION['errors']['accNr']);
                }
            } else {
                $_SESSION['errors']['accNr'] ='Invalid last account number';
                unset($_SESSION['accNr']);
            }
        }

        if (!isset($_POST['personID'])) {
            $_SESSION['errors']['personID'] ='Personal ID number can not be empty';
            unset($_SESSION['personID']);
        } else {
            if (preg_match('/^[34][\d]{10}$/', $_POST['personID']) && substr($_POST['personID'], 3, 2) < 13 && substr($_POST['personID'], 5, 2) < 32) {
                foreach($database['users'] as $user) {
                    if ($_POST['personID'] == $user['personID']) {
                        $notUniquePersonID = true;
                        break;
                    }
                }
                if ($notUniquePersonID) {
                    $_SESSION['errors']['personID'] ='Personal ID number already exists';
                    unset($_SESSION['personID']);
                } else {
                    $_SESSION['personID'] = htmlspecialchars($_POST['personID']);
                    unset($_SESSION['errors']['personID']);
                }
            } else {
                $_SESSION['errors']['personID'] ='Invalid personal ID number';
                unset($_SESSION['personID']);
            }
        }

        $attributes = ['name', 'lastName', 'accNr', 'personID'];
        foreach($attributes as $value) {
            if (isset($_SESSION['errors'][$value])) $errorFound = true;
        }
        if ($errorFound) {
            header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            exit;
        } else {
            do {
                $id = md5(microtime());
            } while (array_key_exists($id , $database['users']));
            foreach($attributes as $value) {
                $database['users'][$id][$value] = $_SESSION[$value];
                unset($_SESSION[$values]);
            }
            $database['users'][$id]['creditAmount'] = 0;
            file_put_contents(__DIR__.'/bank.json', json_encode($database));
            header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'table.php');
            exit;
        }
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
    <title>Create New Account</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="nav"></div>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <form class="newacc" action="" method="post">
        <h2>Create new account</h2>
        <div class="input">
            <label for="name">First name:</label>
            <input type="text" name="name" placeholder="First name" id="name" value="<?= $_SESSION['name'] ?? '' ?>" >
            <span>
                <?= $_SESSION['errors']['name'] ?? '' ?>
            </span>
        </div>
        <div class="input">
            <label for="lastName">Last name:</label>
            <input type="text" name="lastName" placeholder="Last name" id="lastName" value="<?= $_SESSION['lastName'] ?? '' ?>" >
            <span>
                <?= $_SESSION['errors']['lastName'] ?? '' ?>
            </span>
        </div>
        <div class="input">
            <label for="accNr">Account number:</label>
            <input type="text" name="accNr" placeholder="Account number" id="accNr" value="<?= $_SESSION['accNr'] ?? '' ?>" >
            <span>
                <?= $_SESSION['errors']['accNr'] ?? '' ?>
            </span>
        </div>
        <div class="input">
            <label for="personID">Personal ID number:</label>
            <input type="text" name="personID" placeholder="Personal ID number" id="personID" value="<?= $_SESSION['personID'] ?? '' ?>" >
            <span>
                <?= $_SESSION['errors']['personID'] ?? '' ?>
            </span>
        </div>
        <div class="submit">
            <input class="btn" type="submit" name="newacc" value="Submit">
        </div>
    </form>

</body>
</html>