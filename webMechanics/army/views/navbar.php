<div class="navbar">
    <?php
    if (isset($_SESSION['login']['role']) && 'private' == $_SESSION['login']['role']) {
        ?>
        <div class="hello">
            <?php
            foreach (Army::getArmy()->read() as $soldier) {
                if ($soldier->regNr == $_SESSION['login']['regNr']) {
                    ?>
                    <span>Hello<?=', '.$soldier->name ?? ''?></span>
                    <span>You have <?=$soldier->ammo?> ammo</span>
                    <?php
                    break;
                }
            }
            ?>
            <img src="./img/<?='helmet.png'?>" alt="">
        </div>
        <a href="<?=URL?>private">private</a>
        <?php
    } elseif (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) { ?>
        <div class="hello">
            <span>Sir, General, Sir</span>
            <img src="./img/<?='hat.png'?>" alt="">
        </div>
    <?php
    }
    ?>
    <a href="<?=URL?>list">list</a>
    <a href="<?=URL?>logout">logout</a>
</div>