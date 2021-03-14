<?php
class ArmyMan {
    public $name;
    public $age;
    public $regNr;
    public $password;
    public $ammo;
    public $time;

    public function __construct($name, $age, $password) {
        $this->name = $name;
        $this->age = $age;
        $this->password = $password;
        $this->ammo = 0;
        $this->time = date("Y-m-d H:i:s", time());
        $this->regNr = $_SESSION['create']['regNr'];
    }
}


?>