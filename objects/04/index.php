<h1>Objects 4</h1>

<?php

echo 'Uzduotis nr. 4';
echo '<br><br>';
echo 'Patobulinti 1 uždavinio piniginę taip, kad būtų galima skaičiuoti kiek piniginėje yra monetų ir kiek banknotų. Parašyti metodą monetos, kuris skaičiuotų kiek yra piniginėje monetų ir metoda banknotai - popierinių pinigų skaičiavimui.<br><br>';

class Pinigine {
    protected $popieriniaiPinigai;
    protected $metaliniaiPinigai;

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

class TurboPinigine extends Pinigine {
    private $popieriniaiPinigaiKiekis;
    private $metaliniaiPinigaiKiekis;

    public function __construct() {
        parent::__construct();
        $this->popieriniaiPinigaiKiekis = 0;
        $this->metaliniaiPinigaiKiekis = 0;
    }
    
    public function banknotai() {
        return $this->popieriniaiPinigai;
    }

    public function banknotaiKiekis() {
        return $this->popieriniaiPinigaiKiekis;
    }

    public function monetos() {
        return $this->metaliniaiPinigai;
    }

    public function monetosKiekis() {
        return $this->metaliniaiPinigaiKiekis;
    }
    
    public function ideti($kiekis) {
        if (0 >= $kiekis) return;
        if (2 < $kiekis) {
            $this->popieriniaiPinigai += $kiekis;
            ++$this->popieriniaiPinigaiKiekis;
        } else {
            $this->metaliniaiPinigai += $kiekis;
            ++$this->metaliniaiPinigaiKiekis;
        }
    }
}

echo 'Sukuriama pinigne i kuria idedame 14 banknotu, ir dvi monetas (1 ir 2 vertes)<br><br>';
$turboPinigine = new TurboPinigine;
$turboPinigine->ideti(14);
$turboPinigine->ideti(1);
$turboPinigine->ideti(2);

echo '<pre>';
print_r($turboPinigine);

echo $turboPinigine->banknotai().' pinigu banknotais (ideta kartu banknotais - '.$turboPinigine->banknotaiKiekis().') ir '.$turboPinigine->monetos().' monetomis (ideta kartu monetomis - '.$turboPinigine->monetosKiekis().').';

