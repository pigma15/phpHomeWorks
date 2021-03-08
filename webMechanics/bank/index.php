<?php
    require __DIR__.'/bootstrap.php';

    if (isset($_POST['submit'])) {
        if ((isset($_POST['login']) && isset($_POST['password'])) && checkLogin($_POST['login'], $_POST['password'])) {
            $_SESSION['login'] = 'ok';
            header('Location: '.URL.'table.php');
            exit;
        }
        $_SESSION['login']['error'] = 'Wrong username or password';
        header('Location: '.URL);
        exit;
    }
    $error = $_SESSION['login']['error'] ?? '';
    unset($_SESSION['login']);
    $backgroundImage = backgroundImage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="./resources/sass/main.css?<?= time() ?>" />
</head>
<body>
    <img class="background" src="./img/<?=$backgroundImage?>" alt="">
    <form class="login" method="post">
        <input type="text" name="login" placeholder="username">
        <input type="password" name="password" placeholder="password" id="password">
        <div id="pass">show password</div>
        <input class="submit" type="submit" name="submit" value="Submit">
        <span><?=$error?></span>
    </form>


<script >
    const passBtn = document.getElementById('pass');
    const password = document.getElementById('password');
    passBtn.onclick = () => {
        if (password.type === 'password') {
            password.type = 'text';
        }
        else if (password.type === 'text') {
            password.type = 'password';
        }
        return;
    }
</script>
    
</body>
</html>