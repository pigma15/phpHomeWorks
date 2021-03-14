<?php
require DIR. 'views/top.php';

?>

<div class="sign">
    <form class="signUp" action="<?= URL ?>create" method="post">
        <h2>Sign Up</h2>
        <div class="line">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" value="<?=$_SESSION['create']['name'] ?? ''?>">
            <span class="error"><?=$_SESSION['create']['error']['name'] ?? ''?></span>
        </div>      
        <div class="line">
            <label for="age">Age</label>
            <input type="text" name="age" id="age" placeholder="Age" value="<?=$_SESSION['create']['age'] ?? ''?>">
            <span class="error"><?=$_SESSION['create']['error']['age'] ?? ''?></span>
        </div>        
        <div class="line">
            <label>Registration Nr</label>
            <span>
                <?= isset($_SESSION['create']['regNr']) ? $_SESSION['create']['regNr'] : (new ArmyController)->newRegNr(); ?>
            </span>
            <span class="error"><?=$_SESSION['create']['error']['regNr'] ?? ''?></span>
        </div>        
        <div class="line">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
            <span class="error"><?=$_SESSION['create']['error']['password'] ?? ''?></span>
        </div>        
        <div class="line">
            <label for="rptpassword">Repeat Password</label>
            <input type="password" name="rptpassword" id="rptpassword" placeholder="Repeat Password">
            <span class="error"><?=$_SESSION['create']['error']['rptpassword'] ?? ''?></span>
        </div>
        <div class="confirm">
            <input type="submit" name="create" value="Sign Up">
        </div>
    </form>

    <form class="login" action="<?= URL ?>login" method="post">
        <h2>Sign In</h2>
        <div class="line">
            <label for="lregNr">Registration Nr</label>
            <input type="text" name="regNr" id="lregNr" placeholder="registration number" value="">
        </div> 
        <div class="line">
            <label for="lpassword">Password</label>
            <input type="password" name="password" id="lpassword" placeholder="password" value="">
            <span class="error"><?=$_SESSION['login']['error'] ?? ''?></span>
        </div>
        <div class="confirm">
            <input type="submit" name="login" value="Sign In">
        </div>
    </form>
</div>





<?php
require DIR. 'views/bottom.php';
?>