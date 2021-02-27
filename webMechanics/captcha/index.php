<?php
if (isset($_GET['submit'])) {
    $sum = isset($_GET['check']) ? array_sum($_GET['check']) : 0;
    if ($sum == 686) {
        $h1color = '#191';
        $print = '<h1>Jus - ne Robotas</h1>';
    } else {
        $h1color = '#911';
        $print = '<h1>Jus esate Robotas</h1>';
    }
    $print .= '<a href="http://localhost:8888/bit/phpHomeWorks/webMechanics/captcha/">Bandykite dar karta</a>';
}
else {
    $squaresData = [
        ['link' => './img/arp.png', 'count' => 26],
        ['link' => './img/cat.jpg', 'count' => 1239],
        ['link' => './img/dog.png', 'count' => 4123],
        ['link' => './img/easel.jpg', 'count' => 220],
        ['link' => './img/go9.jpg', 'count' => 9999],
        ['link' => './img/mini.jpg', 'count' => 200],
        ['link' => './img/ms20.png', 'count' => 88],
        ['link' => './img/termosas.jpg', 'count' => 5137],
        ['link' => './img/vcs3.jpg', 'count' => 152],
    ];
    
    $print = '<h1>Paveikslelius, kuriuose nera sintezatoriu, palikite ryskius</h1><form>';
    $id = 0;
    while (0 < count($squaresData)) {
        $temp = rand(0, count($squaresData) - 1);
        $print .= '<div>
                    <input type="checkbox" name="check[]" value="'.$squaresData[$temp]['count'].'" id="'.$id.'"/>
                    <label style="background-image: url('.$squaresData[$temp]['link'].');" for="'.$id.'"></label>
                </div>';
        array_splice($squaresData, $temp, 1);
        $id++;
    }
    $print .= '<button type="submit" name="submit">Ar Jus Robotas?</button></form>';
    $h1color = '#222';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
    <style>
        body,
        body * {
            margin: 0;
        }
        body {
            background: #8d8;
            display: grid;
            place-items: center;
        }
        h1 {
            margin-top: 50px;
            width: 100%;
            text-align: center;
            color: <?=$h1color?>;
        }
        form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(4, 1fr);
            width: 300px;
            height: 400px;
        }
        div {
            display: grid;
            place-items: center;
            width: 100px;
            height: 100px;
            overflow: hidden;
        }
        input {
            display: none;
        }
        label {
            display: inline-block;
            width: 100%;
            height: 100%;
            background: #ddd center;
            background-size: cover;
        }
        :checked + label{
            filter: blur(10px) saturate(0);
            box-shadow: 0 0 10px 10px inset #111e;
        }
        button {
            display: grid;
            place-items:center;
            grid-column: 1/4;
            margin: 20px;
        }
        a {
            margin-top: 50px;
            color: #333;
        }
    </style>
</head>
<body>

    <?= $print ?>
    
</body>
</html>