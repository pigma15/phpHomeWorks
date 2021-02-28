<?php
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
<body style="background-image: url('./img/<?=$backgroundImage?>')">
    <div class="nav"></div>
    <form class="newacc" action="" method="get">
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