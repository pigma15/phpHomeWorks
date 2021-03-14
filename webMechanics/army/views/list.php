<?php
require DIR. 'views/top.php';
require DIR. 'views/navbar.php';

?>


<div class="list">
    <h2>List</h2>
    <div class="listTemplate top">
        <div class="info">
            <span>Name</span>
            <span>Age</span>
            <span>Registration number</span>
            <?php
            if (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) {
                ?>
                <span>Ammo</span>
                <?php
            }
            else if ((isset($_SESSION['login']['role']) && 'private' == $_SESSION['login']['role'])) {
                ?> <span></span> <?php
            }
            ?>
        </div>
        <div class="actions">Actions</div>
    </div>

    <?php
    foreach($army as $soldier) {
        if ($soldier->regNr == $_SESSION['login']['regNr'] && isset($_SESSION['login']['role']) && 'private' == $_SESSION['login']['role']) continue;
    ?>
        <div class="listTemplate">
            <div class="info">
                <span><?=$soldier->name?></span>
                <span><?=$soldier->age?></span>
            <?php
            if (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) {
                ?>
                <form action="<?= URL ?>private" method="post">
                    <label for="private<?=$soldier->regNr?>"><?=$soldier->regNr?></label>
                    <input class="none" id="private<?=$soldier->regNr?>" type="submit" name="private" value="<?=$soldier->regNr?>">
                </form>
                <?php
            }
            else if ((isset($_SESSION['login']['role']) && 'private' == $_SESSION['login']['role'])) {
                ?> <span><?=$soldier->regNr?></span> <?php
            }
            ?>
            <?php
            if (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) {
                ?>
                <span><?=$soldier->ammo?></span>
                <?php
            }
            else if ((isset($_SESSION['login']['role']) && 'private' == $_SESSION['login']['role'])) {
                ?> <span></span> <?php
            }
            ?>
                
            </div>
            <div class="actions">
                <form class="add" action="<?= URL ?>add/<?=$soldier->regNr?>" method="post">
                    <input type="text" name="amount" value="">
                    <label for="add<?=$soldier->regNr?>">add</label>
                    <input class="none" type="submit" id="add<?=$soldier->regNr?>" name="add" value="<?=$soldier->regNr?>">
                </form>
                <?php
                if (isset($_SESSION['login']['role']) && 'general' == $_SESSION['login']['role']) {
                ?>
                <form class="delete" action="<?= URL ?>delete/<?=$soldier->regNr?>" method="post">
                    <label for="delete<?=$soldier->regNr?>">delete</label>
                    <input class="none" type="submit" id="delete<?=$soldier->regNr?>" name="delete" value="<?=$soldier->regNr?>">
                </form>
                <?php
                }
                ?>
                <div class="error"><?=$_SESSION['delete']['errors'][$soldier->regNr] ?? $_SESSION['add']['errors'][$soldier->regNr] ?? ''?></div>
            </div>
        </div>
    <?php
    }
    ?>

</div>



<?php
require DIR. 'views/bottom.php';
?>