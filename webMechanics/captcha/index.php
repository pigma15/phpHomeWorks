<?php
if (isset($_GET['submit'])) {
    $sum = isset($_GET['check']) ? array_sum($_GET['check']) : 0;
    if ($sum == 687) {
        $h1color = '#191';
        $print = '<h1>Jus - ne Robotas</h1>';
    } else {
        $h1color = '#911';
        $print = '<h1>Jus esate Robotas</h1>';
    }
    $print .= '<a href="http://localhost:8888/bit/phpHomeWorks/webMechanics/captcha/">Bandykite dar karta</a><div class="light">';
}
else {
    $squaresData = [
        ['link' => './img/arp.png', 'count' => 26],
        ['link' => './img/cat.jpg', 'count' => 842],
        ['link' => './img/dog.png', 'count' => 612],
        ['link' => './img/easel.jpg', 'count' => 220],
        ['link' => './img/go9.jpg', 'count' => 9999],
        ['link' => './img/mini.jpg', 'count' => 200],
        ['link' => './img/ms20.png', 'count' => 88],
        ['link' => './img/termosas.jpg', 'count' => 670],
        ['link' => './img/vcs3.jpg', 'count' => 153],
    ];
    
    $print = '<h1>Paveikslelius, kuriuose nera sintezatoriu, palikite ryskius</h1><div class="light"></div><form>';
    $id = 0;
    while (0 < count($squaresData)) {
        $temp = rand(0, count($squaresData) - 1);
        $print .= '<div class="slot">
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
            font-family: sans-serif;
        }
        body {
            background: #9ba;
            background-image: linear-gradient(0turn, #456, #556, #355);
            display: grid;
            place-items: center;
            min-height: 100vh;
        }
        h1 {
            display: inline-block;
            margin-top: 50px;
            width: 100%;
            text-align: center;
            color: <?=$h1color?>;
        }
        .light {
            display: inline-block;
            background: #efa;
            width: 8%;
            height: 18px;
            animation: light 5s linear infinite alternate;
            border-radius: 4px;
            box-shadow: 0 0 6px 4px #ffb,
                        0 0 4px 3px #fff;
        }
        @keyframes light {
            0% {
                margin-left: -100%;
                box-shadow: 20px 0 20px 5px #ffb,
                            0 0 4px 4px #fdd;
            }
            20% {
                margin-left: -60%;
                box-shadow: 12px 0 8px 5px #fff,
                            0 0 3px 3px #fed;

            }
            25% {
                margin-left: -50%;
                box-shadow: 10px 0 22px 6px #fee,
                            0 0 4px 1px #fda;

            }
            40% {
                margin-left: -20%;
                box-shadow: 4px 0 16px 1px #afb,
                            0 0 4px 4px #fcf;

            }
            50% {
                margin-left: 0%;
                box-shadow: 0 0 6px 4px #ffb,
                            0 0 4px 3px #fff;

            }
            60% {
                margin-left: 20%;
                box-shadow: -4px 0 12px 3px #dfa,
                            0 0 1px 5px #eca;

            }
            75% {
                margin-left: 50%;
                box-shadow: -10px 0 4px 6px #cfe,
                            0 0 6px 4px #fdf;

            }
            80% {
                margin-left: 60%;
                box-shadow: -12px 0 8px 5px #fff,
                            0 0 3px 3px #fed;

            }
            100% {
                margin-left: 100%;
                box-shadow: -20px 0 20px 5px #ffb,
                            0 0 4px 4px #fdd;
            }
        }
        form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(4, 1fr);
            width: 300px;
            height: 400px;
        }
        .slot {
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
            place-items: center;
            grid-column: 1/4;
            margin: 20px;
        }
        a {
            margin-top: 50px;
            color: #232;
        }
    </style>
</head>
<body>

    <?= $print ?>
    
</body>
</html>