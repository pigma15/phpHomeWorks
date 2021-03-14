<?php
require DIR. 'views/top.php';
require DIR. 'views/navbar.php';

?>

<div class="soldierInfo">
    <div class="personal">
        <h2>Private <?=$soldier->name?></h2>
        <span><u>Registration number</u> : <?=$soldier->regNr?></span>
        <span><u>Age</u> : <?=$soldier->age?> years old</span>
        <span><u>Joined at</u> : <?=$soldier->time?></span>
        <span><u>Ammo</u> : <?=$soldier->ammo?></span>
        <?php
        if (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) {
            ?>
            <form class="add" action="<?= URL ?>add/<?=$soldier->regNr?>" method="post">
                <input type="text" name="amount" value="">
                <label for="add<?=$soldier->regNr?>">add</label>
                <input class="none" type="submit" id="add<?=$soldier->regNr?>" name="add" value="<?=$soldier->regNr?>">
            </form>
        <?php
        }
        ?>
    </div>
    <div class="transfers">
        <h2>Exchange history</h2>
        <?php 
        $transactions = Transactions::getTransactions()->read();
        foreach ($transactions as $transfer) {
            if ($transfer['to'] == $soldier->regNr) {
                ?>
                <div>
                    <span>Received <u style="color: #161"><?=$transfer['amount']?></u> ammo from <?=$transfer['from']?></span>
                    <span class="time"><?=$transfer['time']?></span>
                </div>
                <?php
            }
            if ($transfer['from'] == $soldier->regNr) {
                ?>
                <div>
                    <span>Donated <u style="color: #911"><?=$transfer['amount']?></u> ammo to <?=$transfer['to']?></span>
                    <span class="time"><?=$transfer['time']?></span>
                </div>
                <?php
            }
        }
        ?>
    </div>  
</div>




<?php
require DIR. 'views/bottom.php';
?>