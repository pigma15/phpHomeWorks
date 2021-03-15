<h1>Objects 2</h1>

<?php

echo 'Uzduotis nr. 2';
echo '<br><br>';
echo 'Sukurti klasę Stiklinė. Sukurti privačią savybę tūris ir kiekis. Parašyti metodą ipilti($kiekis), kuris keistų savybę kiekis. Jeigu stiklinės tūris yra mažesnis nei pilamas kiekis- kiekis netelpa ir būna lygus tūriui. Parašyti metodą ispilti(), kuris grąžiną kiekį. Sukurti tris stiklines objektus su tūriais: 200, 150, 100. Didžiausią pripilti pilną ir tada ją ispilti į mažesnę stiklinę, o mažesnę į dar mažesnę.<br><br>';

class Stikline {
    private $turis, $kiekis;

    public function __construct($turis) {
        $this->turis = $turis;
        $this->kiekis = 0;
    }

    public function ipilti($kiekis) {
        if (0 >= $kiekis) return;
        if (($kiekis + $this->kiekis) >= $this->turis) {
            $this->kiekis = $this->turis;
        } else {
            $this->kiekis += $kiekis;
        }
    }

    public function ispilti() {
        $kiekis = $this->kiekis;
        $this->kiekis = 0;
        return $kiekis;
    }
}

echo 'Sukuriamos 3 skirtingos talpos stiklines:';
$maxStikline = new Stikline(200);
$midStikline = new Stikline(150);
$minStikline = new Stikline(100);

echo '<pre>';
print_r([$maxStikline, $midStikline, $minStikline]);
echo '<br><br>';

echo 'Didziausia stikline pripidloma pilnai, viskas perpilama i vidutine stikline, galiausiai is vidutines perpilama i maziausia';
$maxStikline->ipilti(1000);
$midStikline->ipilti($maxStikline->ispilti());
$minStikline->ipilti($midStikline->ispilti());

echo '<pre>';
print_r([$maxStikline, $midStikline, $minStikline]);