<h1>Objects 3</h1>

<?php

echo 'Uzduotis nr. 3';
echo '<br><br>';
echo 'Sukurti klasę Grybas. Sukurti klasę Krepsys. Grybas turi tris privačias savybes: valgomas, sukirmijes, svoris. Kuriant Grybo objektą jo savybės turi būti atsitiktinai priskiriamos taip: valgomas- true arba false, sukirmijes- true arba false ir svoris- nuo 5 iki 45. Eiti grybauti, t.y. Kurti naujus Grybas objektus, jeigu nesukirmijęs ir valgomas dėti į Krepsi objektą, kol bus pririnkta 500 svorio nesukirmijusių ir valgomų grybų.<br><br>';

class Grybas {
    private $valgomas, $sukirmijes, $svoris;

    public function __construct() {
        $this->valgomas = (bool) rand(0, 1);
        $this->sukirmijes = (bool) rand(0, 1);
        $this->svoris = rand(5, 45);
    }

    public function isGerasGrybas() {
        return $this->valgomas && !$this->sukirmijes ? true : false;
    }

    public function grybasSvoris() {
        return $this->svoris;
    }
}

class Krepsys {
    private $svoris;

    public function __construct() {
        $this->svoris = 0;
    }

    public function eitiGrybauti() {
        do {
            $grybas = new Grybas;
            if ($grybas->isGerasGrybas()) {
                $this->svoris += $grybas->grybasSvoris();
            }  
        }
        while (500 > $this->krepsysSvoris());
        
    }

    public function krepsysSvoris() {
        return $this->svoris;
    }
}

echo 'Sukuriamas krepsys ir su juo einama grybauti, kol prirenkama grybu, kuriu bendras svoris bent 500';
$krepsys = new Krepsys;

$krepsys->eitiGrybauti();

echo '<pre>';
print_r($krepsys);