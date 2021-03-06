<?php
session_start();
if (isset($_POST['submit'])) {
    $sum = isset($_POST['check']) ? array_sum($_POST['check']) : 0;
    if (687 == $sum && 5 == count($_POST['check'])) {
        $correct = substr(md5(rand()), 0, rand(6, 9));
        $_SESSION['correct'] = $correct;
        header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/captcha/?answer='.$correct);
        exit;
    } else {
        $wrong = substr(md5(rand()), 0, rand(6, 9));
        header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/captcha/?answer='.$wrong);
        exit;
    }
}
elseif (isset($_GET['answer'])) {
    if (preg_match('/[<>()]+/', $_GET['answer'])) {
        header('Location: http://localhost:8888/bit/phpHomeWorks/webMechanics/captcha/?please=donthack');
        exit;
    }
    $answer = isset($_SESSION['correct']) ? $_SESSION['correct'] : substr(md5(rand()), 0, rand(10, 12));
    if (isset($_SESSION['correct']) && $answer == $_GET['answer']) {
        unset($_SESSION['correct']);
        $print = '<h1>Jūs - ne Robotas</h1>';
        $h1color = '#161';
        $h1bordercolor = '#161e';
        $h1bordercolor2 = '#191a';
        $lightColor = '#191';
    } else {
        $print = '<h1>Jūs esate Robotas</h1>';
        $h1color = '#611';
        $h1bordercolor = '#611e';
        $h1bordercolor2 = '#9116';
        $lightColor = '#911';
    }
    $print .= '<div class="light"></div><a href="http://localhost:8888/bit/phpHomeWorks/webMechanics/captcha/">Bandykite dar karta</a>';
}
else {
    $squaresData = [
        ['link' => './img/1.png', 'count' => 26],
        ['link' => './img/2.jpg', 'count' => 842],
        ['link' => './img/3.png', 'count' => 612],
        ['link' => './img/4.jpg', 'count' => 220],
        ['link' => './img/5.jpg', 'count' => 200],
        ['link' => './img/6.png', 'count' => 88],
        ['link' => './img/7.jpg', 'count' => 670],
        ['link' => './img/8.jpg', 'count' => 153],
        ['link' => './img/9.jpg', 'count' => 999]
    ];
    
    $print = '<h1>Paveikslėlius, kuriuose nėra sintezatorių, palikite ryškius</h1><div class="light"></div><form method="post">';
    $id = 0;
    while (0 < count($squaresData)) {
        $squareIndex = rand(0, count($squaresData) - 1);
        $print .= '<div class="slot">
                    <input type="checkbox" name="check[]" value="'.$squaresData[$squareIndex]['count'].'" id="'.$id.'"/>
                    <label style="background-image: url('.$squaresData[$squareIndex]['link'].');" for="'.$id.'"></label>
                </div>';
        array_splice($squaresData, $squareIndex, 1);
        $id++;
    }
    $print .= '<button type="submit" name="submit">Ar Jūs Robotas?</button></form>';
    $h1color = '#222';
    $h1bordercolor = '#eee4';
    $h1bordercolor2 = '#eeee';
    $lightColor = '#efa';
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
            padding: 0;
            font-family: sans-serif;
            box-sizing: border-box;
        }
        body {
            background: #9ba;
            background-image: linear-gradient(0turn, #456, #556, #355);
            display: grid;
            place-items: center;
            min-height: 100vh;
            overflow: hidden;
        }
        h1 {
            display: inline-block;
            width: 70%;
            height: auto;
            padding: 22px 0;
            margin: 40px 25%;
            background: linear-gradient(0.7turn, #aba3, #dcd6);
            border: 2px solid <?=$h1bordercolor?>;
            border-radius: 18px;
            text-align: center;
            color: <?=$h1color?>;
            animation: neon 0.65s ease-in-out;
            animation-iteration-count: 3;
            box-shadow: 0 0 2px 1px <?=$h1bordercolor2?>,
                        0 0 3px 2px inset <?=$h1bordercolor2?>;
        }
        @keyframes neon {
            0% {
                border: 2px solid <?=$h1bordercolor?>;
                box-shadow: 0 0 2px 1px <?=$h1bordercolor2?>,
                            0 0 3px 2px inset <?=$h1bordercolor2?>;
            }
            50% {
                border: 2px solid <?=$h1bordercolor2?>;
                box-shadow: 0 0 10px 3px <?=$h1bordercolor?>,
                            0 0 12px 4px inset <?=$h1bordercolor?>;
            }
            100% {
                border: 2px solid <?=$h1bordercolor?>;
                box-shadow: 0 0 2px 1px <?=$h1bordercolor2?>,
                            0 0 3px 2px inset <?=$h1bordercolor2?>;
            }
        }
        .light {
            display: inline-block;
            background: <?=$lightColor?>;
            width: 8%;
            height: 18px;
            animation: light 3s linear infinite alternate;
            border-radius: 4px;
            box-shadow: 0 0 6px 4px #ffb,
                        0 0 4px 3px inset #fff;
        }
        @keyframes light {
            0% {
                margin-left: -100%;
                box-shadow: 20px 0 20px 5px #ffb,
                            0 0 4px 4px inset #fdd;
            }
            20% {
                margin-left: -60%;
                box-shadow: 12px 0 18px 5px #fff,
                            0 0 3px 3px inset #fed;

            }
            25% {
                margin-left: -50%;
                box-shadow: 10px 0 14px 6px #fee,
                            0 0 4px 1px inset #fda;

            }
            40% {
                margin-left: -20%;
                box-shadow: 4px 0 16px 1px #afb,
                            0 0 4px 4px inset #fcf;

            }
            50% {
                margin-left: 0%;
                box-shadow: 0 0 6px 4px #ffb,
                            0 0 4px 3px inset #fff;

            }
            60% {
                margin-left: 20%;
                box-shadow: -4px 0 12px 3px #dfa,
                            0 0 1px 5px inset #eca;

            }
            75% {
                margin-left: 50%;
                box-shadow: -10px 0 4px 6px #cfe,
                            0 0 6px 4px inset #fdf;

            }
            80% {
                margin-left: 60%;
                box-shadow: -12px 0 8px 5px #fff,
                            0 0 3px 3px inset #fed;

            }
            100% {
                margin-left: 100%;
                box-shadow: -20px 0 20px 5px #ffb,
                            0 0 4px 4px inset #fdd;
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
            background: #aaae;
            width: 100px;
            height: 100px;
            transform: scale(1);
            z-index: 0;
            overflow: hidden;
            border-radius: 0;
            filter: sepia(0%) brightness(100%);
            transition: 0.25s ease-in-out;
        }
        .slot:hover {
            transform: scale(1.6);
            z-index: 100;
            border-radius: 16px;
            animation: sepia 0.5s ease;
        }
        @keyframes sepia {
            0% {
                transform: scale(1.6);
                filter: sepia(0%) brightness(100%);
            }
            33% {
                transform: scale(2);
                filter: sepia(70%) brightness(50%);
            }
            100% {
                transform: scale(1.6);
                filter: sepia(0%) brightness(100%);
            }
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
            cursor: pointer;
            filter: blur(0) saturate(1) contrast(1);
            box-shadow: 0 0 1px 1px inset #1114;
            transition: 0.5s ease-in-out;
            transform: scale(1);
        }
        :checked + label {
            filter: blur(10px) saturate(0) contrast(0.5);
            box-shadow: 0 0 10px 10px inset #111e;
        }
        button {
            display: grid;
            place-items: center;
            grid-column: 1/4;
            margin: 20px;
            cursor: pointer;
            border: 2px solid #231;
            border-radius: 8px;
            background: linear-gradient(0.25turn, #68b7, #bcb8, #afe5);
            box-shadow: 1px 1px 3px 1px #1118,
                        0 0 5px 3px inset #cdc8,
                        0 0 10px 4px #1114;
            transition: 0.5s ease-in-out;
        }
        button:hover {
            border: 2px solid #bca;
            box-shadow: 1px 1px 3px 1px #1118,
                        0 0 8px 5px inset #cdc8,
                        0 0 20px 4px #aaa4;
        }
        a {
            display: inline-block;
            width: 50%;
            height: auto;
            text-align: center;
            margin: 30px 25%;
            font-size: 20px;
            line-height: 50px;
            background: #eff3;
            color: #232;
            border-radius: 10px;
            border: 3px solid #231;
            box-shadow: 1px 1px 3px 1px #1118,
                        0 0 5px 3px inset #cdc8,
                        0 0 10px 4px #1114;
            transition: 0.5s ease-in-out;
        }
        a:hover {
            border: 3px solid #bca;
            box-shadow: 1px 1px 3px 1px #1118,
                        0 0 8px 5px inset #cdc8,
                        0 0 20px 4px #aaa4;
        }
    </style>
</head>
<body>

    <?= $print ?>
    
</body>
</html>