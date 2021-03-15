<?php 
class Army {
    private static $ArmyObj;
    private $data;

    public static function getArmy() {
        return self::$ArmyObj ?? self::$ArmyObj = new self;
    }

    private function __construct() {
        if (!file_exists(DIR.'data/army.json')) {
            file_put_contents(DIR.'data/army.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR.'data/army.json'));
    }

    public function __destruct() {
        usort($this->data, function ($a, $b) {
            return $a->name <=> $b->name;
        });
        file_put_contents(DIR.'data/army.json', json_encode($this->data));
    }

    public function read() {
        return $this->data;
    }

    public function write($soldier) {
        $this->data[] = $soldier;
    }

    public function delete($regNr) {
        foreach($this->data as $key => $soldier) {
            if ($soldier->regNr== $regNr) {
                unset($this->data[$key]);
                $this->data = array_values($this->data);
                return;
            }
        }
    }

    public function update($army) {
        $this->data = $army;
    }

}

?>