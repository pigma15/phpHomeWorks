<?php
session_start();
date_default_timezone_set("Europe/Vilnius");
define('URL', 'http://localhost:8888/bit/phpHomeWorks/webMechanics/bank/');
define('DIR', __DIR__.'/');
require DIR. 'functions.php';


_d($_SESSION, 'SESIJA--->');
?>
