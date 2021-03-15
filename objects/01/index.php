<h1>Objects 1</h1>

<?php

echo 'Uzduotis nr. 1';
echo '<br><br>';
echo 'Sukurti klasę Piniginė. Sukurti dvi privačias savybes popieriniaiPinigai ir metaliniaiPinigai. Parašyti metodą ideti($kiekis), kuris prideda pinigus į piniginę. Jeigu kiekis nedidesnis už 2, tai prideda prie metaliniaiPinigai, jeigu didesnis nei 2 prie popieriniaiPinigai. Parašykite metodą skaiciuoti(), kuris suskaičiuotų ir atspausdintų popieriniaiPinigai ir metaliniaiPinigai sumą. Sukurti klasės objektą ir pademonstruoti veikimą.<br><br>';

class Pinigine {
    private $popieriniaiPinigai;
    private $metaliniaiPinigai;

    public function __construct() {
        $this->popieriniaiPinigai = 0;
        $this->metaliniaiPinigai = 0;
    }

    public function ideti($kiekis) {
        if (0 >= $kiekis) return;
        if (2 < $kiekis) {
            $this->popieriniaiPinigai += $kiekis;
        } else {
            $this->metaliniaiPinigai += $kiekis;
        }
    }

    public function skaiciuoti() {
        return $this->popieriniaiPinigai + $this->metaliniaiPinigai;
    }
}

echo 'Sukuriama tuscia pinigine';
echo '<pre>';
print_r($pinigine = new Pinigine);

echo '<br>';
echo 'Pridedam 1, 2, o po to dar 6 pinigus';

$pinigine->ideti(1);
$pinigine->ideti(2);
$pinigine->ideti(6);

echo '<pre>';
print_r($pinigine);
echo '<br>';
echo 'Bendra pinigu suma: '.$pinigine->skaiciuoti();

