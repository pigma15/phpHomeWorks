<?php
session_start();
date_default_timezone_set("Europe/Vilnius");
define('URL', 'http://localhost:8888/bit/phpHomeWorks/webMechanics/army/');
define('DIR', __DIR__.'/');
define('INSTALL_DIR', '/bit/phpHomeWorks/webMechanics/army/');

require DIR. 'app/Army.php';
require DIR. 'app/ArmyController.php';
require DIR. 'app/ArmyMan.php';
require DIR. 'app/Passwords.php';
require DIR. 'app/Transactions.php';

?>