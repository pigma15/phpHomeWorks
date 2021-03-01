<?php
    $backgroundImages = ['adequatecouple.jpeg', 'crazylife.jpeg', 'happyrain1.jpeg', 'happyrain2.jpeg', 'highfive.jpg', 'moneyaura.jpeg'];
    $backgroundImage = $backgroundImages[rand(0, count($backgroundImages) - 1)];
    if (isset($_GET['newacc'])) {
        echo '<h1 style="background: white">';
        if (!isset($_GET['name'])) {
            echo 'nera name';
        } else {
            if (preg_match('/^[A-Z][a-zA-z \'\-]+/', $_GET['name'])) {
                echo htmlspecialchars($_GET['name']);
            } else {
                echo 'netinka name';
            }
        }
        echo '<br>';
        if (!isset($_GET['lastName'])) {
            echo 'nera lastName';
        } else {
            if (preg_match('/^[A-Z][a-zA-z \'\-]+/', $_GET['lastName'])) {
                echo htmlspecialchars($_GET['lastName']);
            } else {
                echo 'netinka lastName';
            }
        }
        echo '<br>';
        if (!isset($_GET['accNr'])) {
            echo 'nera accNr';
        } else {
            if (preg_match('/^LT[\d]{2}[\d]{5}[\d]{11}$/', $_GET['accNr'])) {
                echo htmlspecialchars($_GET['accNr']);
            } else {
                echo 'netinka accNr';
            }
        }
        echo '<br>';
        if (!isset($_GET['personID'])) {
            echo 'nera personID';
        } else {
            if (preg_match('/^[34][\d]{10}$/', $_GET['personID']) ) {
                echo htmlspecialchars($_GET['personID']);
            } else {
                echo 'netinka personID';
            }
        }
        echo'</h1>';
    }
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
    <form class="newacc" action="" method="get">
        <h2>Create new account</h2>
        <div class="input">
            <label for="name">First name:</label>
            <input type="text" name="name" placeholder="First name" id="name" value="">
            <span>first name error</span>
        </div>
        <div class="input">
            <label for="lastName">Last name:</label>
            <input type="text" name="lastName" placeholder="Last name" id="lastName" value="">
            <span>last name error</span>
        </div>
        <div class="input">
            <label for="accNr">Account number:</label>
            <input type="text" name="accNr" placeholder="Account number" id="accNr" value="">
            <span>acc nr error</span>
        </div>
        <div class="input">
            <label for="personID">Personal ID number:</label>
            <input type="text" name="personID" placeholder="Personal ID number" id="personID" value="">
            <span>personal id error</span>
        </div>
        <div class="submit">
            <input class="btn" type="submit" name="newacc" value="Submit">
        </div>
    </form>

</body>
</html>